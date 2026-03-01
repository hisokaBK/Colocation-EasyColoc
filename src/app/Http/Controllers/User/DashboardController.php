<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    $colocation = $user->colocations()->first();

    $owner = $colocation?->owner_user;

    $totalExpenses = $user->expenses()->sum('amount');

    $score = $user->reputation_score;

    $expenses = $user->expenses()->latest()->get();

    return view('user.dashboard', compact(
        'colocation',
        'owner',
        'totalExpenses',
        'score',
        'expenses'
    ));
}
}
