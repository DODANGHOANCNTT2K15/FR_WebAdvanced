<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    public function up(): void
{
    Schema::create('albums', function (Blueprint $table) {
        $table->id(); // Tạo cột id tự động tăng và là khóa chính
        $table->unsignedBigInteger('artist_id'); // Tạo cột artist_id
        $table->string('title'); // Tạo cột title
        $table->date('release_date')->nullable(); // Tạo cột release_date
        $table->string('cover_image')->nullable(); // Tạo cột cover_image
        $table->timestamps(); // Tạo cột created_at và updated_at

        // Thiết lập khóa ngoại
        $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
