<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Colocation;
use App\Models\ExpenseSplit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Balance;

class ExpenseController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
        ]);

        DB::transaction(function () use ($request, $id) {

            $colocation = Colocation::with('members')->findOrFail($id);

            abort_if(
                !$colocation->members->contains(Auth::id()),
                403
            );


            $expense = Expense::create([
                'title' => $request->title,
                'amount' => $request->amount,
                'category_id' => $request->category_id,
                'date' => $request->date,
                'user_id' => Auth::id(),
                'colocation_id' => $colocation->id,
            ]);

            $members = $colocation->members;
            $share = $expense->amount / $members->count();

            foreach ($members as $member) {

                if ($member->id == Auth::id()) {
                    continue;
                }

                ExpenseSplit::create([
                    'expense_id' => $expense->id,
                    'user_id' => $member->id,
                    'share_amount' => $share
                ]);

                $this->updateBalance(
                    $colocation->id,
                    Auth::id(),
                    $member->id,
                    $share
                );
            }
        });

        return back()->with('success', 'Expense added successfully');
    }

   public function updateBalance($colocationId, $creditorId, $debtorId, $amount)
    {
        // check reverse balance
        $reverse = Balance::where([
            'colocation_id' => $colocationId,
            'creditor_id' => $debtorId,
            'debtor_id' => $creditorId,
        ])->first();

        if ($reverse) {

            if ($reverse->amount > $amount) {

                $reverse->amount -= $amount;
                $reverse->save();
                return;
            }

            if ($reverse->amount == $amount) {
                $reverse->delete();
                return;
            }

            $amount -= $reverse->amount;
            $reverse->delete();
        }

        $balance = Balance::firstOrNew([
            'colocation_id' => $colocationId,
            'creditor_id' => $creditorId,
            'debtor_id' => $debtorId,
        ]);

        $balance->amount += $amount;
        $balance->save();
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
        ]);

        $expense->update([
            'title' => $request->title,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'date' => $request->date,
        ]);

        return back()->with('success','Expense updated');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return back()->with('success','Expense deleted');
    }

}
