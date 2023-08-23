<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use App\Models\Price;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Alert;
use DateTime;

class MasukController extends Controller
{
    //

    public function index()
    {
        $price = Price::where('status', 'Masuk')->get();
        // dd ($price);
        return view('masuk', compact('price'));
    }
    // public function index()
    // {
    //     return view('masuk');
    // }

    public function create(Request $request)
    {
        $id_jenis = Price::where('id', $request->id)->value('id');
        $jenis_kendaraan = $request->tipe_kendaraan;
        $latest = Masuk::latest('id')->first()->id ?? new Masuk();
        
        
        $no = $latest++;
        $image =$no.'.png';


        // $kode_parkir = $id_jenis . " " . Carbon::now()->format('ymd His') . " " . ($latest->id + 1);
       
        // $kode_parkir = 'P' . $id_jenis . '-' . (($latest->id + 1), 6);
        $kode_parkir = mt_rand(10000000, 99999999);

        // $image = base64_decode($image);
        $parkir = Masuk::create([
            'id_tarif' => $id_jenis,
            'kode' => $kode_parkir,
            'gambar' => str_replace('data:image/jpeg;base64,','', $image),
            // 'gambar' => '1.png',
            'harga' => 0,
            'status' => 'Masuk',
            'plat' => '0',
            'durasi' => '0',
        ]);

        $parkir->save();

        return redirect('/struk/' . $parkir->kode);
    }


    public function struk($kode_parkir)
    {
        $print = Masuk::where('kode', $kode_parkir)->get();
        Alert::success('Success', 'Anda mendapatkan karcis');

        return view('karcis', compact('print'));
    }


    // public function karcis()
    // {
    //     $tanggal = Carbon::now();
    //     $jam = new DateTime();
    //     $latest_id = Masuk::latest('id')->first()->id ?? new Masuk();
    //     $no = $latest_id++;
    //     $image =$no.'.jfif';
        

    //     $cetak = new Masuk; 
    //     $cetak -> kode = mt_rand(10000000, 99999999);
    //     $cetak -> tanggal = $tanggal;
    //     $cetak -> gambar = str_replace('data:image/jpeg;base64,','', $image);
    //     $cetak -> status = 'masuk';
    //     $image = base64_decode($image);
	// 	$filename = 'image_'.time().'.png';
    //     // file_put_contents('public/img/'.$filename,$image);
    //     $cetak -> waktu_masuk = $jam;
    //     $cetak -> save();

    //     return redirect('karcis'.$cetak->id);
    // }

    
    // public function print($id)
    // {
    //     $print = Masuk::where('id', $id)->get();

    //     Alert::success('Success', 'Anda mendapatkan karcis');

    //     return view('karcis', compact('print'));
    // }


}
