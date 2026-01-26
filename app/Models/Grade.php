<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'visualCondition',
        'functionalCondition',
        'packagingCondition',
        'TonerK',
        'TonerC',
        'TonerM',
        'TonerY',
        'comments',
        'gradeID',
        'graded_by',
        'graded_at',
    ];

    protected $casts = [
        'graded_at' => 'datetime',
    ];

    public function printer()
    {
        return $this->belongsTo(Printer::class);
    }
}
