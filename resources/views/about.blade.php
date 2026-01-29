@extends('layouts.public')

@section('title', 'Tentang - Perpustakaan Digital')

@section('content')
    <!-- Hero -->
    <section class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold mb-6">Tentang Kami</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Perpustakaan Digital adalah platform modern untuk memudahkan akses buku dan peminjaman bagi semua kalangan.
            </p>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Visi Kami</h2>
                    <p class="text-gray-600 mb-4">
                        Menjadi perpustakaan digital terdepan yang dapat diakses oleh semua orang, kapan saja dan di mana
                        saja.
                        Kami percaya bahwa akses terhadap pengetahuan adalah hak semua orang.
                    </p>
                    <p class="text-gray-600">
                        Dengan teknologi modern, kami menyediakan pengalaman peminjaman buku yang mudah, cepat, dan efisien.
                        Koleksi kami terus berkembang untuk memenuhi kebutuhan pembaca dari berbagai latar belakang.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-blue-100 to-indigo-100 rounded-3xl p-8 lg:p-12">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white rounded-2xl p-6 text-center shadow-sm">
                            <i class="ti ti-books text-4xl text-blue-600 mb-3"></i>
                            <p class="text-2xl font-bold text-gray-800">1000+</p>
                            <p class="text-gray-500">Koleksi Buku</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 text-center shadow-sm">
                            <i class="ti ti-users text-4xl text-green-600 mb-3"></i>
                            <p class="text-2xl font-bold text-gray-800">500+</p>
                            <p class="text-gray-500">Anggota Aktif</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 text-center shadow-sm">
                            <i class="ti ti-category text-4xl text-purple-600 mb-3"></i>
                            <p class="text-2xl font-bold text-gray-800">8+</p>
                            <p class="text-gray-500">Kategori</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 text-center shadow-sm">
                            <i class="ti ti-clock text-4xl text-orange-600 mb-3"></i>
                            <p class="text-2xl font-bold text-gray-800">24/7</p>
                            <p class="text-gray-500">Akses Online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission -->
    <section class="bg-gray-100 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">Misi Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="ti ti-book-2 text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Akses Mudah</h3>
                    <p class="text-gray-600">
                        Menyediakan akses yang mudah dan cepat ke ribuan koleksi buku untuk semua kalangan.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="ti ti-heart text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Layanan Prima</h3>
                    <p class="text-gray-600">
                        Memberikan pelayanan terbaik dengan proses peminjaman yang cepat dan efisien.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="ti ti-growth text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Terus Berkembang</h3>
                    <p class="text-gray-600">
                        Terus menambah dan memperbarui koleksi untuk memenuhi kebutuhan pembaca.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-lg p-8 lg:p-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Hubungi Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ti ti-map-pin text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Alamat</h3>
                        <p class="text-gray-600">Jl. Pendidikan No. 123<br>Jakarta, Indonesia</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ti ti-phone text-2xl text-green-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Telepon</h3>
                        <p class="text-gray-600">(021) 123-4567<br>0812-3456-7890</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ti ti-mail text-2xl text-purple-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Email</h3>
                        <p class="text-gray-600">info@perpustakaan.com<br>support@perpustakaan.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
