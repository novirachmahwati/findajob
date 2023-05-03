<?php

namespace App\Http\Controllers;

use App\Models\sertifikasi;
use Illuminate\Http\Request;
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
            $sertifikasi = sertifikasi::select('id','nama','penerbit','tgl_diterbitkan')->orderBy('tgl_diterbitkan','desc')->get();
            return Datatables::of($sertifikasi)->addIndexColumn()
                ->addColumn('action', function($sertifikasi){
                    $btn = '<div class="dropdown dropstart text-end">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="'.route('sertifikasi.show', $sertifikasi->id).'">
                                            <i class="fa fa-eye text-success" aria-hidden="true"></i>
                                            <span class="d-sm-inline d-none ms-2">Lihat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="'.route('sertifikasi.edit', $sertifikasi->id).'">
                                            <i class="fa fa-pencil text-primary" aria-hidden="true"></i>
                                            <span class="d-sm-inline d-none ms-2">Edit</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item deleteSertifikasi" href="javascript:void(0);" data-toggle="tooltip" data-id="'.$sertifikasi->id .'">
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

            sertifikasi::create($attributes);
        }
        
        return back()->with('success', 'Sertifikasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(sertifikasi $sertifikasi)
    {
        return view('pencariKerja.sertifikasi.show', compact('sertifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(sertifikasi $sertifikasi)
    {
        return view('pencariKerja.sertifikasi.edit', compact('sertifikasi'));
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
        $request->validate([
            'nama' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tgl_diterbitkan' => 'required|date',
            'tgl_kadaluwarsa' => 'required|date',
            'kredensial_id' => 'required|max:255',
            'kredensial_url' => 'required|max:255',
            'pencari_kerja_id' => 'required'
        ]);

        $sertifikasi->fill($request->post())->save();
        
        return redirect()->route('sertifikasi.index')->with('success', 'Sertifikasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(sertifikasi $sertifikasi)
    {
        $sertifikasi->delete();
        return redirect()->route('sertifikasi.index')->with('error', 'Sertifikasi berhasil dihapus!');
    }
}
