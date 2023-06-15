<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profil', [ProfileController::class, 'edit'])->name('profil.edit');
//     Route::patch('/profil', [ProfileController::class, 'update'])->name('profil.update');
//     Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profil.destroy');
// });

require __DIR__.'/auth.php';

Auth::routes();

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PencariKerjaController;
use App\Http\Controllers\PenyediaKerjaController;
use App\Http\Controllers\RiwayatLamaranController;
use App\Http\Controllers\SertifikasiController;
use App\Http\Controllers\LowonganKerjaController;      
            

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/registrasi-pencari-kerja', [RegisterController::class, 'create'])->middleware('guest')->name('registrasi');
	Route::post('/registrasi-pencari-kerja', [RegisterController::class, 'store'])->middleware('guest')->name('registrasi.perform');
	Route::get('/registrasi-penyedia-kerja', [RegisterController::class, 'createPenyediaKerja'])->middleware('guest')->name('registrasi.penyediaKerja');
	Route::post('/registrasi-penyedia-kerja', [RegisterController::class, 'storePenyediaKerja'])->middleware('guest')->name('registrasi.penyediaKerja.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
	
Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	// Pencari Kerja
	Route::prefix('pencari-kerja')->group(function () {
		Route::get('/dashboard', [PencariKerjaController::class, 'dashboard'])->name('pencari_kerja.dashboard');
		Route::get('/profil', [PencariKerjaController::class, 'profil'])->name('pencari_kerja.profil');
		Route::get('/lengkapi-biodata', [PencariKerjaController::class, 'LB_create'])->name('LB.create');
		Route::post('/lengkapi-biodata', [PencariKerjaController::class, 'LB_store'])->name('LB.store');

		Route::get('/unggah-foto', [PencariKerjaController::class, 'UF_create'])->name('UF.create');
		Route::post('/unggah-foto', [PencariKerjaController::class, 'UF_store'])->name('UF.store');

		Route::get('/sertifikasi', [PencariKerjaController::class, 'SE_create'])->name('SE.create');
		Route::post('/sertifikasi', [PencariKerjaController::class, 'SE_store'])->name('SE.store');

		Route::get('/unggah-daftar-riwayat-hidup', [PencariKerjaController::class, 'UC_create'])->name('UC.create');
		Route::post('/unggah-daftar-riwayat-hidup', [PencariKerjaController::class, 'UC_store'])->name('UC.store');
		Route::get('/download-cv', [PencariKerjaController::class, 'UC_download'])->name('UC.download');
		Route::post('/unggah-daftar-riwayat-hidup', [PencariKerjaController::class, 'UC_store'])->name('UC.store');

		Route::get('/{pencari_kerja_id}', [PencariKerjaController::class, 'show'])->name('pencari_kerja.show');
		// Route::get('/{pencari_kerja_id}', [PencariKerjaController::class, 'update'])->name('pencari_kerja.edit');
		Route::post('/edit', [PencariKerjaController::class, 'update'])->name('pencari_kerja.edit');
	});

	// Penyedia Kerja
	Route::prefix('penyedia-kerja')->group(function () {
		Route::get('/dashboard', [PenyediaKerjaController::class, 'dashboard'])->name('penyedia_kerja.dashboard');
		Route::get('/profil', [PenyediaKerjaController::class, 'profil'])->name('penyedia_kerja.profil');
		Route::get('/lengkapi-data', [PenyediaKerjaController::class, 'LD_create'])->name('LD.create');
		Route::post('/lengkapi-data', [PenyediaKerjaController::class, 'LD_store'])->name('LD.store');

		Route::get('/data-perusahaan', [PenyediaKerjaController::class, 'DP_create'])->name('DP.create');
		Route::post('/data-perusahaan', [PenyediaKerjaController::class, 'DP_store'])->name('DP.store');

		Route::get('/unggah-foto', [PenyediaKerjaController::class, 'UFP_create'])->name('UFP.create');
		Route::post('/unggah-foto', [PenyediaKerjaController::class, 'UFP_store'])->name('UFP.store');

		Route::get('/unggah-lowongan', [PenyediaKerjaController::class, 'UL_create'])->name('UL.create');
		Route::post('/unggah-lowongan', [PenyediaKerjaController::class, 'UL_store'])->name('UL.store');

		Route::get('/unggah-lowongan-pekerjaan', [PenyediaKerjaController::class, 'ULP_create'])->name('ULP.create');
		Route::post('/unggah-lowongan-pekerjaan', [PenyediaKerjaController::class, 'ULP_store'])->name('ULP.store');
		Route::get('/persyaratan-umum-khusus', [PenyediaKerjaController::class, 'PUK_create'])->name('PUK.create');
		Route::post('/persyaratan-umum-khusus', [PenyediaKerjaController::class, 'PUK_store'])->name('PUK.store');

		Route::get('/kontak-lowongan', [PenyediaKerjaController::class, 'KL_create'])->name('KL.create');
		Route::post('/kontak-lowongan', [PenyediaKerjaController::class, 'KL_store'])->name('KL.store');

		Route::get('/syarat-dan-ketentuan', [PenyediaKerjaController::class, 'SDK_create'])->name('SDK.create');
		Route::post('/syarat-dan-ketentuan', [PenyediaKerjaController::class, 'SDK_store'])->name('SDK.store');

		Route::get('/dashboard', [PenyediaKerjaController::class, 'index'])->name('penyedia-kerja.dashboard');
		
		Route::get('/{penyedia_kerja_id}', [PenyediaKerjaController::class, 'show'])->name('penyedia_kerja.show');
		Route::post('/edit', [PenyediaKerjaController::class, 'update'])->name('penyedia_kerja.edit');
	});

	// Route::get('/sertifikasi', [SertifikasiController::class, 'index'])->name('sertifikasi.index');
	// Route::post('/sertifikasi', [SertifikasiController::class, 'store'])->name('sertifikasi.store');
	// Route::get('/sertifikasi/{id}', [SertifikasiController::class, 'show'])->name('sertifikasi.show');
	// Route::get('/sertifikasi/{id}/edit', [SertifikasiController::class, 'edit'])->name('sertifikasi.edit');
	// Route::put('/sertifikasi/{id}', [SertifikasiController::class, 'update'])->name('sertifikasi.update');
	// Route::delete('/sertifikasi/{id}', [SertifikasiController::class, 'delete'])->name('sertifikasi.delete');


	// Route::resource('/sertifikasi', [SertifikasiController::class, 'index']);
	Route::resources([
		'sertifikasi' => SertifikasiController::class,
		'lowongan' => LowonganKerjaController::class,
		'info-penyedia-kerja' => SertifikasiController::class,
		'riwayat-lamaran' => LowonganKerjaController::class,
		'daftar-riwayat-hidup' => LowonganKerjaController::class,
	]);
	
	
});