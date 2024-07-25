<x-guest-layout>
    @foreach ($surveys as $survey)
        <x-stepper>
            @section('sekek')
                {{-- <form action="{{ route('survey.submit') }}" method="POST">
                @csrf --}}
                <form action="{{ route('survey.submit') }}" method="POST">
                    @csrf
                    <div class="flex flex-col text-gray-600 w-7xl dark:text-white">
                        <h2 class="mb-4 text-2xl font-bold">Isi Data Responden</h2>
                        <p class="mb-5">
                            Isilah data responden dengan data asli dan pastikan setiap kolom dilengkapi dengan benar
                        </p>
                        {{-- nama --}}
                        <div class="max-w-sm mb-4 space-y-3">
                            <label for="nama" class="block mb-2 text-sm font-medium">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class=" @error('nama') border-red-500 @enderror block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="" required>
                            @error('nama')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- jenis Kelamin --}}
                        <div class="max-w-sm mb-4 space-y-3">
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium">Jenis kelamin </label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required
                                class="@error('jenis_kelamin') border-red-500 @enderror block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Sekolah --}}
                        <div class="max-w-sm mb-4 space-y-3">
                            <label for="sekolah_id" class="block mb-2 text-sm font-medium">Sekolah </label>
                            <select id="sekolah_id" name="sekolah_id" required
                                class="@error('sekolah_id') border-red-500 @enderror block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option value="">-- Pilih Sekolah --</option>
                                @foreach ($sekolahs as $sekolah)
                                    <option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
                                @endforeach
                            </select>
                            @error('sekolah_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Jurusan --}}
                        <div class="max-w-sm mb-4 space-y-3">
                            <label for="jurusan_id" class="block mb-2 text-sm font-medium">Jurusan</label>
                            <select id="jurusan_id" name="jurusan_id" required
                                class="@error('jurusan_id') border-red-500 @enderror block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach ($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                                @endforeach
                            </select>
                            @error('jurusan_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    {{-- <button type="submit">tes</button>
                </form> --}}
                @endsection
                @section('due')
                    <div class="flex flex-col text-gray-600 w-7xl dark:text-white" x-data="{ answers: {} }">
                        <h1 class="mb-4 text-2xl font-bold dark:text-white">Survey: {{ $survey->nama }}</h1>
                        <p>
                            Jawablah setiap pertanyaan dengan jujur dan sesuai dengan kondisi yang sebenarnya.
                            Jika Anda tidak yakin dengan jawaban Anda,
                            pilihlah jawaban yang paling dekat dengan kondisi yang sebenarnya
                        </p>
                        <br>
                        @foreach ($survey->kategories as $kategori)
                            <h3 class="mb-2 font-bold dark:text-white text-md">Bagian.{{ $loop->iteration }}
                                {{ $kategori->nama }}</h3>
                            @foreach ($survey->kuisioners->where('level', 0)->where('syarat', 0)->where('kategori_id', $kategori->id) as $kuisioner)
                                <div x-data="{ showSub: false }" class="mb-2">
                                    <h4>No.{{ $loop->iteration }} {{ $kuisioner->pertanyaan }}</h4>
                                    @foreach ($kuisioner->jawabans as $jawaban)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" required
                                                name="answers[{{ $kuisioner->id }}]" id="jawaban_{{ $jawaban->id }}"
                                                value="{{ $jawaban->id }}" x-model="answers[{{ $kuisioner->id }}]"
                                                @click="showSub = ['Ya'].includes('{{ $jawaban->jawaban }}')">
                                            <label class="form-check-label" for="jawaban_{{ $jawaban->id }}">
                                                {{ $jawaban->jawaban }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="ml-5" x-show="showSub">
                                        @foreach ($survey->kuisioners->where('level', 1)->where('syarat', $kuisioner->id) as $sub)
                                            <p class="mb-5"></p>
                                            <h4>No.1.{{ $loop->iteration }} {{ $sub->pertanyaan }}</h4>
                                            @foreach ($sub->jawabans as $jawaban)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="answers[{{ $sub->id }}]"
                                                        id="jawaban_{{ $jawaban->id }}" value="{{ $jawaban->id }}">
                                                    <label class="form-check-label" for="jawaban_{{ $jawaban->id }}">
                                                        {{ $jawaban->jawaban }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    {{-- <button type="submit">tes</button> --}}
                    {{-- </form> --}}
                @endsection
                @section('telu')
                    Finish
                @endsection
                @section('simpan')
                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-green-600 border border-transparent rounded-lg gap-x-1 hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-stepper-finish-btn="" style="display: none;">Submit</button>
                @endsection
        </x-stepper>
        </form>
    @endforeach
</x-guest-layout>
