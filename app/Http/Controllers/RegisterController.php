<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validaar
        //dd($request);
        $request->request->add(['username' => Str::slug($request->username)]);
        //dd($request->get('username'));

        $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'

        ]);

        

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);

        auth('web')->attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ]);

        return redirect()->route('posts.index');
    }
}
