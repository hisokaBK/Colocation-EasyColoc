<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function ownerMembership()
    {
        return $this->hasOne(Membership::class)
            ->where('role', 'owner');
    }

    public function owner()
    {
        return $this->belongsToMany(User::class, 'memberships')
            ->wherePivot('role', 'owner');
    }

    public function members()
    {
        return $this->belongsToMany(
            User::class,
            'memberships'
        )->withPivot('role')->withTimestamps();
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function getOwnerUserAttribute()
     {
         return $this->owner()->first();
     }
}
