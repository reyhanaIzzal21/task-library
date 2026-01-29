<header class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
    <div class="flex items-center justify-between px-4 lg:px-6 h-16">
        <div class="flex items-center gap-4">
            <button onclick="openSidebar()" class="xl:hidden text-gray-600 hover:text-blue-600">
                <i class="ti ti-menu-2 text-2xl"></i>
            </button>
            <h1 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
        </div>

        <div class="flex items-center gap-4" x-data="{ open: false }">
            <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-blue-600">
                <i class="ti ti-search text-xl"></i>
            </a>

            <div class="relative">
                <button @click="open = !open"
                    class="flex items-center gap-3 hover:bg-gray-50 rounded-lg px-3 py-2 transition">
                    <div
                        class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                        {{ auth()->user()->initials() }}
                    </div>
                    <span class="hidden md:block text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                    <i class="ti ti-chevron-down text-gray-400"></i>
                </button>

                <div x-show="open" @click.away="open = false" x-cloak
                    class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2">
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-2 px-4 py-2 text-gray-600 hover:bg-gray-50">
                        <i class="ti ti-home"></i> Beranda
                    </a>
                    <hr class="my-2">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 px-4 py-2 text-red-600 hover:bg-red-50 w-full text-left">
                            <i class="ti ti-logout"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
