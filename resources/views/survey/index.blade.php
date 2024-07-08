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
            @php
                $no = 1;
            @endphp
            @foreach ($kuisioner as $item)
                <p>No. {{ $no }}</p>
                {{ $item->pertanyaan }}
                @foreach ($jawaban as $item)
                    <br>
                    {{ $item }}
                @endforeach
                {{-- @foreach ($jawaban as $item)
                    <ul>
                        <li>{{ $item->jawaban }}</li>
                    </ul>
                @endforeach --}}
                @php
                    $no++;
                @endphp
            @endforeach
        @endsection
        @section('telu')
            Telu
        @endsection
    </x-stepper>
</x-guest-layout>
