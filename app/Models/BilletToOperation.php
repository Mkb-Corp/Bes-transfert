<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilletToOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'operation_id',
        'billet_id',
        'qty'
    ];
}
