@extends('admin.layouts.app')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Kelola Buku</h1>
                <p class="text-gray-500">Kelola koleksi buku perpustakaan</p>
            </div>
            <a href="{{ route('admin.books.create') }}"
                class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition flex items-center justify-center gap-2 shadow-md">
                <i class="ti ti-plus"></i>
                Tambah Buku
            </a>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
            <form action="{{ route('admin.books.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari judul, penulis, atau ISBN..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <select name="category"
                    class="px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <select name="status" class="px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Status</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="unavailable" {{ request('status') == 'unavailable' ? 'selected' : '' }}>Tidak Tersedia
                    </option>
                </select>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">
                    <i class="ti ti-search"></i> Cari
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Buku</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Kategori</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Stok</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Status</th>
                            <th class="text-center px-6 py-4 text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($books as $book)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-12 h-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                                            @if ($book->cover_image)
                                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt=""
                                                    class="w-full h-full object-cover">
                                            @else
                                                <i class="ti ti-book text-blue-500"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $book->title }}</p>
                                            <p class="text-sm text-gray-500">{{ $book->author }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $book->category->name }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $book->available_stock }}/{{ $book->stock }}</td>
                                <td class="px-6 py-4">
                                    @if ($book->isAvailable())
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Tersedia</span>
                                    @else
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">Tidak
                                            Tersedia</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.books.edit', $book->id) }}"
                                            class="w-9 h-9 flex items-center justify-center bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-9 h-9 flex items-center justify-center bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    <i class="ti ti-books text-4xl mb-2"></i>
                                    <p>Belum ada buku</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($books->hasPages())
                <div class="p-6 border-t border-gray-100">
                    {{ $books->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
