<?php

namespace App\Http\Controllers;

use App\Models\lihatPelamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class LihatPelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $lihatPelamar = DB::table('hasil_perhitungan')->leftJoin('lowongans','lowongans.id','=','hasil_perhitungan.lowongan_id')
                                ->select(DB::raw('count(hasil_perhitungan.*) as jumlah_pelamar, hasil_perhitungan.lowongan_id, lowongans.judul_pekerjaan'))
                                ->groupBy('hasil_perhitungan.lowongan_id', 'lowongans.judul_pekerjaan')
                                ->where('lowongans.penyedia_kerja_id', Auth::user()->penyediaKerja->id)
                                ->get();
            return Datatables::of($lihatPelamar)->addIndexColumn()
                ->addColumn('action', function($lihatPelamar){
                    $btn = '<div class="dropdown dropstart text-end">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="'.route('lihat-pelamar.show', $lihatPelamar->lowongan_id).'">
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

        return view('penyediaKerja.lihatPelamar.index');
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
     * @param  \App\Models\lihatPelamar  $lihatPelamar
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // Hit API 
        Http::post('http://47.254.207.10:5000/measure/'. $id);

        $last_update = Carbon::now()->toDateTimeString();
        
        if ($request->ajax()) {
            $lihatPelamar = DB::table('hasil_perhitungan')->leftJoin('pencari_kerjas','pencari_kerjas.id','=','hasil_perhitungan.pencari_kerja_id')
                                ->leftJoin('users','users.id','=','pencari_kerjas.user_id')
                                ->select('users.name', 'hasil_perhitungan.rank', 'hasil_perhitungan.skor', 'hasil_perhitungan.pencari_kerja_id', 'hasil_perhitungan.last_update')
                                ->where('hasil_perhitungan.lowongan_id', $id)
                                ->orderBy('hasil_perhitungan.rank','asc')
                                ->get();
            return Datatables::of($lihatPelamar)
                ->addColumn('action', function($lihatPelamar){
                    $btn = '<div class="dropdown dropstart text-end">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="'.route('pencari-kerja.show', $lihatPelamar->pencari_kerja_id).'">
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
        
        return view('penyediaKerja.lihatPelamar.show', compact('last_update'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lihatPelamar  $lihatPelamar
     * @return \Illuminate\Http\Response
     */
    public function edit(lihatPelamar $lihatPelamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lihatPelamar  $lihatPelamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lihatPelamar $lihatPelamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lihatPelamar  $lihatPelamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(lihatPelamar $lihatPelamar)
    {
        //
    }
}
