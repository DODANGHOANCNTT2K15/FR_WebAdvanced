<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackGenre extends Model
{
    use HasFactory;

    protected $fillable = [
        'track_id', 'genre_id'
    ];
}

