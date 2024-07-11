<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paket;
use App\Models\prioritas;

use function PHPUnit\Framework\returnSelf;

class SAWController extends Controller
{
    function bobotHarga($harga){
        return ceil($harga/32000);
    }
    function bobotHari($hari){
        return ceil($hari/10);
    }
    function bobotGrup($grup){
        return ceil($grup/10);
    }

    function getArrayHarga(){
        $pakets = paket::all();
        $arr = [];
        foreach ($pakets as $paket){
        array_push($arr, $this->bobotHarga($paket->harga));
        }
        return $arr;
    }
    function getArrayHari(){
        $pakets = paket::all();
        $arr = [];
        foreach ($pakets as $paket){
        array_push($arr, $this->bobotHari($paket->hari));
        }
        return $arr;
    } 
    
    function getArrayGrup(){
        $pakets = paket::all();
        $arr = [];
        foreach ($pakets as $paket){
        array_push($arr,$this->bobotHari($paket->grup));
        }
        return $arr;
    }

    function benenfit($val,$arr){
        return $val/max($arr);
    }
    function cost($val,$arr){
        return min($arr)/$val;
    }

    function hasil($harga,$hari,$grup) {
        return ($harga*0.5) + ($hari*0.3) + ($grup*0.2);
    }

    function SAW() {
       $paket = paket::all();
       prioritas::truncate();
        foreach ($paket as $item){
            $harga = $this->benenfit($this->bobotHarga($item->harga), $this->getArrayHarga());
            $hari = $this->cost($this->bobotHari($item->hari),$this->getArrayHari());
            $grup = $this->cost($this->bobotGrup($item->grup),$this->getArrayGrup());
            $hasil = $this->hasil($harga,$hari,$grup)*100;
        prioritas::create([
            'nama_paket' => $item->nama,
            'hari_paket' => $item->hari,
            'id_paket' => $item->id,
            'harga' =>  $harga,
            'hari'=> $hari ,
            'grup' => $grup ,
            'hasil' => $hasil,
            'keterangan' => $hasil >= 55? "Priortitas" : "-" , ]);
        }
        return redirect()->back();
    }
    function index(){
        $data = prioritas::all();

        return view('admin.saw',compact('data'));
    }


}
