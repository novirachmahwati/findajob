<?php

namespace App\Http\Controllers;

use App\Models\lihatPelamar;
use Illuminate\Http\Request;
use DataTables;

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
            $lihatPelamar = lihatPelamar::leftJoin('lowongans','lowongans.id','=','hasil_perhitungan.lowongan_id')
                                ->select('lowongans.id','lowongans.judul_pekerjaan','COUNT(hasil_perhitungan.id) as jumlah_pelamar')
                                ->group_by('hasil_perhitungan.lowongan_id')
                                ->orderBy('lowongans.id','desc')
                                ->get();
            return Datatables::of($lihatPelamar)->addIndexColumn()
                ->addColumn('action', function($lihatPelamar){
                    $btn = '<div class="dropdown dropstart text-end">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="'.route('lihat-pelamar.show', $lihatPelamar->id).'">
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
    public function show(lihatPelamar $lihatPelamar)
    {
        return view('penyediaKerja.lihatPelamar.show', compact(['lihatPelamar']));
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
