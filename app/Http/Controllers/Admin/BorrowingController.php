<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of borrowings.
     */
    public function index(Request $request)
    {
        $query = Borrowing::with(['user', 'book']);

        // Filter by status (tab)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhereHas('book', function ($bookQuery) use ($request) {
                        $bookQuery->where('title', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // Date filter
        if ($request->filled('from_date')) {
            $query->whereDate('borrow_date', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->whereDate('borrow_date', '<=', $request->to_date);
        }

        $borrowings = $query->latest()->paginate(15);

        // Count for tabs
        $counts = [
            'all' => Borrowing::count(),
            'pending' => Borrowing::where('status', 'pending')->count(),
            'approved' => Borrowing::where('status', 'approved')->count(),
            'borrowed' => Borrowing::where('status', 'borrowed')->count(),
            'returned' => Borrowing::where('status', 'returned')->count(),
            'rejected' => Borrowing::where('status', 'rejected')->count(),
        ];

        return view('admin.pages.borrowings.index', compact('borrowings', 'counts'));
    }

    /**
     * Approve a borrowing request.
     */
    public function approve(Request $request, string $id)
    {
        $borrowing = Borrowing::findOrFail($id);

        if ($borrowing->status !== 'pending') {
            return back()->with('error', 'Permintaan ini sudah diproses.');
        }

        $book = $borrowing->book;

        if ($book->available_stock < 1) {
            return back()->with('error', 'Stok buku tidak tersedia.');
        }

        // Update borrowing status
        $borrowing->update([
            'status' => 'borrowed',
            'admin_notes' => $request->admin_notes,
        ]);

        // Decrease available stock
        $book->decrement('available_stock');

        return back()->with('success', 'Peminjaman berhasil disetujui.');
    }

    /**
     * Reject a borrowing request.
     */
    public function reject(Request $request, string $id)
    {
        $borrowing = Borrowing::findOrFail($id);

        if ($borrowing->status !== 'pending') {
            return back()->with('error', 'Permintaan ini sudah diproses.');
        }

        $borrowing->update([
            'status' => 'rejected',
            'admin_notes' => $request->admin_notes ?? 'Permintaan ditolak oleh admin.',
        ]);

        return back()->with('success', 'Peminjaman berhasil ditolak.');
    }

    /**
     * Mark a borrowing as returned.
     */
    public function markReturned(string $id)
    {
        $borrowing = Borrowing::findOrFail($id);

        if ($borrowing->status !== 'borrowed') {
            return back()->with('error', 'Buku ini belum dalam status dipinjam.');
        }

        // Update borrowing status
        $borrowing->update([
            'status' => 'returned',
            'return_date' => now(),
        ]);

        // Increase available stock
        $borrowing->book->increment('available_stock');

        return back()->with('success', 'Buku berhasil ditandai sebagai dikembalikan.');
    }
}
