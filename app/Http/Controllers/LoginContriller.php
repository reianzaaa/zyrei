<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginContriller extends Controller
{
    function index(){
        return view('page.auth.login');
    }

    function validasi (Request $request) {
         $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if($request->password == "admin" && $request->username == "admin"){
            
            Session::put('nama', $request->username);
            return redirect('/dashboard');
            // return Session::get('role');
        }
        return redirect()->back()->with('fail' , 'password salah!');
    }
     
    function logout(){
        Session::invalidate();
        Session::regenerateToken(); 
        return redirect('/login');
    }
}
