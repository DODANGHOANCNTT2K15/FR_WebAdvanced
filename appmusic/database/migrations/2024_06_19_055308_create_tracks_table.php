<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    public function up(): void
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng và là khóa chính
            $table->unsignedBigInteger('album_id'); // Tạo cột album_id
            $table->string('title'); // Tạo cột title
            $table->integer('duration'); // Tạo cột duration
            $table->string('file_path')->nullable(); // Tạo cột file_path, cho phép giá trị null
            $table->timestamps(); // Tạo cột created_at và updated_at

            // Thiết lập khóa ngoại
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
};
