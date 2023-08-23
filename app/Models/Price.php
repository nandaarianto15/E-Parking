<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    // use HasFactory;
    public function Keluar()
    {
        return $this->hasMany('App\Models\Price', 'id', 'harga');
    }

    public function Masuk()
    {
        return $this->belongsTo('App\Models\Masuk', 'id', 'kode');
    }
}
