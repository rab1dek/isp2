<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotifyCSV extends Model
{
    use HasFactory;
    protected $casts = [
        'Date' => 'datetime',
    ];
    protected $guarded = [];
}
