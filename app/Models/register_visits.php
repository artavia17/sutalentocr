<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register_visits extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'visit',
        'month',
        'year',
    ];
}
