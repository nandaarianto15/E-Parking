<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    // use HasFactory;
    public function Keluar()
    {
        return $this->hasMany('App\Models\Price', 'id', 'type_kendaraan');
    }
}
