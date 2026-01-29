<nav class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                        <i class="ti ti-books text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-800">Perpustakaan</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}"
                    class="text-gray-600 hover:text-blue-600 transition {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">Beranda</a>
                <a href="{{ route('books.index') }}"
                    class="text-gray-600 hover:text-blue-600 transition {{ request()->routeIs('books.*') ? 'text-blue-600 font-semibold' : '' }}">Daftar
                    Buku</a>
                <a href="{{ route('about') }}"
                    class="text-gray-600 hover:text-blue-600 transition {{ request()->routeIs('about') ? 'text-blue-600 font-semibold' : '' }}">Tentang</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('user.dashboard') }}"
                        class="text-gray-600 hover:text-blue-600 transition">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-red-600 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow-md shadow-blue-500/30">
                        Daftar
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileOpen = !mobileOpen" class="text-gray-600 hover:text-blue-600">
                    <i class="ti ti-menu-2 text-2xl" x-show="!mobileOpen"></i>
                    <i class="ti ti-x text-2xl" x-show="mobileOpen" x-cloak></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="mobileOpen" x-cloak class="md:hidden pb-4">
            <div class="flex flex-col gap-3">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600 py-2">Beranda</a>
                <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-blue-600 py-2">Daftar Buku</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600 py-2">Tentang</a>
                <hr class="my-2">
                @auth
                    <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('user.dashboard') }}"
                        class="text-gray-600 hover:text-blue-600 py-2">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-gray-600 hover:text-red-600 py-2 w-full text-left">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 py-2">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg text-center">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
