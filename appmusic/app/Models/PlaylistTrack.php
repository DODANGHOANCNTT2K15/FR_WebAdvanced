<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistTrack extends Model
{
    use HasFactory;

    protected $fillable = [
        'playlist_id', 'track_id'
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id');
    }

    public function tracks()
    {
        return $this->hasMany(Track::class, 'track_id');
    }

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}

