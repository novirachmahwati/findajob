<?php

namespace App\Http\Controllers;

use App\Models\penyediaKerja;
use App\Models\lowongan;
use App\Models\riwayatLamaran;
use App\Models\kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PenyediaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $penyediaKerja = penyediaKerja::leftJoin('users','users.id','=','penyedia_kerjas.user_id')
                                ->select('penyedia_kerjas.id','users.name','penyedia_kerjas.bidang','penyedia_kerjas.alamat')
                                ->orderBy('penyedia_kerjas.id','desc')
                                ->whereNotNull('penyedia_kerjas.bidang')
                                ->get();
            return Datatables::of($penyediaKerja)->addIndexColumn()
                ->addColumn('action', function($penyediaKerja){
                    $btn = '<div class="dropdown dropstart text-end">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="'.route('penyedia-kerja.show', $penyediaKerja->id).'">
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

        return view('pencariKerja.infoPenyediaKerja.index');
    }
    
    // Lengkapi Data
    public function LD_create()
    {
        return view('penyediaKerja.pendaftaran.lengkapi-data');
    }

    public function LD_store()
    {
        $attributes = request()->validate([
            'nama_administrator' => 'required|max:255',
            'no_telp_administrator' => 'required|max:16',
            'user_id' => 'required'
        ]);
        
        penyediaKerja::create($attributes);
        
        return redirect('/data-perusahaan');
    }

    // Data Perusahaan
    public function DP_create()
    {
        return view('penyediaKerja.pendaftaran.data-perusahaan');
    }

    public function DP_store()
    {
        $attributes = request()->validate([
            'bidang' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:16',
            'jml_karyawan' => 'required|max:255',
            'deskripsi' => 'required|max:5000',
            'user_id' => 'required'
        ]);
        
        penyediaKerja::create($attributes);
        
        return redirect('/unggah-foto-perusahaan');
    }

    // Unggah Foto
    public function UFP_create()
    {
        return view('penyediaKerja.pendaftaran.unggah-foto');
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
        
        return redirect('/unggah-lowongan');
        
    }

    // Unggah Lowongan
    public function UL_create()
    {
        return view('penyediaKerja.pendaftaran.unggah-lowongan');
    }

    public function UL_store()
    {
        return redirect('/dashboard');
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
        return view('pencariKerja.infoPenyediaKerja.show', compact(['penyediaKerja']));
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
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'alamat' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|max:255',
            'no_telp' => 'required|max:16',
            'agama' => 'required|max:20'
        ]);

        auth()->user()->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        $pencariKerja = pencariKerja::where('id', Auth::user()->pencariKerja->id)->first();
        $pencariKerja->fill($attributes);
        $pencariKerja->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
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
