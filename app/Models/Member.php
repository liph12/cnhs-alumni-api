<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Member extends Model
{
    protected $fillable = [
        "batch_year",
        "first_name",
        "middle_name",
        "last_name",
        "birth_date",
        "gender",
        "email",
        "mobile_number"
    ];

    public function scopeCheckEmail($q, Builder $email): Builder
    {
        return $q->where('email', $email)->exists();
    }

    public function scopeActive($q): Builder
    {
        return $q->where('status', 'active');
    }
}
