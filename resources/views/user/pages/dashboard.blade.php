@extends('user.layouts.app')

@section('title', 'Dashboard - Perpustakaan Digital')
@section('page-title', 'Dashboard')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="ti ti-book-upload text-2xl text-blue-600"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['borrowed'] }}</p>
                    <p class="text-sm text-gray-500">Sedang Dipinjam</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <i class="ti ti-clock text-2xl text-yellow-600"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['pending'] }}</p>
                    <p class="text-sm text-gray-500">Menunggu Approval</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="ti ti-check text-2xl text-green-600"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['returned'] }}</p>
                    <p class="text-sm text-gray-500">Sudah Dikembalikan</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <i class="ti ti-heart text-2xl text-red-600"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['favorites'] }}</p>
                    <p class="text-sm text-gray-500">Buku Favorit</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Chart -->
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Aktivitas Peminjaman {{ date('Y') }}</h3>
            <canvas id="borrowingChart" height="120"></canvas>
        </div>

        <!-- Recent Borrowings -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Peminjaman Terakhir</h3>
                <a href="{{ route('user.borrowings') }}" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
            </div>

            @forelse($recentBorrowings as $borrowing)
                <div class="flex items-center gap-3 py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="ti ti-book text-blue-500"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-gray-800 truncate">{{ $borrowing->book->title ?? 'Buku Dihapus' }}</p>
                        <p class="text-xs text-gray-500">{{ $borrowing->created_at->diffForHumans() }}</p>
                    </div>
                    <span
                        class="text-xs px-2 py-1 rounded-full
                        @if ($borrowing->status === 'pending') bg-yellow-100 text-yellow-700
                        @elseif($borrowing->status === 'approved') bg-blue-100 text-blue-700
                        @elseif($borrowing->status === 'borrowed') bg-purple-100 text-purple-700
                        @elseif($borrowing->status === 'returned') bg-green-100 text-green-700
                        @else bg-red-100 text-red-700 @endif">
                        {{ ucfirst($borrowing->status) }}
                    </span>
                </div>
            @empty
                <div class="text-center py-8 text-gray-500">
                    <i class="ti ti-book-off text-4xl mb-2"></i>
                    <p>Belum ada peminjaman</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const ctx = document.getElementById('borrowingChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Peminjaman',
                    data: @json($chartData),
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
