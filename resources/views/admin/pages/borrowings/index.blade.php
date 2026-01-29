@extends('admin.layouts.app')

@section('content')
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Kelola Peminjaman</h1>
            <p class="text-gray-500">Persetujuan dan pengelolaan peminjaman buku</p>
        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-2xl shadow-sm p-2 border border-gray-100 flex flex-wrap gap-2">
            <a href="{{ route('admin.borrowings.index') }}"
                class="px-4 py-2 rounded-xl text-sm font-medium transition {{ !request('status') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                Semua ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.borrowings.index', ['status' => 'pending']) }}"
                class="px-4 py-2 rounded-xl text-sm font-medium transition {{ request('status') === 'pending' ? 'bg-yellow-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                Pending ({{ $counts['pending'] }})
            </a>
            <a href="{{ route('admin.borrowings.index', ['status' => 'borrowed']) }}"
                class="px-4 py-2 rounded-xl text-sm font-medium transition {{ request('status') === 'borrowed' ? 'bg-purple-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                Dipinjam ({{ $counts['borrowed'] }})
            </a>
            <a href="{{ route('admin.borrowings.index', ['status' => 'returned']) }}"
                class="px-4 py-2 rounded-xl text-sm font-medium transition {{ request('status') === 'returned' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                Dikembalikan ({{ $counts['returned'] }})
            </a>
            <a href="{{ route('admin.borrowings.index', ['status' => 'rejected']) }}"
                class="px-4 py-2 rounded-xl text-sm font-medium transition {{ request('status') === 'rejected' ? 'bg-red-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                Ditolak ({{ $counts['rejected'] }})
            </a>
        </div>

        <!-- Search -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
            <form action="{{ route('admin.borrowings.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4">
                <input type="hidden" name="status" value="{{ request('status') }}">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama, email, atau judul buku..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                </div>
                <input type="date" name="from_date" value="{{ request('from_date') }}"
                    class="px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                <input type="date" name="to_date" value="{{ request('to_date') }}"
                    class="px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">
                    <i class="ti ti-search"></i> Filter
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Peminjam</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Buku</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Tanggal</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Status</th>
                            <th class="text-center px-6 py-4 text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($borrowings as $borrowing)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-gray-800">{{ $borrowing->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $borrowing->email }}</p>
                                    <p class="text-xs text-gray-400">{{ $borrowing->phone }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-medium text-gray-800">{{ $borrowing->book->title ?? '-' }}</p>
                                    <p class="text-sm text-gray-500">{{ $borrowing->book->author ?? '' }}</p>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <p>Pinjam: {{ $borrowing->borrow_date->format('d M Y') }}</p>
                                    <p class="text-sm text-gray-500">Kembali: {{ $borrowing->due_date->format('d M Y') }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium
                                        @if ($borrowing->status === 'pending') bg-yellow-100 text-yellow-700
                                        @elseif($borrowing->status === 'borrowed') bg-purple-100 text-purple-700
                                        @elseif($borrowing->status === 'returned') bg-green-100 text-green-700
                                        @elseif($borrowing->status === 'rejected') bg-red-100 text-red-700
                                        @else bg-gray-100 text-gray-700 @endif">
                                        {{ ucfirst($borrowing->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        @if ($borrowing->status === 'pending')
                                            <form action="{{ route('admin.borrowings.approve', $borrowing->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="w-9 h-9 flex items-center justify-center bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition"
                                                    title="Setujui">
                                                    <i class="ti ti-check"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.borrowings.reject', $borrowing->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="w-9 h-9 flex items-center justify-center bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition"
                                                    title="Tolak">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </form>
                                        @elseif($borrowing->status === 'borrowed')
                                            <form action="{{ route('admin.borrowings.return', $borrowing->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="inline-flex items-center gap-1 bg-blue-100 text-blue-600 px-3 py-2 rounded-lg hover:bg-blue-200 transition text-sm">
                                                    <i class="ti ti-arrow-back"></i> Dikembalikan
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    <i class="ti ti-arrows-exchange text-4xl mb-2"></i>
                                    <p>Tidak ada peminjaman</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($borrowings->hasPages())
                <div class="p-6 border-t border-gray-100">
                    {{ $borrowings->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
