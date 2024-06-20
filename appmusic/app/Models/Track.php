<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id', 'title', 'duration', 'file_path'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'track_genres');
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_tracks');
    }
}
