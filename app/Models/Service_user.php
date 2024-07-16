<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Service_user extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'pay_point',
    ];
}
