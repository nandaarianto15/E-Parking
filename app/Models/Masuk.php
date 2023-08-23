<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;
    protected $table = 'masuks';

    protected $fillable = [
        'id_tarif',
        'kode',
    ];
    // protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function price()
    {
        return $this->belongsTo(Price::class, 'id_tarif', 'id');
    }
}
