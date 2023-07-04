<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pencariKerja;
use App\Models\penyediaKerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    public function show()
    {
        return view('pages.profil');
    }

    public function update(Request $request)
    {
        if (Auth::user()->role == 'Pencari Kerja') {
            $attributes = request()->validate([
                'name' => 'required|max:255',
                'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
                'alamat' => 'required|max:255',
                'tempat_lahir' => 'required|max:255',
                'tgl_lahir' => 'required|date',
                'jenis_kelamin' => 'required|max:255',
                'no_telp' => 'required|max:16',
                'usia' => 'required',
                'agama' => 'required|max:20'
            ]);

            auth()->user()->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
            ]);

            $attributes['usia'] = Carbon::parse($attributes['tgl_lahir'])->age;
    
            $pencariKerja = pencariKerja::where('id', Auth::user()->pencariKerja->id)->first();
            $pencariKerja->fill($attributes);
            $pencariKerja->save();

        } else {
            $attributes = request()->validate([
                'name' => 'required|max:255',
                'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
                'alamat' => 'required|max:255',
                'tempat_lahir' => 'required|max:255',
                'tgl_lahir' => 'required|date',
                'jenis_kelamin' => 'required|max:255',
                'no_telp' => 'required|max:16',
                'agama' => 'required|max:20'
            ]);

            auth()->user()->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
            ]);
    
            $penyediaKerja = penyediaKerja::where('id', Auth::user()->penyediaKerja->id)->first();
            $penyediaKerja->fill($attributes);
            $penyediaKerja->save();
        }
        
        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
