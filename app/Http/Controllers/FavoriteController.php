<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Toggle book favorite status.
     */
    public function toggle(string $bookId)
    {
        $user = Auth::user();

        $favorite = Favorite::where('user_id', $user->id)
            ->where('book_id', $bookId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'Buku dihapus dari favorit.';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'book_id' => $bookId,
            ]);
            $message = 'Buku ditambahkan ke favorit.';
        }

        return back()->with('success', $message);
    }
}
