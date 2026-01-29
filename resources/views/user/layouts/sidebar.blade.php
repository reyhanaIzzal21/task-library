<aside id="user-sidebar"
    class="fixed top-0 start-0 h-screen z-[60] w-[270px] bg-white border-r border-gray-200 shadow-lg transform -translate-x-full xl:translate-x-0 transition-transform duration-300 ease-in-out">

    <div class="absolute top-3 end-3 xl:hidden">
        <button type="button" onclick="closeSidebar()"
            class="w-8 h-8 inline-flex justify-center items-center rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors">
            <i class="ti ti-x text-lg"></i>
        </button>
    </div>

    <div class="p-5 border-b border-gray-100">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                <i class="ti ti-books text-white text-xl"></i>
            </div>
            <div>
                <h2 class="font-bold text-lg text-gray-800">Perpustakaan</h2>
                <span class="text-xs text-gray-500">Member Panel</span>
            </div>
        </a>
    </div>

    <div class="h-[calc(100vh-100px)] overflow-y-auto px-4 py-6">
        <nav class="w-full flex flex-col">
            <ul class="text-gray-700 text-sm space-y-1">
                <li class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 pb-2">
                    <span>Menu Utama</span>
                </li>

                <li>
                    <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg w-full transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('user.dashboard') ? 'bg-blue-500 text-white shadow-md shadow-blue-500/30' : 'text-gray-600' }}"
                        href="{{ route('user.dashboard') }}">
                        <i class="ti ti-layout-dashboard text-xl"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg w-full transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('user.borrowings') ? 'bg-blue-500 text-white shadow-md shadow-blue-500/30' : 'text-gray-600' }}"
                        href="{{ route('user.borrowings') }}">
                        <i class="ti ti-book-upload text-xl"></i>
                        <span class="font-medium">Peminjaman Aktif</span>
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg w-full transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('user.history') ? 'bg-blue-500 text-white shadow-md shadow-blue-500/30' : 'text-gray-600' }}"
                        href="{{ route('user.history') }}">
                        <i class="ti ti-history text-xl"></i>
                        <span class="font-medium">Riwayat Pengembalian</span>
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg w-full transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('user.favorites') ? 'bg-blue-500 text-white shadow-md shadow-blue-500/30' : 'text-gray-600' }}"
                        href="{{ route('user.favorites') }}">
                        <i class="ti ti-heart text-xl"></i>
                        <span class="font-medium">Buku Favorit</span>
                    </a>
                </li>

                <li class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 pb-2 pt-6">
                    <span>Jelajahi</span>
                </li>

                <li>
                    <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg w-full transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 text-gray-600"
                        href="{{ route('books.index') }}">
                        <i class="ti ti-books text-xl"></i>
                        <span class="font-medium">Cari Buku</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
