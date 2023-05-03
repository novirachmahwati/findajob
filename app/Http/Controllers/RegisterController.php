<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function createPenyediaKerja()
    {
        return view('auth.registerPenyediaKerja');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:50|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'role' => 'required'
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/pencari-kerja/lengkapi-biodata');
    }

    public function storePenyediaKerja()
    {
        $attributes = request()->validate([
            'name' => 'required|max:50|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'role' => 'required'
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/penyedia-kerja/lengkapi-data');
    }
}
