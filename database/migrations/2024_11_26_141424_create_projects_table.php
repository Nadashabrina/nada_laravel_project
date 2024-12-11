<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel projects.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('title'); // Kolom judul proyek
            $table->text('description'); // Kolom deskripsi proyek
            $table->string('tools')->nullable(); // Kolom alat/tools, opsional
            $table->string('image_path')->nullable(); // Kolom untuk menyimpan path gambar, opsional
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Membatalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
