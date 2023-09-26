<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Billet;

class BilletToTicketing extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticketing_id',
        'billet_id',
        'qty'
    ];

    public function billet(): BelongsTo
    {
        return $this->belongsTo(Billet::class, 'billet_id');
    }
}
