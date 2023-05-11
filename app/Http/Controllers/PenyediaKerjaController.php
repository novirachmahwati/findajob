<?php

namespace App\Http\Controllers;

use App\Models\penyediaKerja;
use App\Models\lowonganKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyediaKerjaController extends Controller
{
    
    // Lengkapi Data
    public function LD_create()
    {
        return view('penyediaKerja.lengkapi-data');
    }

    public function LD_store()
    {
        $attributes = request()->validate([
            'nama_administrator' => 'required|max:255',
            'no_telp_administrator' => 'required|max:16',
            'user_id' => 'required'
        ]);
        
        penyediaKerja::create($attributes);
        
        return redirect('/penyedia-kerja/data-perusahaan');
    }

    // Data Perusahaan
    public function DP_create()
    {
        return view('penyediaKerja.data-perusahaan');
    }

    public function DP_store()
    {
        $attributes = request()->validate([
            'bidang' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:16',
            'jml_karyawan' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'user_id' => 'required'
        ]);
        
        penyediaKerja::create($attributes);
        
        return redirect('/penyedia-kerja/unggah-foto');
    }

    // Unggah Foto
    public function UFP_create()
    {
        return view('penyediaKerja.unggah-foto');
    }

    public function UFP_store(Request $request)
    {
        $requestData = $request->all();
        $foto = $request->hasFile('foto');
        if($foto){
            $fileName = time().$request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('images', $fileName, 'public');
            $requestData['foto'] = '/storage/'.$path;
            
            $penyediaKerja = penyediaKerja::where('id', Auth::user()->penyediaKerja->id)->first();
            $penyediaKerja->fill($requestData);
            $penyediaKerja->save();
        }
        
        return redirect('/penyedia-kerja/unggah-lowongan');
        
        
    }

    // Unggah Lowongan
    public function UL_create()
    {
        return view('penyediaKerja.unggah-lowongan');
    }

    public function UL_store(Request $request)
    {
        return redirect('/penyedia-kerja/dashboard');
    }

    // Unggah Lowongan Pekerjaan
    public function ULP_create()
    {
        return view('penyediaKerja.unggah-lowongan-pekerjaan');
    }

    public function ULP_store(Request $request)
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

            lowonganKerja::create($attributes);
        }
        
        return redirect('/penyedia-kerja/dashboard');
        
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penyediaKerja  $penyediaKerja
     * @return \Illuminate\Http\Response
     */
    public function show(penyediaKerja $penyediaKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penyediaKerja  $penyediaKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(penyediaKerja $penyediaKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penyediaKerja  $penyediaKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penyediaKerja $penyediaKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penyediaKerja  $penyediaKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(penyediaKerja $penyediaKerja)
    {
        //
    }
}
