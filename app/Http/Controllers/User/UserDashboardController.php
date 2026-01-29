<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'borrowed' => Borrowing::where('user_id', $user->id)->whereIn('status', ['approved', 'borrowed'])->count(),
            'pending' => Borrowing::where('user_id', $user->id)->where('status', 'pending')->count(),
            'returned' => Borrowing::where('user_id', $user->id)->where('status', 'returned')->count(),
            'favorites' => $user->favorites()->count(),
        ];

        $recentBorrowings = Borrowing::with('book')
            ->where('user_id', $user->id)
            ->latest()
            ->limit(5)
            ->get();

        // Chart data - borrowings per month
        $monthlyBorrowings = Borrowing::where('user_id', $user->id)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $monthlyBorrowings[$i] ?? 0;
        }

        return view('user.pages.dashboard', compact('stats', 'recentBorrowings', 'chartData'));
    }

    /**
     * Display user's active borrowings.
     */
    public function borrowings()
    {
        $borrowings = Borrowing::with('book')
            ->where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'approved', 'borrowed'])
            ->latest()
            ->paginate(10);

        return view('user.pages.borrowings', compact('borrowings'));
    }

    /**
     * Display user's borrowing history.
     */
    public function history()
    {
        $borrowings = Borrowing::with('book')
            ->where('user_id', Auth::id())
            ->where('status', 'returned')
            ->latest()
            ->paginate(10);

        return view('user.pages.history', compact('borrowings'));
    }

    /**
     * Display user's favorite books.
     */
    public function favorites()
    {
        $favorites = Auth::user()->favorites()
            ->with('book.category')
            ->latest()
            ->paginate(12);

        return view('user.pages.favorites', compact('favorites'));
    }
}
