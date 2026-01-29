@extends('admin.layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.books.index') }}" class="text-gray-600 hover:text-blue-600">
                <i class="ti ti-arrow-left text-2xl"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Edit Buku</h1>
                <p class="text-gray-500">{{ $book->title }}</p>
            </div>
        </div>

        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-2xl shadow-sm p-6 lg:p-8 border border-gray-100 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Buku *</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                    <select name="category_id" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 @error('category_id') border-red-500 @enderror">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Penulis *</label>
                    <input type="text" name="author" value="{{ old('author', $book->author) }}" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 @error('author') border-red-500 @enderror">
                    @error('author')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Penerbit</label>
                    <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Terbit</label>
                    <input type="number" name="year" value="{{ old('year', $book->year) }}" min="1900"
                        max="{{ date('Y') + 1 }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                    <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 @error('isbn') border-red-500 @enderror">
                    @error('isbn')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Stok *</label>
                    <input type="number" name="stock" value="{{ old('stock', $book->stock) }}" min="1" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Tersedia: {{ $book->available_stock }}/{{ $book->stock }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cover Buku</label>
                    <input type="file" name="cover_image" accept="image/*"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                    @if ($book->cover_image)
                        <p class="text-xs text-gray-500 mt-1">Cover saat ini akan tetap jika tidak diubah</p>
                    @endif
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">{{ old('description', $book->description) }}</textarea>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition shadow-md">
                    <i class="ti ti-check"></i> Update Buku
                </button>
                <a href="{{ route('admin.books.index') }}"
                    class="px-8 py-3 border border-gray-300 text-gray-600 rounded-xl hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
