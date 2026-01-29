<footer class="bg-gray-800 text-white py-12 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center">
                        <i class="ti ti-books text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold">Perpustakaan</span>
                </div>
                <p class="text-gray-400">Perpustakaan digital untuk memudahkan akses buku dan peminjaman.</p>
            </div>
            <div>
                <h3 class="font-semibold mb-4">Menu</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('books.index') }}" class="hover:text-white transition">Daftar Buku</a>
                    </li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">Tentang</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold mb-4">Kontak</h3>
                <ul class="space-y-2 text-gray-400">
                    <li class="flex items-center gap-2"><i class="ti ti-mail"></i> info@perpustakaan.com</li>
                    <li class="flex items-center gap-2"><i class="ti ti-phone"></i> (021) 123-4567</li>
                    <li class="flex items-center gap-2"><i class="ti ti-map-pin"></i> Jakarta, Indonesia</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Perpustakaan Digital. All rights reserved.</p>
        </div>
    </div>
</footer>
