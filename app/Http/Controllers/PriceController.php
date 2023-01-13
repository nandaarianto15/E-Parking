<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class PriceController extends Controller
{
    //
    public function index()
    {
        $price = Price::all();

        return view('price')->with('price', $price);
    }
    
    public function input(Request $request)
    {
        
        $harga = new Price;
        $harga -> tipe_kendaraan = $request -> tipe_kendaraan; 
        $harga -> harga = $request -> harga;
        $harga -> save();
        
        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('price');
    }

    public function delete($id)
    {
        $post = Price::find($id);
        $post -> delete();
    
        return redirect('price');
    }

    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $pegawai = DB::table('prices')->where('id',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('editprice',['prices' => $pegawai]);
    
    }
    
    public function update(Request $request, $id)
    {

        $edit = Price::where('id', $id)->first();
        $edit->tipe_kendaraan = $request->tipe_kendaraan;
        $edit->harga = $request->harga;
        
        $edit->update();
        // dd($user);
        
        Alert::success('Success', 'Data berhasil di edit');
        return redirect('price');
    }
}
