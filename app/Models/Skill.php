<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    // Jika nama tabel berbeda dari konvensi Laravel, deklarasikan di sini
    // protected $table = 'nama_tabel';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
}
