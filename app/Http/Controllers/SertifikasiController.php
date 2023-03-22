<?php

namespace App\Http\Controllers;

use App\Models\sertifikasi;
use Illuminate\Http\Request;
use App\DataTables\sertifikasiDataTable;
use DataTables;

class SertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = sertifikasi::select('id','nama','penerbit','tgl_diterbitkan','kredensial_url')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('kredensial_button', function($data){
                    $kredensialBtn = '<a href="'.$data->kredensial_url.'" class="btn btn-sm btn-outline-secondary">Tampilkan Kredensial</a>';
                    return $kredensialBtn;
                })
                ->addColumn('action', function($data){
                    // $btn = '<a href="javascript:void(0)" class="btn btn-sm btn-light btn-circle"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    $btn = '<div class="dropdown dropstart">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-eye" aria-hidden="true"></i>Lihat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i>Hapus</a></li>
                                </ul>
                            </div>';
                //     $btn = '<div class="dropdown">
                //                 <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                //                     <i class="fa fa-ellipsis-v"></i>
                //                 </button>
                //                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                //                     <li><a class="dropdown-item" href="#">Lihat</a></li>
                //                     <li><a class="dropdown-item" href="#">Edit</a></li>
                //                     <li><a class="dropdown-item" href="#">Hapus</a></li>
                //                 </ul>
                //   </div>';
                    return $btn;
                })
                ->rawColumns(['kredensial_button','action'])
                ->make(true);
        }

        // return view('users');
        // return $dataTable->render('pencariKerja.sertifikasi.index');
        return view('pencariKerja.sertifikasi.index');
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
     * @param  \App\Models\sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(sertifikasi $sertifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(sertifikasi $sertifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sertifikasi $sertifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(sertifikasi $sertifikasi)
    {
        //
    }
}
