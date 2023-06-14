<?php

namespace App\Http\Controllers;

use App\Models\pencariKerja;
use App\Models\sertifikasi;
use App\Models\riwayatLamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PencariKerjaController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $jml_lamaranTerkirim = riwayatLamaran::where('pencari_kerja_id', Auth::user()->pencariKerja->id)->count();
        $jml_sertifikasi = sertifikasi::where('pencari_kerja_id', Auth::user()->pencariKerja->id)->count();
        return view('pencariKerja.dashboard')
                    ->with('jml_lamaranTerkirim', $jml_lamaranTerkirim)
                    ->with('jml_sertifikasi', $jml_sertifikasi);
                    
    }

    // Profil
    public function profil()
    {
        return view('pencariKerja.profil');
                    
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pencariKerja  $pencariKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pencariKerja $pencariKerja)
    {
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

        $pencariKerja = pencariKerja::where('id', Auth::user()->pencariKerja->id)->first();
        $pencariKerja->fill($attributes);
        $pencariKerja->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    // Lengkapi Biodata
    public function LB_create()
    {
        return view('pencariKerja.lengkapi-biodata');
    }

    public function LB_store()
    {
        $attributes = request()->validate([
            'alamat' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|max:255',
            'no_telp' => 'required|max:15',
            'agama' => 'required|max:20',
            'user_id' => 'required'
        ]);
        
        pencariKerja::create($attributes);
        
        return redirect('/pencari-kerja/unggah-foto');
    }

    // Unggah Foto
    public function UF_create()
    {
        return view('pencariKerja.unggah-foto');
    }

    public function UF_store(Request $request)
    {
        $requestData = $request->all();
        $foto = $request->hasFile('foto');
        if($foto){
            $fileName = time().$request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('images', $fileName, 'public');
            $requestData['foto'] = '/storage/'.$path;
            
            $pencariKerja = pencariKerja::where('id', Auth::user()->pencariKerja->id)->first();
            $pencariKerja->fill($requestData);
            $pencariKerja->save();
        }
        
        return redirect('/pencari-kerja/sertifikasi');
        
        
    }

    // Sertifikasi
    public function SE_create()
    {
        return view('pencariKerja.sertifikasi');
    }

    public function SE_store(Request $request)
    {
        if ($request->filled('nama')) {
            $attributes = request()->validate([
                'nama' => 'required|max:255',
                'penerbit' => 'required|max:255',
                'tgl_diterbitkan' => 'required|date',
                'tgl_kadaluwarsa' => 'required|date',
                'kredensial_id' => 'required|max:255',
                'kredensial_url' => 'required|max:255',
                'pencari_kerja_id' => 'required'
            ]);

            sertifikasi::create($attributes);
        }
        
        return redirect('/pencari-kerja/unggah-daftar-riwayat-hidup');
        
        
    }

    // Unggah Daftar Riwayat Hidup
    public function UC_create()
    {
        return view('pencariKerja.unggah-daftar-riwayat-hidup');
    }

    public function UC_store(Request $request)
    {
        $rules = [
            'cv' => 'required'
        ];

        $messages = [
            'cv.required' => 'Daftar riwayat hidup wajib diisi.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/pencari-kerja/unggah-daftar-riwayat-hidup')
                        ->withErrors($validator)
                        ->withInput();
        }

        $requestData = $request->all();
        
        $cvBase64 = base64_encode(file_get_contents($request->file('cv')));
        $requestData['cv'] = $cvBase64 ;
        $pencariKerja = pencariKerja::where('id', Auth::user()->pencariKerja->id)->first();
        $pencariKerja->fill($requestData);
        $pencariKerja->save();
        
        return redirect('/dashboard');
        
        
    }
    
    public function UC_download()
    {
        return Storage::disk('public')->download('formatCV/Rekomendasi Format Daftar Riwayat Hidup.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pencariKerja  $pencariKerja
     * @return \Illuminate\Http\Response
     */
    public function show(pencariKerja $pencariKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pencariKerja  $pencariKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(pencariKerja $pencariKerja)
    {
        //
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pencariKerja  $pencariKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(pencariKerja $pencariKerja)
    {
        //
    }
}
