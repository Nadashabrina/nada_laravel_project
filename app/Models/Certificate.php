<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

protected $fillable = [
    'name',
    'issued_by',
    'issued_at',
    'file',
    'description',

];

}
