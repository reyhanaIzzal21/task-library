@extends('admin.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.members.index') }}" class="text-gray-600 hover:text-blue-600">
                <i class="ti ti-arrow-left text-2xl"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Detail Anggota</h1>
                <p class="text-gray-500">{{ $member->name }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Member Info -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <div class="text-center mb-6">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                        {{ $member->initials() }}
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">{{ $member->name }}</h3>
                    <p class="text-gray-500">{{ $member->email }}</p>
                </div>

                <div class="space-y-4 border-t border-gray-100 pt-6">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Bergabung</span>
                        <span class="text-gray-800">{{ $member->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Total Peminjaman</span>
                        <span class="text-blue-600 font-medium">{{ $member->borrowings_count }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Total Favorit</span>
                        <span class="text-red-600 font-medium">{{ $member->favorites_count }}</span>
                    </div>
                </div>
            </div>

            <!-- Borrowing History -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">Riwayat Peminjaman</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Buku</th>
                                <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Tanggal</th>
                                <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($borrowings as $borrowing)
                                <tr>
                                    <td class="px-6 py-4">
                                        <p class="font-medium text-gray-800">{{ $borrowing->book->title ?? '-' }}</p>
                                        <p class="text-sm text-gray-500">{{ $borrowing->book->author ?? '' }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">{{ $borrowing->borrow_date->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-medium
                                            @if ($borrowing->status === 'returned') bg-green-100 text-green-700
                                            @elseif($borrowing->status === 'borrowed') bg-purple-100 text-purple-700
                                            @else bg-yellow-100 text-yellow-700 @endif">
                                            {{ ucfirst($borrowing->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">Belum ada riwayat</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($borrowings->hasPages())
                    <div class="p-6 border-t border-gray-100">
                        {{ $borrowings->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
