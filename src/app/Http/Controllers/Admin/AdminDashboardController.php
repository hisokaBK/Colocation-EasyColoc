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

        $users = User::latest()->paginate(1);

        return view('admin.dashboard', compact(
            'totalUsers',
            'activeUsers',
            'bannedUsers',
            'totalColocations',
            'totalExpenses',
            'users'
        ));
    }
}
