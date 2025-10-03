<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{

    protected $table = 'data_klinik';

    protected $fillable = ['title', 'description', 'image'];
}
