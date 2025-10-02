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
        "address_id",
        "mobile_number",
        "occupation",
        "experience_after",
        "memories",
        "status",
        "paid_amount",
        "sponsored_amount",
        "update_logs",
        "captured_at"
    ];

    protected $casts = [
        'update_logs' => 'object',
    ];

    public function scopeCheckEmail($q, Builder $email): Builder
    {
        return $q->where('email', $email)->exists();
    }

    public function scopeActive($q): Builder
    {
        return $q->where('status', 'active');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
