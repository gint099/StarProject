<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Star Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #0f1117;
            color: #fff;
            background-image: url('/storage/assets/pngwing.com (1).png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }
        a { text-decoration: none; color: inherit; }
        [x-cloak] { display: none !important; }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .nav-text { display: none; }
            .nav-icon { margin-right: 0 !important; }
        }

        @media (max-width: 640px) {
            .desktop-nav { display: none; }
            .mobile-nav { display: block; }
        }

        @media (min-width: 641px) {
            .desktop-nav { display: flex; }
            .mobile-nav { display: none; }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>
<body class="overflow-x-hidden">
    <header class="p-2 sm:p-4 bg-gray-900 shadow-md">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-2 flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('storage/assets/icon/logo.png') }}" alt="Star Project" class="h-6 sm:h-8">
                    <span class="text-lg sm:text-xl font-bold hidden sm:block">Star Project</span>
                    <span class="text-sm font-bold sm:hidden">Star</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="desktop-nav items-center gap-2 lg:gap-4 flex-1 justify-center">
                <!-- Characters -->
                <a href="{{ route('characters.index') }}" class="hover:text-yellow-400 font-bold flex items-center space-x-1 lg:space-x-2 text-sm lg:text-xl">
                    <img src="{{ asset('storage/assets/icon/character.png') }}" class="h-6 lg:h-8 nav-icon">
                    <span class="nav-text">Characters</span>
                </a>

                <!-- Dropdown Menu -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="hover:text-yellow-400 font-bold flex items-center space-x-1 lg:space-x-2 focus:outline-none text-sm lg:text-xl">
                        <img src="{{ asset('storage/assets/icon/data.svg') }}" class="h-6 lg:h-8 nav-icon">
                        <span class="nav-text">Data</span>
                    </button>
                    <ul x-show="open" @click.outside="open = false" x-transition
                        class="absolute bg-gray-800 text-white mt-2 rounded shadow-lg z-50 min-w-[120px] lg:min-w-[150px] right-0 lg:left-0">
                        <li>
                            <a href="{{ route('lightcones.index') }}" class="block px-3 py-2 hover:bg-yellow-500 text-sm lg:text-base">Lightcones</a>
                        </li>
                        <li>
                            <a href="{{ route('relics.index') }}" class="block px-3 py-2 hover:bg-yellow-500 text-sm lg:text-base">Relics</a>
                        </li>
                        <li>
                            <a href="{{ route('builds.index') }}" class="block px-3 py-2 hover:bg-yellow-500 text-sm lg:text-base">Build</a>
                        </li>
                        <li>
                            <a href="{{ route('boss-guides.index') }}" class="block px-3 py-2 hover:bg-yellow-500 text-sm lg:text-base">Boss Guide</a>
                        </li>
                        <li>
                            <a href="{{ route('parties.index') }}" class="block px-3 py-2 hover:bg-yellow-500 text-sm lg:text-base">Party</a>
                        </li>
                        <li>
                            <a href="{{ route('faq.index') }}" class="block px-3 py-2 hover:bg-yellow-500 text-sm lg:text-base">FAQ</a>
                        </li>

                    </ul>
                </div>

                <!-- Guides -->
                <a href="{{ route('guides.index') }}" class="hover:text-yellow-400 font-bold flex items-center space-x-1 lg:space-x-2 text-sm lg:text-xl">
                    <img src="{{ asset('storage/assets/icon/guide.png') }}" class="h-6 lg:h-8 nav-icon">
                    <span class="nav-text">Guides</span>
                </a>

                <!-- Forum -->
                <a href="/forum" class="hover:text-yellow-400 font-bold flex items-center space-x-1 lg:space-x-2 text-sm lg:text-xl">
                    <img src="{{ asset('storage/assets/icon/forum.png') }}" class="h-6 lg:h-8 nav-icon">
                    <span class="nav-text">Forum</span>
                </a>
            </nav>

            <!-- Mobile Navigation -->
            <div class="mobile-nav">
                <div x-data="{ mobileOpen: false }" class="relative">
                    <button @click="mobileOpen = !mobileOpen" class="text-white hover:text-yellow-400 focus:outline-none">
                        <i class="bi bi-list text-2xl"></i>
                    </button>

                    <!-- Mobile Menu Overlay -->
                    <div x-show="mobileOpen" @click.outside="mobileOpen = false" x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg z-50">

                        <div class="py-2">
                            <a href="{{ route('characters.index') }}" class="flex items-center px-4 py-2 text-white hover:bg-yellow-500">
                                <img src="{{ asset('storage/assets/icon/character.png') }}" class="h-5 mr-3">
                                Characters
                            </a>

                            <!-- Data submenu -->
                            <div x-data="{ dataOpen: false }">
                                <button @click="dataOpen = !dataOpen" class="flex items-center justify-between w-full px-4 py-2 text-white hover:bg-gray-700 focus:outline-none">
                                    <div class="flex items-center">
                                        <img src="{{ asset('storage/assets/icon/data.svg') }}" class="h-5 mr-3">
                                        Data
                                    </div>
                                    <i class="bi bi-chevron-down" :class="{ 'rotate-180': dataOpen }"></i>
                                </button>
                                <div x-show="dataOpen" x-transition class="bg-gray-700">
                                    <a href="{{ route('lightcones.index') }}" class="block px-8 py-2 text-white hover:bg-yellow-500">Lightcones</a>
                                    <a href="{{ route('relics.index') }}" class="block px-8 py-2 text-white hover:bg-yellow-500">Relics</a>
                                    <a href="{{ route('builds.index') }}" class="block px-8 py-2 text-white hover:bg-yellow-500">Build</a>
                                    <a href="{{ route('boss-guides.index') }}" class="block px-8 py-2 text-white hover:bg-yellow-500">Boss Guide</a>
                                    <a href="{{ route('parties.index') }}" class="block px-8 py-2 text-white hover:bg-yellow-500">Party</a>
                                    <a href="{{ route('faq.index') }}" class="block px-8 py-2 text-white hover:bg-yellow-500">FAQ</a>
                                </div>
                            </div>

                            <a href="{{ route('guides.index') }}" class="flex items-center px-4 py-2 text-white hover:bg-yellow-500">
                                <img src="{{ asset('storage/assets/icon/guide.png') }}" class="h-5 mr-3">
                                Guides
                            </a>

                            <a href="/forum" class="flex items-center px-4 py-2 text-white hover:bg-yellow-500">
                                <img src="{{ asset('storage/assets/icon/forum.png') }}" class="h-5 mr-3">
                                Forum
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="p-4 sm:p-6">
        @yield('content')
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
