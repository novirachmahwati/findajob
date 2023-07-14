<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pencariKerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class DaftarRiwayatHidupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pencariKerja.daftarRiwayatHidup.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $pencariKerja = pencariKerja::where('id', $id)->first();
        $cv = $pencariKerja->cv_public_storage;
        return response()->file(public_path($cv),['content-type'=>'application/pdf']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pencariKerja.daftarRiwayatHidup.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            return back()->withErrors($validator);
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
        $pencariKerja = pencariKerja::where('id', $id)->first();
        $pencariKerja->fill($requestData);
        $pencariKerja->save();

        // Hit API 
        Http::post('http://47.254.207.10:5000/ekstrak_cv/'. Auth::user()->pencariKerja->id);

        return redirect()->route('daftar-riwayat-hidup.index')->with('success', 'Daftar riwayat hidup berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
