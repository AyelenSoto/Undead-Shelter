<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'contraseña' => 'required|min:8|confirmed',
        ]);

        $user = User::create([ 
            'nombre' => $validated['nomnre'],
            'email' => $validated['email'],
            'contraseña' => Hash::make($validated['contraseña']),
        ]);
    }
}
