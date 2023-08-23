<?php

namespace App\Http\Controllers;
use App\Models\Keluar;
use App\Models\Masuk;
use App\Models\Price;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert as Alert;
use Illuminate\Http\Request;

class KeluarController extends Controller
{
    //
    public function index()
    {
        $data = Masuk::all();

        return view('keluar.index')->with('masuk', $data);
    }

    public function inp(Request $request)
    {
        // return $request;
        $kode = $request -> kode;
        // return $kode;
        $gambar = $request -> gambar;
        $parkir = Masuk::where('kode', $kode)->first();

        if($parkir == null || $parkir->status == 'Keluar') return back()->with('error', 'Kode parkir tidak ditemukan');
        else {

            $price = Price::where('id', $parkir->id_tarif)->value('tarif');
            $id = auth()->user()->id;
    
            $start = Carbon::parse($parkir->created_at);
            $end = Carbon::now();
            $hours = Carbon::now()->diffInHours($parkir->created_at);
            $duration = $start->diff($end)->format('%H:%I:%S');
    
            $tarif = $parkir->price->tarif;
    
            if($parkir->price->waktu_maks != 0 && $parkir->price->tarif_maks != 0)
            {
                if( $hours + 1 >= $parkir->price->waktu_maks ) $harga = $parkir->price->tarif_maks;
                else $harga = ($hours + 1) * $tarif;
                // $id_tarif = $parkir->id_tarif;
                // $harga = ($hours + 1) * $tarif;
            }
            else $harga = ($hours + 1) * $tarif;
    
            return view('keluar.detail', compact('id', 'price', 'tarif', 'kode', 'harga', 'start', 'duration', 'end', 'gambar'));
        }
    }

    // public function updt(Request $request, $id)
    // {
    //     $parkir = Masuk::find($id);
    //     $parkir -> status = 'Keluar';
    //     $parkir -> tipe_kendaraan = $request->tipe_kendaraan;
    //     $parkir -> nomor_plat = $request->nomor_plat;
    //     $parkir -> duarsi = $request->durasi;

    //     $parkir->update();
    //     return redirect('keluar');
    // }

    public function updt(Request $request)
    {   
        
        // $print = Masuk::where('kode', $kode_parkir)->get();
        $parkir = Masuk::where('kode', $request->kode);
        // return $parkir;
        $parkir->update([
            // 'id' => $validateData['id'],
            'durasi' => $request->durasi,
            'harga' => $request->harga,
            'plat' => $request->plat,
            'status' => 'Keluar',
            'id_tarif' => $request->id_tarif,
        ]);

        Alert::success('Success', 'Berhasil bayar');
        return redirect('/struk-keluar/' . $request->kode);
    }


    public function keluar($kode_parkir)
    {
        $print = Masuk::where('kode', $kode_parkir)->get();
        return view('keluar.karcisout', compact('print'));
    }
}
