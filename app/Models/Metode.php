<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Metode extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function pakets()
    {
        return $this->hasMany(Paket::class);
    }
}

