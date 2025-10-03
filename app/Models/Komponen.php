<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komponen extends Model
{
    use HasFactory;

    protected $table = 'komponens_paket'; // tabel master komponen

    protected $fillable = ['nama'];

    public function pakets()
    {
        return $this->belongsToMany(Paket::class, 'paket_komponen', 'komponen_id', 'paket_id')
                    ->withTimestamps();
    }
}


