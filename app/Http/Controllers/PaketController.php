<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paket;

class PaketController extends Controller
{
    function index()
    {
        $paket = paket::all();
        return view('admin.paket',compact('paket'));
    }
    function store(Request $request)
    {
        paket::create([
             'nama' => $request->nama,
             'hari'=> $request->hari,
             'harga' => $request->harga,
             'grup' => $request->grup,
        ]);
        return  redirect()->back();
    }
    function show($id)
    {
        $paket = paket::where('id',$id)->first();
        return response()->json(['data'=>$paket]);
    }
    function update($id, Request $request)
    {
        if(paket::where('id',$id)->update([
            'nama' => $request->nama,
            'hari'=> $request->hari,
            'harga' => $request->harga,
            'grup' => $request->grup,
       ])) {
        return redirect()->back();
       }
       
    }
    function destroy($id)
    {
        if(paket::where('id',$id)->delete()){
            return redirect()->back();
        }
    }
}
