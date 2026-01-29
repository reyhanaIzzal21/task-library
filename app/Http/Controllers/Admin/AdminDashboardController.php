<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'total_books' => Book::count(),
            'total_members' => User::role('user')->count(),
            'active_borrowings' => Borrowing::whereIn('status', ['approved', 'borrowed'])->count(),
            'pending_approvals' => Borrowing::where('status', 'pending')->count(),
        ];

        // Top borrowed books
        $topBooks = Book::withCount('borrowings')
            ->orderByDesc('borrowings_count')
            ->limit(5)
            ->get();

        // Recent borrowings
        $recentBorrowings = Borrowing::with(['user', 'book'])
            ->latest()
            ->limit(10)
            ->get();

        // Monthly borrowing chart data
        $monthlyBorrowings = Borrowing::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $monthlyBorrowings[$i] ?? 0;
        }

        return view('admin.pages.dashboard', compact('stats', 'topBooks', 'recentBorrowings', 'chartData'));
    }
}
