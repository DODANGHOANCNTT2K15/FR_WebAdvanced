<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackGenresTable extends Migration
{
    public function up(): void
    {
        Schema::create('track_genres', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng và là khóa chính với kiểu unsignedBigInteger
            $table->unsignedBigInteger('track_id'); // Tạo cột track_id với kiểu unsignedBigInteger để tương thích với cột id trong bảng tracks
            $table->unsignedBigInteger('genre_id'); // Tạo cột genre_id với kiểu unsignedBigInteger để tương thích với cột id trong bảng genres
            $table->timestamps(); // Tạo cột created_at và updated_at
    
            // Thiết lập khóa ngoại
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('track_genres');
    }
};
