@extends('admin.layouts.app')

@section('content')
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Kelola Anggota</h1>
            <p class="text-gray-500">Daftar anggota perpustakaan</p>
        </div>

        <!-- Search -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
            <form action="{{ route('admin.members.index') }}" method="GET" class="flex gap-4">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500">
                </div>
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
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Anggota</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Terdaftar</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Peminjaman</th>
                            <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Favorit</th>
                            <th class="text-center px-6 py-4 text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($members as $member)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold">
                                            {{ $member->initials() }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $member->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $member->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $member->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                        {{ $member->borrowings_count }} buku
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                        {{ $member->favorites_count }} buku
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.members.show', $member->id) }}"
                                        class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-700">
                                        <i class="ti ti-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    <i class="ti ti-users text-4xl mb-2"></i>
                                    <p>Belum ada anggota</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($members->hasPages())
                <div class="p-6 border-t border-gray-100">
                    {{ $members->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
