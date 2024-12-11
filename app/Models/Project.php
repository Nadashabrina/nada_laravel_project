<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan (opsional jika mengikuti konvensi)
    protected $table = 'projects';

    // Tentukan field yang dapat diisi
    protected $fillable = [
        'title',
        'description',
        'tools',
        'image_path',
    ];
}
