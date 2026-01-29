@extends('layouts.public')

@section('title', 'Perpustakaan Digital - Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 text-white py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 leading-tight">
                        Temukan Buku <br>
                        <span class="text-yellow-400">Favoritmu</span>
                    </h1>
                    <p class="text-lg lg:text-xl text-blue-100 mb-8">
                        Akses ribuan koleksi buku dari berbagai kategori. Pinjam dengan mudah, baca dengan nyaman.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('books.index') }}"
                            class="bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold hover:bg-blue-50 transition shadow-lg inline-flex items-center justify-center gap-2">
                            <i class="ti ti-book"></i>
                            Jelajahi Buku
                        </a>
                        @guest
                            <a href="{{ route('register') }}"
                                class="border-2 border-white text-white px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-blue-600 transition inline-flex items-center justify-center gap-2">
                                <i class="ti ti-user-plus"></i>
                                Daftar Sekarang
                            </a>
                        @endguest
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute -top-4 -right-4 w-72 h-72 bg-yellow-400 rounded-full opacity-20 blur-3xl">
                        </div>
                        <div class="absolute -bottom-8 -left-8 w-64 h-64 bg-blue-400 rounded-full opacity-20 blur-3xl">
                        </div>
                        <div class="relative bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white/20 rounded-xl p-4 text-center">
                                    <i class="ti ti-books text-4xl mb-2"></i>
                                    <p class="text-2xl font-bold">{{ $stats['total_books'] ?? 0 }}+</p>
                                    <p class="text-sm text-blue-100">Koleksi Buku</p>
                                </div>
                                <div class="bg-white/20 rounded-xl p-4 text-center">
                                    <i class="ti ti-users text-4xl mb-2"></i>
                                    <p class="text-2xl font-bold">{{ $stats['total_members'] ?? 0 }}+</p>
                                    <p class="text-sm text-blue-100">Anggota</p>
                                </div>
                                <div class="bg-white/20 rounded-xl p-4 text-center col-span-2">
                                    <i class="ti ti-arrows-exchange text-4xl mb-2"></i>
                                    <p class="text-2xl font-bold">{{ $stats['total_borrowings'] ?? 0 }}+</p>
                                    <p class="text-sm text-blue-100">Total Peminjaman</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats for Mobile -->
    <section class="lg:hidden bg-white py-8 shadow-sm">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-3 gap-4 text-center">
                <div>
                    <p class="text-2xl font-bold text-blue-600">{{ $stats['total_books'] ?? 0 }}+</p>
                    <p class="text-sm text-gray-500">Buku</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-blue-600">{{ $stats['total_members'] ?? 0 }}+</p>
                    <p class="text-sm text-gray-500">Anggota</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-blue-600">{{ $stats['total_borrowings'] ?? 0 }}+</p>
                    <p class="text-sm text-gray-500">Peminjaman</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books -->
    <section class="py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Buku Terbaru</h2>
                    <p class="text-gray-500 mt-2">Koleksi buku terbaru yang bisa Anda pinjam</p>
                </div>
                <a href="{{ route('books.index') }}"
                    class="hidden md:flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                    Lihat Semua <i class="ti ti-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($books as $book)
                    <a href="{{ route('books.show', $book->slug) }}"
                        class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                        <div class="aspect-[3/4] bg-gradient-to-br from-blue-100 to-indigo-100 relative overflow-hidden">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="ti ti-book text-6xl text-blue-300"></i>
                                </div>
                            @endif
                            @if ($book->isAvailable())
                                <span
                                    class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Tersedia</span>
                            @else
                                <span
                                    class="absolute top-3 right-3 bg-red-500 text-white text-xs px-2 py-1 rounded-full">Tidak
                                    Tersedia</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <p class="text-xs text-blue-600 font-medium mb-1">{{ $book->category->name }}</p>
                            <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2 group-hover:text-blue-600 transition">
                                {{ $book->title }}</h3>
                            <p class="text-sm text-gray-500">{{ $book->author }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12">
                        <i class="ti ti-books text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500">Belum ada buku tersedia</p>
                    </div>
                @endforelse
            </div>

            <div class="md:hidden mt-8 text-center">
                <a href="{{ route('books.index') }}"
                    class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                    Lihat Semua Buku <i class="ti ti-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="bg-gray-100 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Kenapa Pilih Kami?</h2>
                <p class="text-gray-500 mt-2">Fitur-fitur yang memudahkan Anda dalam mengakses buku</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="ti ti-search text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Pencarian Mudah</h3>
                    <p class="text-gray-500">Cari buku berdasarkan judul, penulis, atau kategori dengan cepat dan mudah.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="ti ti-clock text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Proses Cepat</h3>
                    <p class="text-gray-500">Peminjaman diproses dengan cepat. Anda akan mendapat konfirmasi segera.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="ti ti-heart text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Simpan Favorit</h3>
                    <p class="text-gray-500">Simpan buku favorit Anda untuk dipinjam nanti atau sebagai referensi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 lg:p-16 text-center text-white">
                <h2 class="text-3xl lg:text-4xl font-bold mb-4">Siap Untuk Mulai Membaca?</h2>
                <p class="text-blue-100 mb-8 max-w-2xl mx-auto">
                    Daftar sekarang dan mulai jelajahi ribuan koleksi buku kami. Gratis dan mudah!
                </p>
                @guest
                    <a href="{{ route('register') }}"
                        class="bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold hover:bg-blue-50 transition shadow-lg inline-flex items-center gap-2">
                        <i class="ti ti-user-plus"></i>
                        Daftar Sekarang
                    </a>
                @else
                    <a href="{{ route('books.index') }}"
                        class="bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold hover:bg-blue-50 transition shadow-lg inline-flex items-center gap-2">
                        <i class="ti ti-book"></i>
                        Jelajahi Buku
                    </a>
                @endguest
            </div>
        </div>
    </section>
@endsection
