<?php

namespace App\Http\Controllers;

use App\Models\lowongan;
use App\Models\riwayatLamaran;
use App\Models\kriteria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DataTables;
use App\Rules\JumlahBobot;
use Carbon\Carbon;

class KelolaLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $lowongan = lowongan::leftJoin('penyedia_kerjas','penyedia_kerjas.id','=','lowongans.penyedia_kerja_id')
                                ->leftJoin('users','users.id','=','penyedia_kerjas.user_id')
                                ->select('lowongans.id','lowongans.judul_pekerjaan','users.name','lowongans.lokasi_pekerjaan','lowongans.jenis_pekerjaan')
                                ->where('penyedia_kerja_id', Auth::user()->penyediaKerja->id)
                                ->orderBy('lowongans.id','desc')
                                ->get();
            return Datatables::of($lowongan)->addIndexColumn()
                ->addColumn('action', function($lowongan){
                    $btn = '<div class="dropdown dropstart text-end">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="'.route('lowongan.show', $lowongan->id).'">
                                            <i class="fa fa-eye text-success" aria-hidden="true"></i>
                                            <span class="d-sm-inline d-none ms-2">Lihat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="'.route('lowongan.edit', $lowongan->id).'">
                                            <i class="fa fa-pencil text-primary" aria-hidden="true"></i>
                                            <span class="d-sm-inline d-none ms-2">Edit</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('penyediaKerja.kelolaLowongan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dateToday = Carbon::now()->format('Y-m-d');
        $dateEndYear = Carbon::now()->endOfYear()->format('Y-m-d');

        return view('penyediaKerja.kelolaLowongan.create', compact(['dateToday', 'dateEndYear']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $lowongan = lowongan::create($attributes);
        
        return redirect()->route('persyaratan-umum-khusus.create', ['lowongan_id' => $lowongan->id]);
    }

    // Persyaratan Umum & Khusus
    public function PUK_create($lowongan_id)
    {
        return view('penyediaKerja.kelolaLowongan.persyaratan-umum-khusus',['lowongan_id' => $lowongan_id]);
    }
    public function PUK_store(Request $request)
    {
        $attributes = request()->validate([
            'minimal_pendidikan' => 'required|max:255',
            'prioritas_minimal_pendidikan' => 'required|max:500',
            'pengalaman' => 'required|max:255',
            'jurusan_pendidikan_terakhir' => 'required|max:255',
            'rentang_usia' => 'required|max:255',
            'bahasa' => 'required|max:255',
            'keterampilan_teknis' => 'required|max:255',
            'prioritas_keterampilan_teknis' => 'required|max:255',
            'keterampilan_non_teknis' => 'required|max:255',
            'prioritas_keterampilan_non_teknis' => 'required|max:255',
            'sertifikasi' => 'max:255',
            'prioritas_sertifikasi' => 'required|max:255',
            'lowongan_id' => 'required'
        ]);

        switch($request->minimal_pendidikan) {
            case('S3'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':0, 'S2':0, 'S3':1]";
                break;
            case('S2'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':0, 'S2':1, 'S3':2]";
                break;
            case('S1 / D4'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':0, 'S1 / D4':1, 'S2':2, 'S3':3]";
                break;
            case('D3'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':0, 'D3':1, 'S1 / D4':2, 'S2':3, 'S3':4]";
                break;
            case('SMA / SMK'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':0, 'SMA / SMK':1, 'D3':2, 'S1 / D4':3, 'S2':4, 'S3':5]";
                break;
            case('SMP'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':0, 'SMP':1, 'SMA / SMK':2, 'D3':3, 'S1 / D4':4, 'S2':5, 'S3':6]";
                break;
            case('SD'):
                $attributes['prioritas_minimal_pendidikan'] = "['SD':1, 'SMP':2, 'SMA / SMK':3, 'D3':4, 'S1 / D4':5, 'S2':6, 'S3':7]";
                break;
        }

        $attributes['bahasa'] = $request->input('bahasa');
        $attributes['keterampilan_teknis'] = $request->input('keterampilan_teknis');
        $attributes['prioritas_keterampilan_teknis'] = $request->input('prioritas_keterampilan_teknis');
        $attributes['keterampilan_non_teknis'] = $request->input('keterampilan_non_teknis');
        $attributes['prioritas_keterampilan_non_teknis'] = $request->input('prioritas_keterampilan_non_teknis');
        $attributes['sertifikasi'] = $request->input('sertifikasi');
        $attributes['prioritas_sertifikasi'] = $request->input('prioritas_sertifikasi');
        
        $kriteria = kriteria::create($attributes);
        
        return redirect()->route('pembobotan-persyaratan.create', ['lowongan_id' => $kriteria->lowongan_id]);
    }

    // Pembobotan Persyaratan
    public function PP_create($lowongan_id)
    {
        return view('penyediaKerja.kelolaLowongan.pembobotan-persyaratan',['lowongan_id' => $lowongan_id]);
    }
    public function PP_store(Request $request)
    {
        $attributes = request()->validate([
            'faktor_utama' => 'required|max:255',
            'bobot_faktor_utama' => 'required|max:255',
            'faktor_pendukung' => 'required|max:255',
            'bobot_faktor_pendukung' => 'required|max:255',
            'lowongan_id' => 'required'
        ]);
            
        $attributes['faktor_utama'] = $request->input('faktor_utama');
        $attributes['bobot_faktor_utama'] = $request->input('bobot_faktor_utama');
        $attributes['faktor_pendukung'] = $request->input('faktor_pendukung');
        $attributes['bobot_faktor_pendukung'] = $request->input('bobot_faktor_pendukung');

        // if (array_sum($attributes['bobot_faktor_utama']) != 1) {
        //     return back()->with('error', 'Jumlah bobot faktor utama tidak boleh lebih/kurang dari 1');
        // }

        $lowongan = kriteria::where('lowongan_id', $attributes['lowongan_id'])->first();
        $lowongan->fill($attributes);
        $lowongan->save();

        return redirect()->route('syarat-dan-ketentuan.create');
    }

    // Syarat dan Ketentuan
    public function SDK_create()
    {
        return view('penyediaKerja.kelolaLowongan.syarat-dan-ketentuan');
    }
    public function SDK_store()
    {   
        return redirect()->route('kelola-lowongan.index')->with('success', 'Lowongan berhasil diunggah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(lowongan $lowongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(lowongan $lowongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lowongan $lowongan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(lowongan $lowongan)
    {
        //
    }
}
