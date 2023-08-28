<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pencariKerja;
use App\Models\penyediaKerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

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
                'tgl_lahir' => 'required|date|before:tomorrow',
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
            if ($attributes['usia'] < 15) {
                return back()->withErrors(['tgl_lahir' => 'Usia minimum untuk diperbolehkan bekerja adalah 15 (lima belas) tahun'])
                ->withInput();
            }
    
            $pencariKerja = pencariKerja::where('id', Auth::user()->pencariKerja->id)->first();
            $pencariKerja->fill($attributes);
            $pencariKerja->save();

        } else {
            $attributes = request()->validate([
                'name' => 'required|max:255',
                'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
                'bidang' => 'required|max:255',
                'alamat' => 'required|max:255',
                'no_telp' => 'required|max:20',
                'jml_karyawan' => 'required|max:50',
                'deskripsi' => 'required|max:5000'
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
