<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Alert;
use DateTime;

class MasukController extends Controller
{
    //
    public function index()
    {
        return view('masuk');
    }

    public function karcis()
    {
        $tanggal = Carbon::now();
        $jam = new DateTime();
        
        $cetak = new Masuk; 
        $cetak -> kode = mt_rand(10000000, 99999999);
        $cetak -> tanggal = $tanggal;
        $cetak -> waktu_masuk = $jam;
        $cetak -> save();

        return redirect('karcis'.$cetak->id);
    }

    public function print($id)
    {
        $print = Masuk::where('id', $id)->get();

        Alert::success('Success', 'Anda mendapatkan karcis');

        return view('karcis', compact('print'));
    }

    public function data()
    {
        $data = Masuk::all();

        return view('kendaraan.in')->with('masuk', $data);
    }
}
