<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'colocation_id',
        'creditor_id',
        'debtor_id',
        'amount'
    ];

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

    public function creditor()
    {
        return $this->belongsTo(User::class, 'creditor_id');
    }

    public function debtor()
    {
        return $this->belongsTo(User::class, 'debtor_id');
    }

    public function settle(Balance $balance)
    {
        abort_if($balance->creditor_id !== auth()->id(), 403);

        $balance->delete();

        return back()->with('success', 'Balance settled successfully');
    }

}
