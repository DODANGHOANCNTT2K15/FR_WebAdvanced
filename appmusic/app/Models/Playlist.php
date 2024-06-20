<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function playlists(){
        return $this->hasMany(PlaylistTrack::class);
    }
}

