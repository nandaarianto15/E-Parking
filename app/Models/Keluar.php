<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    // use HasFactory;
    protected $fillable = [
        'tipe_kendaraan',
    ];

    public function Price()
    {

        return $this->hasMany(Price::class);
    }

    public function Masuk() 
    {
        return $this->belongsTo('App\Models\Masuk', 'id', 'kode');
    }


}
