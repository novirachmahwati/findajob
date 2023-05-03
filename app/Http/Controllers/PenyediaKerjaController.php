<?php

namespace App\Http\Controllers;

use App\Models\penyediaKerja;
use Illuminate\Http\Request;

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
            'no_telp' => 'required|date',
            'jml_karyawan' => 'required|max:255',
            'deskripsi' => 'required|max:15',
            'website' => 'required|max:20',
            'sosial_media' => 'required|max:255',
            'user_id' => 'required'
        ]);
        
        penyediaKerja::create($attributes);
        
        return redirect('/pencari-kerja/unggah-foto');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
