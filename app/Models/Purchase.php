<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Purchase extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'by_cash',
        'bonus_point',
        'user_balance',
        'admin_id'
    ];
}