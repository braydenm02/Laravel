<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Printer extends Model
{
    protected $table = 'inventory';

    protected $fillable = [
        'entrydate',
        'BOL',
        'serial',
        'slp',
        'sku',
        'condition',
        'location',
        'verified_at',
        'reserved_at',
        'sold_at',
    ];

    protected $casts = [
        'entrydate' => 'datetime',
        'verified_at' => 'datetime',
        'reserved_at' => 'datetime',
        'sold_at' => 'datetime',
    ];

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    
}
