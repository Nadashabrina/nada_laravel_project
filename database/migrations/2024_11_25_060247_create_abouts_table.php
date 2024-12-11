<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();  // ID sebagai primary key
            $table->string('title');  // Judul halaman (misalnya "Tentang Kami")
            $table->text('content');  // Isi konten halaman
            $table->timestamps();  // Menambahkan kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
