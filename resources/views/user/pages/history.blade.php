@extends('user.layouts.app')

@section('title', 'Riwayat Pengembalian - Perpustakaan Digital')
@section('page-title', 'Riwayat Pengembalian')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-800">Riwayat Buku yang Sudah Dikembalikan</h2>
            <p class="text-sm text-gray-500">Daftar buku yang pernah Anda pinjam dan sudah dikembalikan</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Buku</th>
                        <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Tanggal Pinjam</th>
                        <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Tanggal Kembali</th>
                        <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($borrowings as $borrowing)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-12 h-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        @if ($borrowing->book && $borrowing->book->cover_image)
                                            <img src="{{ asset('storage/' . $borrowing->book->cover_image) }}"
                                                alt="" class="w-full h-full object-cover rounded-lg">
                                        @else
                                            <i class="ti ti-book text-blue-500"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $borrowing->book->title ?? 'Buku Dihapus' }}
                                        </p>
                                        <p class="text-sm text-gray-500">{{ $borrowing->book->author ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $borrowing->borrow_date->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $borrowing->return_date ? $borrowing->return_date->format('d M Y') : '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    Dikembalikan
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                <i class="ti ti-history text-4xl mb-2"></i>
                                <p>Belum ada riwayat pengembalian</p>
                            </td>
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
@endsection
