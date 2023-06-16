<?php

namespace App\Http\Controllers;

use App\Models\lowonganKerja;
use Illuminate\Http\Request;
use DataTables;

class LowonganKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $lowonganKerja = lowonganKerja::select('id','judul_pekerjaan','jenis_pekerjaan','lokasi_pekerjaan')->orderBy('id','desc')->get();
            return Datatables::of($lowonganKerja)->addIndexColumn()
                ->addColumn('action', function($lowonganKerja){
                    $btn = '<div class="dropdown dropstart text-end">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="'.route('lowongan.show', $lowonganKerja->id).'">
                                            <i class="fa fa-eye text-success" aria-hidden="true"></i>
                                            <span class="d-sm-inline d-none ms-2">Lihat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="'.route('lowongan.edit', $lowonganKerja->id).'">
                                            <i class="fa fa-pencil text-primary" aria-hidden="true"></i>
                                            <span class="d-sm-inline d-none ms-2">Edit</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item deleteSertifikasi" href="javascript:void(0);" data-toggle="tooltip" data-id="'.$lowonganKerja->id .'">
                                            <i class="fa fa-trash-o text-danger" aria-hidden="true"></i>
                                            <span class="d-sm-inline d-none ms-2">Hapus</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pencariKerja.lowongan.index');
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
     * @param  \App\Models\lowonganKerja  $lowonganKerja
     * @return \Illuminate\Http\Response
     */
    public function show(lowonganKerja $lowonganKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lowonganKerja  $lowonganKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(lowonganKerja $lowonganKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lowonganKerja  $lowonganKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lowonganKerja $lowonganKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lowonganKerja  $lowonganKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(lowonganKerja $lowonganKerja)
    {
        //
    }
}
