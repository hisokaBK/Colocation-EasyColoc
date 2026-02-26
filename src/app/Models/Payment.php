<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'colocation_id',
        'amount',
        'status', // pending, paid
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

}
