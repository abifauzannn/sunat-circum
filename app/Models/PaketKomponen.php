<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketKomponen extends Model
{
    use HasFactory;

    protected $table = 'paket_komponen';

    protected $fillable = ['paket_id', 'komponen_id']; // detail boleh kosong

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function komponen()
    {
        return $this->belongsTo(Komponen::class, 'komponen_id');
    }
}


