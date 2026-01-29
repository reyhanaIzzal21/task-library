@extends('admin.layouts.app')

@section('content')
    <div class="space-y-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="ti ti-books text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_books'] }}</p>
                        <p class="text-sm text-gray-500">Total Buku</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="ti ti-users text-2xl text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_members'] }}</p>
                        <p class="text-sm text-gray-500">Total Anggota</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <i class="ti ti-book-upload text-2xl text-purple-600"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['active_borrowings'] }}</p>
                        <p class="text-sm text-gray-500">Peminjaman Aktif</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                        <i class="ti ti-clock text-2xl text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['pending_approvals'] }}</p>
                        <p class="text-sm text-gray-500">Perlu Persetujuan</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Chart -->
            <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Trend Peminjaman {{ date('Y') }}</h3>
                <canvas id="borrowingChart" height="120"></canvas>
            </div>

            <!-- Top Books -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Buku Terpopuler</h3>
                @forelse($topBooks as $book)
                    <div class="flex items-center gap-3 py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="ti ti-book text-blue-500"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-800 truncate">{{ $book->title }}</p>
                            <p class="text-xs text-gray-500">{{ $book->author }}</p>
                        </div>
                        <span class="text-sm font-semibold text-blue-600">{{ $book->borrowings_count }}x</span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Belum ada data</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Borrowings -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Peminjaman Terbaru</h3>
                <a href="{{ route('admin.borrowings.index') }}" class="text-blue-600 text-sm hover:underline">Lihat
                    Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Peminjam</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Buku</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Tanggal</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentBorrowings as $borrowing)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-gray-800">{{ $borrowing->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $borrowing->email }}</p>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $borrowing->book->title ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $borrowing->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium
                                        @if ($borrowing->status === 'pending') bg-yellow-100 text-yellow-700
                                        @elseif($borrowing->status === 'borrowed') bg-purple-100 text-purple-700
                                        @elseif($borrowing->status === 'returned') bg-green-100 text-green-700
                                        @else bg-gray-100 text-gray-700 @endif">
                                        {{ ucfirst($borrowing->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada peminjaman</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('borrowingChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Peminjaman',
                    data: @json($chartData),
                    backgroundColor: 'rgba(59, 130, 246, 0.8)',
                    borderRadius: 8
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
@endsection
