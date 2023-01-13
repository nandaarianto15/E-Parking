<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth as Auth;


class PegawaiController extends Controller
{
    //
    public function index()
    {
        $user = User::all();

        return view('pegawai')->with('user', $user);
    }
}
