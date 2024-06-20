<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistTracksTable extends Migration
{
    public function up(): void
    {
        Schema::create('playlist_tracks', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng và là khóa chính
            $table->unsignedBigInteger('playlist_id'); // Tạo cột playlist_id
            $table->unsignedBigInteger('track_id'); // Tạo cột track_id
            $table->timestamps(); // Tạo cột created_at và updated_at

            // Thiết lập khóa ngoại
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('playlist_tracks');
    }
};
