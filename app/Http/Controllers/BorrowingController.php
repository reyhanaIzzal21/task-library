<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    /**
     * Show the borrowing form.
     */
    public function create(string $bookId)
    {
        $book = Book::findOrFail($bookId);

        if (!$book->isAvailable()) {
            return back()->with('error', 'Buku tidak tersedia untuk dipinjam.');
        }

        $user = Auth::user();

        return view('borrowing.create', compact('book', 'user'));
    }

    /**
     * Store a new borrowing request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'borrow_date' => 'required|date|after_or_equal:today',
            'due_date' => 'required|date|after:borrow_date',
        ]);

        $book = Book::findOrFail($validated['book_id']);

        if (!$book->isAvailable()) {
            return back()->with('error', 'Buku tidak tersedia untuk dipinjam.');
        }

        // Create borrowing request
        Borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $validated['book_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'borrow_date' => $validated['borrow_date'],
            'due_date' => $validated['due_date'],
            'status' => 'pending',
        ]);

        return redirect()->route('user.borrowings')
            ->with('success', 'Permintaan peminjaman berhasil dikirim. Silakan tunggu persetujuan admin.');
    }
}
