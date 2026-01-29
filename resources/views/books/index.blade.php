@extends('layouts.public')

@section('title', 'Daftar Buku - Perpustakaan Digital')

@section('content')
    <section class="py-8 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Buku</h1>
                <p class="text-gray-500 mt-2">Temukan buku yang Anda cari dari berbagai kategori</p>
            </div>

            <!-- Search & Filter -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-8 border border-gray-100">
                <form action="{{ route('books.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <i class="ti ti-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari judul buku, penulis, atau ISBN..."
                                class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        </div>
                    </div>
                    <div class="lg:w-64">
                        <select name="category"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition flex items-center justify-center gap-2">
                        <i class="ti ti-search"></i>
                        Cari
                    </button>
                </form>
            </div>

            <!-- Results Info -->
            @if (request()->hasAny(['search', 'category']))
                <div class="mb-6 flex items-center justify-between">
                    <p class="text-gray-600">
                        Menampilkan {{ $books->count() }} dari {{ $books->total() }} buku
                        @if (request('search'))
                            untuk "<strong>{{ request('search') }}</strong>"
                        @endif
                    </p>
                    <a href="{{ route('books.index') }}" class="text-blue-600 hover:text-blue-700 text-sm">
                        <i class="ti ti-x"></i> Reset Filter
                    </a>
                </div>
            @endif

            <!-- Books Grid -->
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
                            <p class="text-xs text-gray-400 mt-2">Stok: {{ $book->available_stock }}/{{ $book->stock }}
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16">
                        <i class="ti ti-books text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak Ada Buku Ditemukan</h3>
                        <p class="text-gray-500">Coba gunakan kata kunci atau filter yang berbeda</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($books->hasPages())
                <div class="mt-8">
                    {{ $books->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
