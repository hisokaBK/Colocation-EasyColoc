<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Balance;


class BalanceController extends Controller
{
    public function settle ($colocationId, $debtorId){
        $userId = Auth::id();

        $balance = Balance::where('colocation_id', $colocationId)
            ->where('creditor_id', $userId)
            ->where('debtor_id', $debtorId)
            ->firstOrFail();

        $balance->delete();

        return back()->with('success', 'Balance settled successfully');
    }
}

