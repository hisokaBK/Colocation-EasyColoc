<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Expense;
use App\Models\Colocation;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $activeUsers = User::where('is_banned', false)->count();

        $bannedUsers = User::where('is_banned', true)->count();

        $totalColocations = Colocation::count();

        $totalExpenses = Expense::sum('amount');

        $users = User::latest()->paginate(5);

        return view('admin.dashboard', compact(
            'totalUsers',
            'activeUsers',
            'bannedUsers',
            'totalColocations',
            'totalExpenses',
            'users'
        ));
    }


    public function toggleBan(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot ban yourself.');
        }

        $user->is_banned = !$user->is_banned;
        $user->save();

        return back()->with(
            'success',
            $user->is_banned
                ? 'User banned successfully.'
                : 'User unbanned successfully.'
        );
    }
}
