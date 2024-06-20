<?php

// app/Http/Controllers/PlaylistController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Playlist::create([
            'user_id' => Auth::id(),
            'name' => $request->input('title'),
        ]);

        return redirect()->back()->with("sucess","Thanh cong");
    }

    public function getTracks($id)
    {
        $playlistTracks = PlaylistTrack::where('playlist_id', $id)->with('track')->get();

        return response()->json($playlistTracks);
    }
}

