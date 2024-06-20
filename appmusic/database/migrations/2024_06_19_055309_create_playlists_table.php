<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration
{
    public function up(): void
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng và là khóa chính
            $table->unsignedBigInteger('user_id'); // Tạo cột user_id
            $table->string('name'); // Tạo cột name
            $table->timestamps(); // Tạo cột created_at và updated_at

            // Thiết lập khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('playlists');
    }
};
