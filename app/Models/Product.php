<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo };

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'isActive' => 'boolean',
    ];

    public function unit(): BelongsTo
    {
      return $this->belongsTo(Unit::class, 'uom_id');
    }
}
