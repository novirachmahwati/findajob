<?php

namespace App\Http\Controllers;

use App\Models\penyediaKerja;
use App\Models\lowonganKerja;
use App\Models\kriteria;
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

    public function UL_store()
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
        $attributes = request()->validate([
            'judul_pekerjaan' => 'required|max:255',
            'deskripsi_pekerjaan' => 'required|max:1000',
            'jenis_pekerjaan' => 'required|max:255',
            'lokasi_pekerjaan' => 'required|max:255',
            'rentang_gaji_minimal' => 'required|max:255',
            'rentang_gaji_maksimal' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_tayang' => 'required|date',
            'tanggal_kadaluwarsa' => 'required|date',
            'kuota' => 'required|max:10000',
            'status' => 'required|max:255',
            'penyedia_kerja_id' => 'required'
        ]);

        $attributes['jenis_kelamin'] = $request->input('jenis_kelamin');

        $lowonganKerja = lowonganKerja::create($attributes);
        
        // return redirect('/penyedia-kerja/dashboard');
        // return redirect()->route('PUK.create')->with([ 'lowongan_kerja_id' => $lowonganKerja->id ]);
        return view('penyediaKerja.persyaratan-umum-khusus',['lowongan_kerja_id' => $lowonganKerja->id]);
    }

    // Persyaratan Umum & Khusus
    public function PUK_create()
    {
        return view('penyediaKerja.persyaratan-umum-khusus');
    }

    public function PUK_store(Request $request)
    {
        $attributes = request()->validate([
            'minimal_pendidikan' => 'required|max:255',
            'prioritas_minimal_pendidikan' => 'required|max:500',
            'tahun_pengalaman' => 'required|max:255',
            'jurusan_pendidikan_terakhir' => 'required|max:255',
            'status_pernikahan' => 'required|max:255',
            'rentang_usia_minimal' => 'required|max:255',
            'rentang_usia_maksimal' => 'required|max:255',
            'bahasa' => 'required|max:255',
            'keterampilan_teknis' => 'required|max:255',
            'prioritas_keterampilan_teknis' => 'required|max:255',
            'keterampilan_non_teknis' => 'required|max:255',
            'prioritas_keterampilan_non_teknis' => 'required|max:255',
            'lowongan_kerja_id' => 'required'
        ]);

        switch($request->minimal_pendidikan) {
            case('S3'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':0, 'S2':0, 'S3':0]";
                break;
            case('S2'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':0, 'S2':0, 'S3':0]";
                break;
            case('S1 / D4'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':0, 'S2':0, 'S3':0]";
                break;
            case('D3'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':0, 'S2':0, 'S3':0]";
                break;
            case('SMA / SMK'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':0, 'S2':0, 'S3':0]";
                break;
            case('SMP'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':0, 'S2':0, 'S3':0]";
                break;
            case('SD'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':0, 'S2':0, 'S3':0]";
                break;
        }

        $attributes['status_pernikahan'] = $request->input('status_pernikahan');
        $attributes['bahasa'] = $request->input('bahasa');
        $attributes['keterampilan_teknis'] = $request->input('keterampilan_teknis');
        $attributes['prioritas_keterampilan_teknis'] = $request->input('prioritas_keterampilan_teknis');
        $attributes['keterampilan_non_teknis'] = $request->input('keterampilan_non_teknis');
        $attributes['prioritas_keterampilan_non_teknis'] = $request->input('prioritas_keterampilan_non_teknis');
        
        $kriteria = kriteria::create($attributes);
        
        // return redirect('/penyedia-kerja/dashboard');
        // return redirect()->route('PUK.create')->with([ 'lowongan_kerja_id' => $kriteria->lowongan_kerja_id ]);
        return view('penyediaKerja.kontak',['lowongan_kerja_id' => $kriteria->lowongan_kerja_id]);
    }

    // Kontak Lowongan Pekerjaan
    public function KL_create()
    {
        return view('penyediaKerja.kontak');
    }

    public function KL_store(Request $request)
    {
        $attributes = request()->validate([
            'judul_pekerjaan' => 'required|max:255',
            'deskripsi_pekerjaan' => 'required|max:1000',
            'jenis_pekerjaan' => 'required|max:255',
            'lokasi_pekerjaan' => 'required|max:255',
            'rentang_gaji_minimal' => 'required|max:255',
            'rentang_gaji_maksimal' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_tayang' => 'required|date',
            'tanggal_kadaluwarsa' => 'required|date',
            'kuota' => 'required|max:10000',
            'status' => 'required|max:255',
            'penyedia_kerja_id' => 'required'
        ]);

        $lowonganKerja = lowonganKerja::create($attributes);
        
        // return redirect('/penyedia-kerja/dashboard');
        return redirect()->route('PUK.create')->with([ 'lowongan_kerja_id' => $lowonganKerja->id ]);
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
