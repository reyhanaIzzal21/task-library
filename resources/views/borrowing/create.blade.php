@extends('layouts.public')

@section('title', 'Form Peminjaman - Perpustakaan Digital')

@section('content')
    <section class="py-8 lg:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center gap-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-500 hover:text-blue-600">Beranda</a></li>
                    <li class="text-gray-400">/</li>
                    <li><a href="{{ route('books.show', $book->slug) }}"
                            class="text-gray-500 hover:text-blue-600">{{ Str::limit($book->title, 20) }}</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-800 font-medium">Peminjaman</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm p-6 lg:p-8 border border-gray-100">
                        <h1 class="text-2xl font-bold text-gray-800 mb-6">Form Peminjaman Buku</h1>

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('borrow.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">

                            <!-- Personal Info -->
                            <div class="border-b border-gray-200 pb-6">
                                <h2 class="text-lg font-semibold text-gray-800 mb-4">Data Peminjam</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                            Lengkap *</label>
                                        <input type="text" name="name" id="name"
                                            value="{{ old('name', $user->name) }}"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                            required>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email
                                            *</label>
                                        <input type="email" name="email" id="email"
                                            value="{{ old('email', $user->email) }}"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                            required>
                                    </div>
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">No. HP
                                            *</label>
                                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                            placeholder="08xxxxxxxxxx"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                            required>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat
                                            Lengkap *</label>
                                        <textarea name="address" id="address" rows="3" placeholder="Masukkan alamat lengkap Anda..."
                                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                                            required>{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Borrowing Details -->
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800 mb-4">Detail Peminjaman</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="borrow_date"
                                            class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pinjam *</label>
                                        <input type="date" name="borrow_date" id="borrow_date"
                                            value="{{ old('borrow_date', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                            required>
                                    </div>
                                    <div>
                                        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                                            Kembali *</label>
                                        <input type="date" name="due_date" id="due_date"
                                            value="{{ old('due_date', date('Y-m-d', strtotime('+7 days'))) }}"
                                            min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                            required>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500 mt-2">
                                    <i class="ti ti-info-circle"></i>
                                    Maksimal durasi peminjaman adalah 14 hari.
                                </p>
                            </div>

                            <!-- Submit -->
                            <div class="flex gap-4 pt-4">
                                <button type="submit"
                                    class="flex-1 bg-blue-600 text-white px-6 py-4 rounded-xl font-semibold hover:bg-blue-700 transition flex items-center justify-center gap-2 shadow-lg shadow-blue-500/30">
                                    <i class="ti ti-send"></i>
                                    Kirim Permintaan Peminjaman
                                </button>
                                <a href="{{ route('books.show', $book->slug) }}"
                                    class="px-6 py-4 border border-gray-300 text-gray-600 rounded-xl font-semibold hover:bg-gray-50 transition">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Book Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100 sticky top-24">
                        <h3 class="font-semibold text-gray-800 mb-4">Buku yang Dipinjam</h3>

                        <div
                            class="aspect-[3/4] bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl overflow-hidden mb-4">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="ti ti-book text-6xl text-blue-300"></i>
                                </div>
                            @endif
                        </div>

                        <h4 class="font-semibold text-gray-800 mb-1">{{ $book->title }}</h4>
                        <p class="text-sm text-gray-500 mb-4">{{ $book->author }}</p>

                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Kategori</span>
                                <span class="text-gray-800">{{ $book->category->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Stok Tersedia</span>
                                <span class="text-green-600 font-medium">{{ $book->available_stock }} buku</span>
                            </div>
                        </div>

                        <div class="mt-6 p-4 bg-yellow-50 rounded-xl">
                            <p class="text-sm text-yellow-800">
                                <i class="ti ti-alert-circle"></i>
                                Setelah mengirim permintaan, tunggu persetujuan dari admin sebelum mengambil buku.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
