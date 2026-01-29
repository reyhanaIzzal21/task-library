@extends('layouts.public')

@section('title', $book->title . ' - Perpustakaan Digital')

@section('content')
    <section class="py-8 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center gap-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-500 hover:text-blue-600">Beranda</a></li>
                    <li class="text-gray-400">/</li>
                    <li><a href="{{ route('books.index') }}" class="text-gray-500 hover:text-blue-600">Buku</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-800 font-medium">{{ Str::limit($book->title, 30) }}</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Book Cover -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        <div
                            class="aspect-[3/4] bg-gradient-to-br from-blue-100 to-indigo-100 rounded-2xl overflow-hidden shadow-lg">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="ti ti-book text-8xl text-blue-300"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons (Mobile) -->
                        <div class="mt-6 lg:hidden flex flex-col gap-3">
                            @auth
                                @if ($book->isAvailable())
                                    <a href="{{ route('borrow.create', $book->id) }}"
                                        class="bg-blue-600 text-white px-6 py-4 rounded-xl font-semibold hover:bg-blue-700 transition flex items-center justify-center gap-2 shadow-lg shadow-blue-500/30">
                                        <i class="ti ti-book-upload"></i>
                                        Pinjam Buku Ini
                                    </a>
                                @else
                                    <button disabled
                                        class="bg-gray-400 text-white px-6 py-4 rounded-xl font-semibold cursor-not-allowed flex items-center justify-center gap-2">
                                        <i class="ti ti-book-off"></i>
                                        Tidak Tersedia
                                    </button>
                                @endif
                                <form action="{{ route('favorites.toggle', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full border-2 {{ auth()->user()->hasFavorited($book->id) ? 'border-red-500 text-red-500' : 'border-gray-300 text-gray-600' }} px-6 py-4 rounded-xl font-semibold hover:bg-gray-50 transition flex items-center justify-center gap-2">
                                        <i
                                            class="ti ti-heart{{ auth()->user()->hasFavorited($book->id) ? '-filled' : '' }}"></i>
                                        {{ auth()->user()->hasFavorited($book->id) ? 'Hapus dari Favorit' : 'Tambah ke Favorit' }}
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                    class="bg-blue-600 text-white px-6 py-4 rounded-xl font-semibold hover:bg-blue-700 transition flex items-center justify-center gap-2 shadow-lg shadow-blue-500/30">
                                    <i class="ti ti-login"></i>
                                    Login untuk Meminjam
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Book Details -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm p-6 lg:p-8 border border-gray-100">
                        <span
                            class="inline-block bg-blue-100 text-blue-600 text-sm font-medium px-3 py-1 rounded-full mb-4">
                            {{ $book->category->name }}
                        </span>

                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">{{ $book->title }}</h1>

                        <p class="text-xl text-gray-600 mb-6">oleh <span class="font-medium">{{ $book->author }}</span></p>

                        <!-- Book Info -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-sm text-gray-500 mb-1">Penerbit</p>
                                <p class="font-medium text-gray-800">{{ $book->publisher ?: '-' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-sm text-gray-500 mb-1">Tahun Terbit</p>
                                <p class="font-medium text-gray-800">{{ $book->year ?: '-' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-sm text-gray-500 mb-1">ISBN</p>
                                <p class="font-medium text-gray-800">{{ $book->isbn ?: '-' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-sm text-gray-500 mb-1">Stok Total</p>
                                <p class="font-medium text-gray-800">{{ $book->stock }} buku</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-sm text-gray-500 mb-1">Tersedia</p>
                                <p class="font-medium {{ $book->isAvailable() ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $book->available_stock }} buku
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-sm text-gray-500 mb-1">Status</p>
                                @if ($book->isAvailable())
                                    <span class="inline-flex items-center gap-1 text-green-600 font-medium">
                                        <i class="ti ti-check"></i> Tersedia
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-red-600 font-medium">
                                        <i class="ti ti-x"></i> Tidak Tersedia
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Deskripsi</h3>
                            <div class="prose max-w-none text-gray-600">
                                {!! nl2br(e($book->description)) ?: '<p class="text-gray-400 italic">Tidak ada deskripsi tersedia.</p>' !!}
                            </div>
                        </div>

                        <!-- Action Buttons (Desktop) -->
                        <div class="hidden lg:flex gap-4">
                            @auth
                                @if ($book->isAvailable())
                                    <a href="{{ route('borrow.create', $book->id) }}"
                                        class="bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-blue-700 transition flex items-center gap-2 shadow-lg shadow-blue-500/30">
                                        <i class="ti ti-book-upload"></i>
                                        Pinjam Buku Ini
                                    </a>
                                @else
                                    <button disabled
                                        class="bg-gray-400 text-white px-8 py-4 rounded-xl font-semibold cursor-not-allowed flex items-center gap-2">
                                        <i class="ti ti-book-off"></i>
                                        Tidak Tersedia
                                    </button>
                                @endif
                                <form action="{{ route('favorites.toggle', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="border-2 {{ auth()->user()->hasFavorited($book->id) ? 'border-red-500 text-red-500' : 'border-gray-300 text-gray-600' }} px-8 py-4 rounded-xl font-semibold hover:bg-gray-50 transition flex items-center gap-2">
                                        <i
                                            class="ti ti-heart{{ auth()->user()->hasFavorited($book->id) ? '-filled' : '' }}"></i>
                                        {{ auth()->user()->hasFavorited($book->id) ? 'Hapus dari Favorit' : 'Tambah ke Favorit' }}
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                    class="bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-blue-700 transition flex items-center gap-2 shadow-lg shadow-blue-500/30">
                                    <i class="ti ti-login"></i>
                                    Login untuk Meminjam
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Books -->
            @if ($relatedBooks->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-800 mb-8">Buku Lainnya dari Kategori Ini</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        @foreach ($relatedBooks as $related)
                            <a href="{{ route('books.show', $related->slug) }}"
                                class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                                <div
                                    class="aspect-[3/4] bg-gradient-to-br from-blue-100 to-indigo-100 relative overflow-hidden">
                                    @if ($related->cover_image)
                                        <img src="{{ asset('storage/' . $related->cover_image) }}"
                                            alt="{{ $related->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="ti ti-book text-6xl text-blue-300"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3
                                        class="font-semibold text-gray-800 mb-1 line-clamp-2 group-hover:text-blue-600 transition">
                                        {{ $related->title }}</h3>
                                    <p class="text-sm text-gray-500">{{ $related->author }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
