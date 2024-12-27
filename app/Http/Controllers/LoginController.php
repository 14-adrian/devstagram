<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        
        //dd($request->get('username'));
        //dd($request->remember);

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
        
        
        $validatedData;

        

        if (!auth('web')->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        return redirect()->route('posts.index', auth('web')->user()->username);
        
    }
}
