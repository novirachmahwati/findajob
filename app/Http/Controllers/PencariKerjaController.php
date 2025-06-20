<?php

namespace App\Http\Controllers;

use App\Models\pencariKerja;
use App\Models\sertifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DataTables;

class PencariKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pencariKerja = pencariKerja::leftJoin('users','users.id','=','pencari_kerjas.user_id')
                                ->select('pencari_kerjas.id','users.name','users.email','pencari_kerjas.usia')
                                ->orderBy('pencari_kerjas.id','desc')
                                ->get();
            return Datatables::of($pencariKerja)->addIndexColumn()
                ->addColumn('action', function($pencariKerja){
                    $btn = '<div class="dropdown dropstart text-end">          
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="'.route('pencari-kerja.show', $pencariKerja->id).'">
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

        return view('penyediaKerja.infoPencariKerja.index');
    }
    
    // Lengkapi Biodata
    public function LB_create()
    {
        return view('pencariKerja.pendaftaran.lengkapi-biodata');
    }

    public function LB_store()
    {
        $attributes = request()->validate([
            'alamat' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|date|before:tomorrow',
            'jenis_kelamin' => 'required|max:255',
            'no_telp' => 'required|max:15',
            'agama' => 'required|max:20',
            'pendidikan' => 'required|max:255',
            'jurusan' => 'required|max:255',
            'user_id' => 'required'
        ]);
        
        $attributes['usia'] = Carbon::parse($attributes['tgl_lahir'])->age;
        if ($attributes['usia'] < 15) {
            return back()->withErrors(['tgl_lahir' => 'Usia minimum untuk diperbolehkan bekerja adalah 15 (lima belas) tahun'])
            ->withInput();
        }
        pencariKerja::create($attributes);
        
        return redirect('/unggah-foto');
    }

    // Unggah Foto
    public function UF_create()
    {
        return view('pencariKerja.pendaftaran.unggah-foto');
    }

    public function UF_store(Request $request)
    {
        $attributes = request()->validate([
            'foto' => 'required'
        ]);
        $fileName = time().$request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('images', $fileName, 'public');
        $attributes['foto'] = '/storage/'.$path;
        
        $pencariKerja = pencariKerja::where('id', Auth::user()->pencariKerja->id)->first();
        $pencariKerja->fill($attributes);
        $pencariKerja->save();
        
        return redirect('/sertifikasi-pencari-kerja');
        
    }

    // Sertifikasi
    public function SE_create()
    {
        return view('pencariKerja.pendaftaran.sertifikasi');
    }

    public function SE_store(Request $request)
    {
        if ($request->filled('nama')) {
            $attributes = request()->validate([
                'nama' => 'required|max:255',
                'penerbit' => 'required|max:255',
                'tgl_diterbitkan' => 'required|date',
                'tgl_kadaluwarsa' => 'required|date',
                'file' => 'required|max:255',
                'pencari_kerja_id' => 'required'
            ]);

            // Save to public storage
            $fileName = time().$request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('sertifikasi', $fileName, 'public');
            $attributes['file'] = '/storage/'.$path;
            
            sertifikasi::create($attributes);
        }
        
        return redirect('/unggah-daftar-riwayat-hidup-pencari-kerja');
        
    }

    // Unggah Daftar Riwayat Hidup
    public function UC_create()
    {
        return view('pencariKerja.pendaftaran.unggah-daftar-riwayat-hidup');
    }

    public function UC_store(Request $request)
    {
        // Validasi CV
        $rules = [
            'cv' => 'required'
        ];

        $messages = [
            'cv.required' => 'Daftar riwayat hidup wajib diisi.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/unggah-daftar-riwayat-hidup-pencari-kerja')
                        ->withErrors($validator)
                        ->withInput();
        }

        $requestData = $request->all();
        
        // Encode CV to base64
        $cvBase64 = base64_encode(file_get_contents($request->file('cv')));
        $requestData['cv'] = $cvBase64 ;

        // Save to public storage
        $fileName = time().$request->file('cv')->getClientOriginalName();
        $path = $request->file('cv')->storeAs('cv', $fileName, 'public');
        $requestData['cv_public_storage'] = '/storage/'.$path;

        // Save to database
        $pencariKerja = pencariKerja::where('id', Auth::user()->pencariKerja->id)->first();
        $pencariKerja->fill($requestData);
        $pencariKerja->save();

        // Hit API 
        Http::post('http://47.254.207.10:5000/ekstrak_cv/'. Auth::user()->pencariKerja->id);

        return redirect('/dashboard');
          
    }
    
    public function UC_download()
    {
        return Storage::disk('public')->download('formatCV/Format Daftar Riwayat Hidup.docx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pencariKerja  $pencariKerja
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, pencariKerja $pencariKerja)
    {
        return view('penyediaKerja.infoPencariKerja.show', compact(['pencariKerja']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pencariKerja  $pencariKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(pencariKerja $pencariKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pencariKerja  $pencariKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(pencariKerja $pencariKerja)
    {
        //
    }
}
