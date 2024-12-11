<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'abouts';

    // Kolom yang dapat diisi (mass-assignment)
    protected $fillable = ['title', 'content'];
}
