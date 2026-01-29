@extends('user.layouts.app')

@section('title', 'Buku Favorit - Perpustakaan Digital')
@section('page-title', 'Buku Favorit')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800">Daftar Buku Favorit</h2>
            <p class="text-sm text-gray-500">Buku yang Anda simpan untuk referensi</p>
        </div>

        @if ($favorites->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($favorites as $favorite)
                    <div class="group relative">
                        <a href="{{ route('books.show', $favorite->book->slug) }}"
                            class="block bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                            <div class="aspect-[3/4] bg-gradient-to-br from-blue-100 to-indigo-100 relative overflow-hidden">
                                @if ($favorite->book->cover_image)
                                    <img src="{{ asset('storage/' . $favorite->book->cover_image) }}"
                                        alt="{{ $favorite->book->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="ti ti-book text-6xl text-blue-300"></i>
                                    </div>
                                @endif
                                @if ($favorite->book->isAvailable())
                                    <span
                                        class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Tersedia</span>
                                @endif
                            </div>
                            <div class="p-4">
                                <p class="text-xs text-blue-600 font-medium mb-1">{{ $favorite->book->category->name }}</p>
                                <h3
                                    class="font-semibold text-gray-800 mb-1 line-clamp-2 group-hover:text-blue-600 transition">
                                    {{ $favorite->book->title }}</h3>
                                <p class="text-sm text-gray-500">{{ $favorite->book->author }}</p>
                            </div>
                        </a>
                        <form action="{{ route('favorites.toggle', $favorite->book->id) }}" method="POST"
                            class="absolute top-3 left-3">
                            @csrf
                            <button type="submit"
                                class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center text-red-500 hover:bg-red-50 transition">
                                <i class="ti ti-heart-filled"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            @if ($favorites->hasPages())
                <div class="mt-8">
                    {{ $favorites->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <i class="ti ti-heart-off text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Buku Favorit</h3>
                <p class="text-gray-500 mb-4">Tambahkan buku ke favorit saat menjelajahi koleksi</p>
                <a href="{{ route('books.index') }}"
                    class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">
                    <i class="ti ti-books"></i>
                    Jelajahi Buku
                </a>
            </div>
        @endif
    </div>
@endsection
