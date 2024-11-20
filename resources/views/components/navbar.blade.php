<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asrama Unmul</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <nav x-data="{ isOpen: false }" class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Brand -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img class="h-10 w-auto" src="{{ asset('images/galeri/logo unmul.png') }}" alt="Logo Unmul">
                        <span class="text-xl font-bold text-gray-900">Asrama Unmul</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700 hover:text-green-600 transition duration-150 ease-in-out">
                        Beranda
                    </a>
                    <a href="{{ route('about.index') }}" 
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700 hover:text-green-600 transition duration-150 ease-in-out">
                        Tentang
                    </a>
                    <a href="{{ route('fasilitas.index') }}" 
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700 hover:text-green-600 transition duration-150 ease-in-out">
                        Fasilitas
                    </a>
                    <a href="{{ route('galeri.index') }}" 
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700 hover:text-green-600 transition duration-150 ease-in-out">
                        Galeri
                    </a>

                    @guest
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 transition duration-150 ease-in-out">
                            Masuk
                        </a>
                    @else
                        <div class="relative ml-3" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" 
                                        class="flex items-center text-sm font-medium text-gray-700 hover:text-green-600 focus:outline-none transition duration-150 ease-in-out">
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <div x-show="open"
                                 @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                                 role="menu"
                                 aria-orientation="vertical"
                                 aria-labelledby="user-menu">
                                <div class="py-1" role="none">
                                    <a href="" 
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out" 
                                       role="menuitem">
                                        Profil Saya
                                    </a>
                                    @if(Auth::user()->role === 'admin')
                                        <a href="{{ route('admin.dashboard') }}" 
                                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out" 
                                           role="menuitem">
                                            Dashboard Admin
                                        </a>
                                    @endif
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out"
                                                role="menuitem">
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="isOpen = !isOpen"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-green-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" 
                             :class="{'hidden': isOpen, 'block': !isOpen }"
                             xmlns="http://www.w3.org/2000/svg" 
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6" 
                             :class="{'block': isOpen, 'hidden': !isOpen }"
                             xmlns="http://www.w3.org/2000/svg" 
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" class="md:hidden bg-white">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" 
                   class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Beranda
                </a>
                <a href="{{ route('about.index') }}" 
                   class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Tentang
                </a>
                <a href="{{ route('fasilitas.index') }}" 
                   class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Fasilitas
                </a>
                <a href="{{ route('galeri.index') }}" 
                   class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Galeri
                </a>

                @guest
                    <a href="{{ route('login') }}" 
                       class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                        Masuk
                    </a>
                    
                @else
                    <a href="" 
                       class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                        Profil Saya
                    </a>
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" 
                           class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                            Dashboard Admin
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block w-full text-left pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                            Keluar
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</body>
</html>