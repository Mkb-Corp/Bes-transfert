<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
            'reference',
            'label',
            'type',
            'provider',
            'customer',
            'phone',
            'email',
            'amount',
            'currency_id'
    ];
}
