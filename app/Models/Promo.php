<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'promos';

    // Field yang bisa diisi secara mass-assignment
    protected $fillable = [
        'name',
        'image',
    ];
}
