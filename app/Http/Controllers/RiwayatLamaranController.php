<?php

namespace App\Http\Controllers;

use App\Models\riwayatLamaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DataTables;

class RiwayatLamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $riwayatLamaran = riwayatLamaran::leftJoin('lowongans','lowongans.id','=','riwayat_lamarans.lowongan_id')
                                            ->leftJoin('penyedia_kerjas','penyedia_kerjas.id','=','lowongans.penyedia_kerja_id')
                                            ->leftJoin('users','users.id','=','penyedia_kerjas.user_id')
                                            ->select('riwayat_lamarans.id','lowongans.judul_pekerjaan','users.name','lowongans.lokasi_pekerjaan','lowongans.status','riwayat_lamarans.created_at','riwayat_lamarans.lowongan_id',)
                                            ->where('riwayat_lamarans.pencari_kerja_id', Auth::user()->pencariKerja->id)
                                            ->orderBy('riwayat_lamarans.id','desc')->get();
            return Datatables::of($riwayatLamaran)->addIndexColumn()
                ->editColumn('created_at', function ($riwayatLamaran) {
                    return date('Y-m-d H:i:s', strtotime($riwayatLamaran->created_at) );
                })
                ->addColumn('action', function($riwayatLamaran){
                    $btn = '<div class="dropdown dropstart text-end">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="'.route('lowongan.show', $riwayatLamaran->lowongan_id).'">
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

        return view('pencariKerja.riwayatLamaran.index');
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
        $attributes = request()->validate([
            'lowongan_id' => 'required',
            'pencari_kerja_id' => 'required'
        ]);
        
        $riwayatLamaran = riwayatLamaran::create($attributes);
        $riwayatLamaran->load('lowongan');
        
        return view('pencariKerja.cariLowongan.sukses-lamar',['riwayatLamaran' => $riwayatLamaran]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\riwayatLamaran  $riwayatLamaran
     * @return \Illuminate\Http\Response
     */
    public function show(riwayatLamaran $riwayatLamaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\riwayatLamaran  $riwayatLamaran
     * @return \Illuminate\Http\Response
     */
    public function edit(riwayatLamaran $riwayatLamaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\riwayatLamaran  $riwayatLamaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, riwayatLamaran $riwayatLamaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\riwayatLamaran  $riwayatLamaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(riwayatLamaran $riwayatLamaran)
    {
        //
    }
}
