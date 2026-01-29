<aside id="application-sidebar-brand"
    class="fixed top-0 start-0 h-screen z-[60] w-[270px] bg-white border-r border-gray-200 shadow-lg transform -translate-x-full xl:translate-x-0 transition-transform duration-300 ease-in-out">

    <!-- Close button for mobile -->
    <div class="absolute top-3 end-3 xl:hidden">
        <button type="button" onclick="closeSidebarAdminDashboard()"
            class="w-8 h-8 inline-flex justify-center items-center rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors">
            <span class="sr-only">Close</span>
            <i class="ti ti-x text-lg"></i>
        </button>
    </div>

    <!-- Logo Section -->
    <div class="p-5 border-b border-gray-100">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                <i class="ti ti-books text-white text-xl"></i>
            </div>
            <div>
                <h2 class="font-bold text-lg text-gray-800">Perpustakaan</h2>
                <span class="text-xs text-gray-500">Admin Panel</span>
            </div>
        </a>
    </div>

    <!-- Scrollable Navigation -->
    <div class="h-[calc(100vh-100px)] overflow-y-auto px-4 py-6">
        <nav class="w-full flex flex-col">
            <ul id="sidebarnav" class="text-gray-700 text-sm space-y-1">

                {{-- HOME --}}
                <li class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 pb-2">
                    <span>HOME</span>
                </li>

                <li>
                    <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg w-full transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500 text-white shadow-md shadow-blue-500/30' : 'text-gray-600' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="ti ti-layout-dashboard text-xl"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>

                {{-- KELOLA --}}
                <li class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 pb-2 pt-6">
                    <span>KELOLA</span>
                </li>

                <li>
                    <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg w-full transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.books.*') ? 'bg-blue-500 text-white shadow-md shadow-blue-500/30' : 'text-gray-600' }}"
                        href="{{ route('admin.books.index') }}">
                        <i class="ti ti-book text-xl"></i>
                        <span class="font-medium">Kelola Buku</span>
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg w-full transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.members.*') ? 'bg-blue-500 text-white shadow-md shadow-blue-500/30' : 'text-gray-600' }}"
                        href="{{ route('admin.members.index') }}">
                        <i class="ti ti-users text-xl"></i>
                        <span class="font-medium">Kelola Anggota</span>
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg w-full transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.borrowings.*') ? 'bg-blue-500 text-white shadow-md shadow-blue-500/30' : 'text-gray-600' }}"
                        href="{{ route('admin.borrowings.index') }}">
                        <i class="ti ti-arrows-exchange text-xl"></i>
                        <span class="font-medium">Kelola Peminjaman</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
