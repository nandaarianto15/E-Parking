<?php

namespace App\Http\Controllers;
use App\Models\Keluar;
use App\Models\Masuk;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeluarController extends Controller
{
    //
    public function index()
    {
        $price = Masuk::where('id', null)->get();
        return view('keluar.index', compact('price'));
    }

    public function inp(Request $request)
    {
        $kode = $request -> kode;
        $parkir = Masuk::where('kode', $kode)->first();
        $price = Price::all();
        $id = auth()->user();

        $start = Carbon::parse($parkir->created_at);
        $end = Carbon::now();
        $hours = Carbon::now()->diffInHours($parkir->created_at);

        $duration = $start->diff($end)->format('%H:%I:%S');

        $tarif = $parkir->price;
        $harga = ($hours + 1) * $tarif;

        return view('keluar.detail', compact('id', 'tarif', 'price', 'kode', 'harga', 'start', 'duration', 'end'));
    }
}
