<?php

namespace App\Providers;

use App\Models\PlaylistTrack;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $playlists = Playlist::where('user_id', Auth::id())->get();
                $playlistsTrack = PlaylistTrack::where('playlist_id', $playlists->first()->id)->get();

                $view->with([
                    'playlists' => $playlists,
                    'playlistsTrack' => $playlistsTrack,
                ]);
            }
        });
    }
}
