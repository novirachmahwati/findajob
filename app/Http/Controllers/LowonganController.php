<?php

namespace App\Http\Controllers;

use App\Models\lowongan;
use App\Models\riwayatLamaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DataTables;

class lowonganController extends Controller
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
                                </ul>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pencariKerja.cariLowongan.index');
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
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(lowongan $lowongan)
    {
        $riwayatLamaran = 0;

        if (Auth::user()->role == 'Pencari Kerja') {
            $riwayatLamaran = riwayatLamaran::where('lowongan_id', $lowongan->id)
                            ->where('pencari_kerja_id', Auth::user()->pencariKerja->id)
                            ->get();
        }
        
        $lowongan->load(['kriteria','penyediaKerja']);
        return view('pencariKerja.cariLowongan.show', compact(['lowongan','riwayatLamaran']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(lowongan $lowongan)
    {
        $lowongan->load(['kriteria','penyediaKerja']);
        return view('penyediaKerja.kelolaLowongan.edit', compact('lowongan'));
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
        $request->validate([
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
            'penyedia_kerja_id' => 'required',
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
            'faktor_utama' => 'required|max:255',
            'bobot_faktor_utama' => 'required|max:255',
            'faktor_pendukung' => 'required|max:255',
            'bobot_faktor_pendukung' => 'required|max:255',
            'lowongan_id' => 'required'
        ]);

        auth()->user()->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);
        $lowongan->fill($request->post())->save();
        
        return redirect()->route('sertifikasi.index')->with('success', 'Sertifikasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(lowongan $lowongan)
    {
        $lowongan->delete();
        return redirect()->route('kelola-lowongan.index')->with('error', 'Sertifikasi berhasil dihapus!');
    }
}
