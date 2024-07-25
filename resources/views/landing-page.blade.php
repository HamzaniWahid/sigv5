<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Survey Bagu Sig') }}</title>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="./node_modules/preline/dist/preline.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 35em;
        }
    </style>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body class="font-sans antialiased text-gray-900 dark:bg-teal-950">
    <header class="absolute z-50 flex flex-wrap w-full px-10 pt-4 text-sm md:justify-start md:flex-nowrap">
        <nav class="mt-6 relative max-w-[85rem] w-full border bg-white  border-gray-200 rounded-[36px] mx-2 py-3 px-4 md:flex md:items-center md:justify-between md:py-0 sm:m-0 lg:px-8 xl:mx-auto dark:bg-neutral-800 dark:border-neutral-700"
            aria-label="Global">
            <div class="flex items-center justify-between">
                {{-- <a class="flex-none text-xl font-semibold dark:text-white" href="#" aria-label="Brand">Brand</a>
             --}}
                <x-application-logo />
                <div class="md:hidden">
                    <button type="button"
                        class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-gray-200 rounded-full hs-collapse-toggle size-8 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700"
                        data-hs-collapse="#navbar-collapse-with-animation"
                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="flex-shrink-0 hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="flex-shrink-0 hidden hs-collapse-open:block size-4"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="navbar-collapse-with-animation"
                class="hidden py-2 overflow-hidden transition-all duration-300 hs-collapse basis-full grow md:block">
                <div class="flex flex-col py-2 md:flex-row md:items-center md:justify-end md:py-0 md:ps-7">
                    <a class="py-3 font-medium text-green-600 ps-px sm:px-3 dark:text-green-500" href="#"
                        aria-current="page">Beranda</a>
                    <a class="py-3 font-medium text-gray-500 ps-px sm:px-3 hover:text-gray-400 dark:text-neutral-400 dark:hover:text-neutral-500"
                        href="#">Kontak</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Hero -->
    <div
        class="relative pt-10 overflow-hidden before:absolute before:top-0 h-screen before:start-1/2 before:bg-[url('https://preline.co/assets/svg/examples/squared-bg-element.svg')] dark:before:bg-[url('https://preline.co/assets/svg/examples-dark/squared-bg-element.svg')] before:bg-no-repeat before:bg-top before:size-full before:-z-[1] before:transform before:-translate-x-1/2">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-10">
            <!-- Announcement Banner -->
            <div class="flex justify-center">
                <a class="inline-flex items-center p-2 px-3 text-xs text-gray-600 transition border border-gray-500 rounded-full gap-x-2 hover:border-gray-300 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:border-neutral-600 dark:text-neutral-400"
                    href="https://uniqhba.ac.id">
                    Website UNIQHBA
                    <span class="flex items-center gap-x-1">
                        <span
                            class="text-green-600 border-gray-200 border-s ps-2 dark:text-green-500 dark:border-neutral-700">Kunjungi</span>
                        <svg class="flex-shrink-0 text-green-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </a>
            </div>
            <!-- End Announcement Banner -->

            <!-- Title -->
            <div class="max-w-xl mx-auto mt-5 text-center">
                <h1 class="block text-4xl font-bold text-gray-800 md:text-5xl lg:text-6xl dark:text-neutral-200">
                    Survey Peminatan Siswa se-Kabupaten Lombok Utara
                </h1>
            </div>
            <!-- End Title -->

            <div class="max-w-3xl mx-auto mt-5 text-center">
                <p class="text-lg text-gray-600 dark:text-neutral-400">
                    Terhadap Universitas Qamarul Huda Badaruddin Bagu.</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-center gap-3 mt-8">
                <a class="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-center text-green-700 bg-green-100 border border-transparent border-green-400 rounded-full gap-x-3 hover:text-white hover:bg-green-600"
                    href="#">
                    {{-- <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z">
                        </path>
                    </svg> --}}
                    <form action="{{ route('survey', ['id' => $surveyId]) }}" method="post">
                        @csrf
                        <button type="submit">Mulai Survei</button>
                    </form>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </a>
            </div>
            <!-- End Buttons -->
        </div>
    </div>
    <!-- End Hero -->
    <!-- Clients -->
    <!-- End Clients -->
    <!-- Contact -->
    <div class="px-4 py-12 mx-auto max-w-7xl lg:px-6 lg:px-8 lg:py-24">
        <div class="max-w-2xl mx-auto mb-6 text-center sm:mb-10">
            <h2 class="text-2xl font-medium text-black sm:text-4xl dark:text-white">
                Contacts
            </h2>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:items-center md:gap-8 lg:gap-12">
            <div
                class="overflow-hidden bg-gray-100 aspect-w-16 aspect-h-6 lg:aspect-h-14 rounded-2xl dark:bg-neutral-800">
                {{-- <img class="object-cover transition-transform duration-500 ease-in-out group-hover:scale-105 rounded-2xl"
                    src="https://images.unsplash.com/photo-1572021335469-31706a17aaef?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Image Description"> --}}
                <div id="map"></div>
            </div>
            <!-- End Col -->

            <div class="space-y-8 lg:space-y-16">
                <div>
                    <h3 class="mb-2 font-semibold text-black dark:text-white">
                        Our address
                    </h3>

                    <!-- Grid -->
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 md:gap-8 lg:gap-12">
                        <div class="flex gap-4">
                            <svg class="flex-shrink-0 text-gray-500 size-5 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>

                            <div class="grow">
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Universitas Qamarul Huda Badaruddin
                                </p>
                                <address class="mt-1 not-italic text-black dark:text-white">
                                    Turmuzi, Jl. H. Badruddin, Bagu, Praya, Central Lombok Regency, West Nusa Tenggara 83371, Indonesia
                                </address>
                            </div>
                        </div>
                    </div>
                    <!-- End Grid -->
                </div>

                <div id="kontak">
                    <h3 class="mb-5 font-semibold text-black dark:text-white">
                        Kontak Kami
                    </h3>

                    <!-- Grid -->
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 md:gap-8 lg:gap-12">
                        <div class="flex gap-4">
                            <svg class="flex-shrink-0 text-gray-500 size-5 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z">
                                </path>
                                <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                            </svg>

                            <div class="grow">
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Website Kami
                                </p>
                                <p>
                                    <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 hover:before:bg-black focus:outline-none focus:before:bg-black dark:text-white dark:hover:before:bg-white dark:focus:before:bg-white"
                                        href="mailto:example@site.so">
                                        http://www.uniqhba.ac.id/
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <svg class="flex-shrink-0 text-gray-500 size-5 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>

                            <div class="grow">
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Hubungi Kami
                                </p>
                                <p>
                                    <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 hover:before:bg-black focus:outline-none focus:before:bg-black dark:text-white dark:hover:before:bg-white dark:focus:before:bg-white"
                                        href="mailto:example@site.so">
                                        087861860333
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Grid -->
                </div>
            </div>
            <!-- End Col -->
        </div>
    </div>
    <!-- End Contact -->
    <!-- ========== FOOTER ========== -->
    <footer class="relative overflow-hidden bg-neutral-900">
        <svg class="absolute -bottom-20 start-1/2 w-[1900px] transform -translate-x-1/2" width="2745"
            height="488" viewBox="0 0 2745 488" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0.5 330.864C232.505 403.801 853.749 527.683 1482.69 439.719C2111.63 351.756 2585.54 434.588 2743.87 487"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 308.873C232.505 381.81 853.749 505.692 1482.69 417.728C2111.63 329.765 2585.54 412.597 2743.87 465.009"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 286.882C232.505 359.819 853.749 483.701 1482.69 395.738C2111.63 307.774 2585.54 390.606 2743.87 443.018"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 264.891C232.505 337.828 853.749 461.71 1482.69 373.747C2111.63 285.783 2585.54 368.615 2743.87 421.027"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 242.9C232.505 315.837 853.749 439.719 1482.69 351.756C2111.63 263.792 2585.54 346.624 2743.87 399.036"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 220.909C232.505 293.846 853.749 417.728 1482.69 329.765C2111.63 241.801 2585.54 324.633 2743.87 377.045"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 198.918C232.505 271.855 853.749 395.737 1482.69 307.774C2111.63 219.81 2585.54 302.642 2743.87 355.054"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 176.927C232.505 249.864 853.749 373.746 1482.69 285.783C2111.63 197.819 2585.54 280.651 2743.87 333.063"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 154.937C232.505 227.873 853.749 351.756 1482.69 263.792C2111.63 175.828 2585.54 258.661 2743.87 311.072"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 132.946C232.505 205.882 853.749 329.765 1482.69 241.801C2111.63 153.837 2585.54 236.67 2743.87 289.082"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 110.955C232.505 183.891 853.749 307.774 1482.69 219.81C2111.63 131.846 2585.54 214.679 2743.87 267.091"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 88.9639C232.505 161.901 853.749 285.783 1482.69 197.819C2111.63 109.855 2585.54 192.688 2743.87 245.1"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 66.9729C232.505 139.91 853.749 263.792 1482.69 175.828C2111.63 87.8643 2585.54 170.697 2743.87 223.109"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 44.9819C232.505 117.919 853.749 241.801 1482.69 153.837C2111.63 65.8733 2585.54 148.706 2743.87 201.118"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 22.991C232.505 95.9276 853.749 219.81 1482.69 131.846C2111.63 43.8824 2585.54 126.715 2743.87 179.127"
                class="stroke-neutral-700/50" stroke="currentColor" />
            <path
                d="M0.5 1C232.505 73.9367 853.749 197.819 1482.69 109.855C2111.63 21.8914 2585.54 104.724 2743.87 157.136"
                class="stroke-neutral-700/50" stroke="currentColor" />
        </svg>

        <div class="relative z-10">
            <div class="w-full max-w-5xl px-4 py-10 mx-auto xl:px-0 lg:pt-16">
                <div class="inline-flex items-center">
                    <!-- Logo -->
                    @include('components.application-logo')
                    <!-- End Logo -->

                    <div class="border-s border-neutral-700 ps-5 ms-5">
                        <p class="text-sm text-neutral-400">2024 Zenith Team</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->
    <script>
        var map = L.map('map').setView([-8.619005661032194, 116.19892989454736], 15);
        var marker = L.marker([-8.619005661032194, 116.19892989454736]).addTo(map);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>
</body>

</html>
