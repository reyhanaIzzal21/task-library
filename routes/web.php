<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\BorrowingController as AdminBorrowingController;

// Public Routes
Route::get('/', function () {
    $books = \App\Models\Book::with('category')->latest()->limit(8)->get();
    $stats = [
        'total_books' => \App\Models\Book::count(),
        'total_members' => \App\Models\User::role('user')->count(),
        'total_borrowings' => \App\Models\Borrowing::count(), 
    ];
    return view('welcome', compact('books', 'stats'));
})->name('home');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{slug}', [BookController::class, 'show'])->name('books.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Auth Required Routes
Route::middleware(['auth'])->group(function () {
    // Borrowing
    Route::get('/borrow/{book}', [BorrowingController::class, 'create'])->name('borrow.create');
    Route::post('/borrow', [BorrowingController::class, 'store'])->name('borrow.store');

    // Favorites
    Route::post('/favorites/{book}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

    // User Dashboard
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::get('/borrowings', [UserDashboardController::class, 'borrowings'])->name('borrowings');
        Route::get('/history', [UserDashboardController::class, 'history'])->name('history');
        Route::get('/favorites', [UserDashboardController::class, 'favorites'])->name('favorites');
    });
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Books CRUD
    Route::resource('books', AdminBookController::class);

    // Members
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::get('/members/{id}', [MemberController::class, 'show'])->name('members.show');

    // Borrowings Management
    Route::get('/borrowings', [AdminBorrowingController::class, 'index'])->name('borrowings.index');
    Route::post('/borrowings/{id}/approve', [AdminBorrowingController::class, 'approve'])->name('borrowings.approve');
    Route::post('/borrowings/{id}/reject', [AdminBorrowingController::class, 'reject'])->name('borrowings.reject');
    Route::post('/borrowings/{id}/return', [AdminBorrowingController::class, 'markReturned'])->name('borrowings.return');
});

require __DIR__ . '/settings.php';
