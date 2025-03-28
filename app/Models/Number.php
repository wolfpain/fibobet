<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    /** @use HasFactory<\Database\Factories\NumberFactory> */
    use HasFactory;

    protected $fillable = [
        'number',
        'column',
        'row',
    ];
}
