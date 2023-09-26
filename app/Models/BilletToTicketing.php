<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilletToTicketing extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticketing_id',
        'billet_id'
    ];
}
