<x-guest-layout>
    <x-stepper>
        @section('sekek')
            <form action="" method="post">
                <label for="nama">Nama</label>
                <div class="max-w-sm space-y-3">
                    <input type="text"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Isi Nama Anda">
                </div>
                <label for="nama">Kontak</label>
                <div class="max-w-sm space-y-3">
                    <input type="text"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Isi No Telepon/Wa">
                </div>
            </form>
        @endsection
        @section('due')
        <div class="flex flex-col">
            @php
                $no = 1;
            @endphp
            {{-- tampil survey --}}
            @foreach ($surveys as $survey)
                <h1>Survey: {{ $survey->nama }}</h1>
                <br>
                {{-- tampil kuisioner --}}
                @foreach ($survey->kuisioners as $kuisioner)
                    @if ($kuisioner->level == false)
                        <div class="mb-4">
                            <h4>No.{{ $no }} {{ $kuisioner->pertanyaan }}</h4>
                            <form action="{{ route('survey.submit', $survey->id) }}" method="POST">
                                @csrf
                                {{-- tampil jawaban --}}
                                @foreach ($kuisioner->jawabans as $jawaban)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="answers[{{ $kuisioner->id }}]" id="jawaban_{{ $jawaban->id }}"
                                            value="{{ $jawaban->id }}" data-answer="{{ $jawaban->jawaban }}">
                                        <label class="form-check-label" for="jawaban_{{ $jawaban->id }}">
                                            {{ $jawaban->jawaban }}
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                        @php
                            $no++;
                        @endphp
                    @elseif($kuisioner->level == true)
                        <div id="sub" class="mb-4" hidden>
                            <h4>No.{{ $no }} {{ $kuisioner->pertanyaan }}</h4>
                            <form action="{{ route('survey.submit', $survey->id) }}" method="POST">
                                @csrf
                                {{-- tampil jawaban --}}
                                @foreach ($kuisioner->jawabans as $jawaban)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="answers[{{ $kuisioner->id }}]" id="jawaban_{{ $jawaban->id }}"
                                            value="{{ $jawaban->id }}">
                                        <label class="form-check-label" for="jawaban_{{ $jawaban->id }}">
                                            {{ $jawaban->jawaban }}
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
        
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const radioButtons = document.querySelectorAll('.form-check-input');
            radioButtons.forEach(radio => {
                radio.addEventListener('change', function () {
                    const subDiv = document.getElementById('sub');
                    if (this.dataset.answer.toLowerCase() === 'iya') {
                        subDiv.hidden = false;
                    } else {
                        subDiv.hidden = true;
                    }
                });
            });
        });
        </script>
        
        @endsection
        @section('telu')
            Telu
        @endsection
    </x-stepper>
</x-guest-layout>
