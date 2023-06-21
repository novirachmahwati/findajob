<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pencariKerja;
use App\Models\sertifikasi;
use App\Models\riwayatLamaran;
use App\Models\penyediaKerja;
use App\Models\lowongan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->role == 'Pencari Kerja') {
            $jml_lamaranTerkirim = riwayatLamaran::where('pencari_kerja_id', Auth::user()->pencariKerja->id)->count();
            $jml_sertifikasi = sertifikasi::where('pencari_kerja_id', Auth::user()->pencariKerja->id)->count();
            return view('pages.dashboard')
                        ->with('jml_lamaranTerkirim', $jml_lamaranTerkirim)
                        ->with('jml_sertifikasi', $jml_sertifikasi);
        } else {
            $jml_lowongan = lowongan::where('penyedia_kerja_id', Auth::user()->penyediaKerja->id)->count();
            $jml_lowongan_aktif = lowongan::where('penyedia_kerja_id', Auth::user()->penyediaKerja->id)
                                                ->where('status', 'Aktif')->count();
            $jml_lowongan_tdk_aktif = lowongan::where('penyedia_kerja_id', Auth::user()->penyediaKerja->id)
                                                ->where('status', 'Tidak Aktif')->count();
            // $jml_pelamar = riwayatLamaran::where('penyedia_kerja_id', Auth::user()->penyediaKerja->id)->count();
            $jml_pelamar = 0;
            return view('pages.dashboard')
                        ->with('jml_lowongan', $jml_lowongan)
                        ->with('jml_lowongan_aktif', $jml_lowongan_aktif)
                        ->with('jml_lowongan_tdk_aktif', $jml_lowongan_tdk_aktif)
                        ->with('jml_pelamar', $jml_pelamar);
        }
    }
}