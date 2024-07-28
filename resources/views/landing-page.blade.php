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
    <!-- ========== HEADER ========== -->
    <header class="z-50 flex flex-wrap w-full md:justify-start md:flex-nowrap py-7">
        <nav
            class="relative flex flex-wrap items-center w-full px-4 mx-auto max-w-7xl md:grid md:grid-cols-12 basis-full md:px-6 md:px-8">
            <div class="md:col-span-3">
                <!-- Logo -->
                <a class="flex items-center inline-block text-xl font-semibold text-gray-700 rounded-xl focus:outline-none focus:opacity-80"
                    href="../templates/creative-agency/index.html" aria-label="Preline">
                    <x-application-logo></x-application-logo> <span class="ml-3">Survei Bagu SIG</span>
                </a>
                <!-- End Logo -->
            </div>

            <!-- Button Group -->
            <div class="flex items-center py-1 gap-x-1 md:gap-x-2 ms-auto md:ps-6 md:order-3 md:col-span-3">
                <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 hover:before:bg-black focus:outline-none focus:before:bg-black dark:text-white dark:hover:before:bg-white dark:focus:before:bg-white"
                    href="https://wa.link/0xm99v">
                    085338562718
                </a>

                <div class="md:hidden">
                    <button type="button"
                        class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail"
                        aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
                        <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hidden hs-collapse-open:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- End Button Group -->

            <!-- Collapse -->
            <div id="hs-navbar-hcail"
                class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6"
                aria-labelledby="hs-navbar-hcail-collapse">
                <div
                    class="flex flex-col mt-5 gap-y-4 gap-x-0 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0">
                </div>
            </div>
            </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->
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
                <form action="{{ route('survey', ['id' => $surveyId]) }}" method="post">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-center text-green-700 bg-green-100 border border-transparent border-green-400 rounded-full gap-x-3 hover:text-white hover:bg-green-600">Mulai
                        Survei
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </form>
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
                Kontak
            </h2>
        </div>

        <div class="flex flex-row items-center p-6 justify-items-center">
            <!-- End Col -->
                <div class="p-5">
                    <h3 class="mb-2 font-semibold text-black dark:text-white">
                        Alamat
                    </h3>
                    <!-- Grid -->
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
                                    Turmuzi, Jl. H. Badruddin, Bagu, Praya, Central Lombok Regency, West Nusa Tenggara
                                    83371, Indonesia
                                </address>
                            </div>
                    </div>
                    <!-- End Grid -->
                </div>
                <div>
                    <h3 class="mb-5 font-semibold text-black dark:text-white">
                        Kontak Kami
                    </h3>
                    <!-- Grid -->
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
                                        href="">
                                        085338562718
                                    </a>
                                </p>
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
    <!-- ========== FOOTER ========== -->
    <hr>
    <footer class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <!-- Grid -->
        <div class="text-center">
            <div>
                <a class="flex-none text-xl font-semibold text-black dark:text-white" href="#"
                    aria-label="Brand">
                    Survey Bagu SIG
                </a>
            </div>
            <!-- End Col -->

            <div class="mt-3">
                <p class="text-gray-500 dark:text-neutral-500">© saomiasri@gmail.com. 2024</p>
            </div>

            <!-- End Social Brands -->
        </div>
        <!-- End Grid -->
    </footer>
    <!-- ========== END FOOTER ========== -->
</body>

</html>
