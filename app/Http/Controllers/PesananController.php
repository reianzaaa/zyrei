<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\prioritas;

class PesananController extends Controller
{
    function index(){
        $orders = pesanan::join('prioritas','prioritas.id_paket','pesanans.id_paket')->select('pesanans.id','nama','nohp','nama_paket','keterangan')->get();

        return view('admin.pesanan',compact('orders'));
    }

    function store(Request $request){
        pesanan::create([
            'nama' => $request->name,
            'nohp' => $request->phone,
            'id_paket' => $request->paket
        ]);

        return "sucses";
    }
}
