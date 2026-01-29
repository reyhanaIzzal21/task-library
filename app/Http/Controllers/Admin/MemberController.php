<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of members.
     */
    public function index(Request $request)
    {
        $query = User::withCount(['borrowings', 'favorites']);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $members = $query->latest()->paginate(15);

        return view('admin.pages.members.index', compact('members'));
    }

    /**
     * Display the specified member.
     */
    public function show(string $id)
    {
        $member = User::role('user')
            ->withCount(['borrowings', 'favorites'])
            ->findOrFail($id);

        $borrowings = $member->borrowings()
            ->with('book')
            ->latest()
            ->paginate(10);

        return view('admin.pages.members.show', compact('member', 'borrowings'));
    }
}
