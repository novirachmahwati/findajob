@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Unggah Lowongan Pekerjaan')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Unggah Lowongan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12">
                <p class="text-white" style="position: relative !important">Ikuti langkah-langkah berikut untuk mempublish lowongan.</p>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <h5 class="text-white" style="line-height: 2.2">1</h5>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px;">
                                        Informasi Lowongan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <h5 class="text-white" style="line-height: 2.2">
                                        2
                                    </h5>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px">
                                        Persyaratan Umum & Khusus
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <h5 class="text-white" style="line-height: 2.2">
                                        3
                                    </h5>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px">
                                        Pembobotan Persyaratan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card" style="opacity: 0.5; background-color: #DED3D3">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <h5 class="text-white" style="line-height: 2.2">
                                        4
                                    </h5>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px;">
                                        Syarat & Ketentuan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize" style="margin-left: 15px">Pembobotan Persyaratan</h6>
                        <p class="text-justify" style="margin-left: 15px">Masukkan pembobotan persyaratan berdasarkan kelompok variabel Faktor Utama (Core Factor) dan Faktor Pendukung (Secondary Factor). 
                            Jumlah pembobotan tiap faktor kelompok apabila dijumlahkan harus sama dengan = 1, tidak boleh lebih atau kurang dari 1. 
                            Klik tombol "Selanjutnya" apabila pembobotan sudah sesuai dengan kriteria Anda.
                            Klik <a href="#" class="text-success" data-bs-toggle="modal" data-bs-target="#pembobotanModal"><b><u>disini</u></b></a> Untuk penjelasan lebih lengkap. 
                        </p>
                    </div>
                    <div class="card-body p-3" style="margin-top: -30px">
                        <div class="row">
                            <div class="col">
                                <form role="form" method="POST" action={{ route('pembobotan-persyaratan.store') }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            @include('layouts.flash-message')
                                            {{-- <input type="hidden" name="lowongan_id" value="{{ $lowongan_id }}"> --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="faktor_utama" class="form-control-label">Faktor Utama / Core Factor <span class="titik-logo">*</span></label>
                                                    <div class="table-responsive">  
                                                        <table class="table" id="dynamic_field_faktor_utama">  
                                                            <tr>  
                                                                <td>
                                                                    <select class="form-control" name="faktor_utama[]" required>
                                                                        <option value="minimal_pendidikan" selected>Minimal Pendidikan</option>
                                                                        <option value="pengalaman" >Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan">Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal">Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option>
                                                                        <option value="bahasa">Bahasa</option>
                                                                        <option value="keterampilan_teknis">Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi">Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_utama[]" value="0.2" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="add_faktor_utama" id="add_faktor_utama" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>  
                                                            </tr>
                                                            <tr id="2" class="dynamic-added">
                                                                <td>
                                                                    <select class="form-control" name="faktor_utama[]" required>
                                                                        <option value="minimal_pendidikan">Minimal Pendidikan</option>
                                                                        <option value="pengalaman" selected>Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan">Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal">Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option>
                                                                        <option value="bahasa">Bahasa</option>
                                                                        <option value="keterampilan_teknis">Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi">Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_utama[]" value="0.2" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="remove" id="2" class="btn btn-danger btn_remove">X</button></td>
                                                            </tr>
                                                            <tr id="3" class="dynamic-added">
                                                                <td>
                                                                    <select class="form-control" name="faktor_utama[]" required>
                                                                        <option value="minimal_pendidikan">Minimal Pendidikan</option>
                                                                        <option value="pengalaman">Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir" selected>Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan">Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal">Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option>
                                                                        <option value="bahasa">Bahasa</option>
                                                                        <option value="keterampilan_teknis">Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi">Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_utama[]" value="0.1" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="remove" id="3" class="btn btn-danger btn_remove">X</button></td>
                                                            </tr>
                                                            <tr id="4" class="dynamic-added">
                                                                <td>
                                                                    <select class="form-control" name="faktor_utama[]" required>
                                                                        <option value="minimal_pendidikan">Minimal Pendidikan</option>
                                                                        <option value="pengalaman">Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan">Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal">Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option>
                                                                        <option value="bahasa">Bahasa</option>
                                                                        <option value="keterampilan_teknis" selected>Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi">Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_utama[]" value="0.3" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="remove" id="4" class="btn btn-danger btn_remove">X</button></td>
                                                            </tr>
                                                            <tr id="5" class="dynamic-added">
                                                                <td>
                                                                    <select class="form-control" name="faktor_utama[]" required>
                                                                        <option value="minimal_pendidikan">Minimal Pendidikan</option>
                                                                        <option value="pengalaman" selected>Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan">Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal">Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option>
                                                                        <option value="bahasa">Bahasa</option>
                                                                        <option value="keterampilan_teknis">Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis" selected>Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi">Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_utama[]" value="0.2" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="remove" id="5" class="btn btn-danger btn_remove">X</button></td>
                                                            </tr>  
                                                        </table>  
                                                    </div>
                                                    @error('faktor_utama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    @error('bobot_faktor_utama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="faktor_pendukung" class="form-control-label">Faktor Pendukung / Secondary Factor <span class="titik-logo">*</span></label>
                                                    <div class="table-responsive">  
                                                        <table class="table" id="dynamic_field_faktor_pendukung">  
                                                            <tr>  
                                                                <td>
                                                                    <select class="form-control" name="faktor_pendukung[]" required>
                                                                        <option value="minimal_pendidikan">Minimal Pendidikan</option>
                                                                        <option value="pengalaman" >Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan" selected>Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal">Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option>
                                                                        <option value="bahasa">Bahasa</option>
                                                                        <option value="keterampilan_teknis">Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi">Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_pendukung[]" value="0.1" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="add_faktor_pendukung" id="add_faktor_pendukung" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>  
                                                            </tr>
                                                            <tr id="7" class="dynamic-added">
                                                                <td>
                                                                    <select class="form-control" name="faktor_pendukung[]" required>
                                                                        <option value="minimal_pendidikan">Minimal Pendidikan</option>
                                                                        <option value="pengalaman">Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan">Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal" selected>Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option>
                                                                        <option value="bahasa">Bahasa</option>
                                                                        <option value="keterampilan_teknis">Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi">Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_pendukung[]" value="0.15" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="remove" id="7" class="btn btn-danger btn_remove">X</button></td>
                                                            </tr>
                                                            <tr id="8" class="dynamic-added">
                                                                <td>
                                                                    <select class="form-control" name="faktor_pendukung[]" required>
                                                                        <option value="minimal_pendidikan">Minimal Pendidikan</option>
                                                                        <option value="pengalaman">Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan">Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal">Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal" selected>Rentang Usia Maksimal</option>
                                                                        <option value="bahasa">Bahasa</option>
                                                                        <option value="keterampilan_teknis">Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi">Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_pendukung[]" value="0.15" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="remove" id="8" class="btn btn-danger btn_remove">X</button></td>
                                                            </tr>
                                                            <tr id="9" class="dynamic-added">
                                                                <td>
                                                                    <select class="form-control" name="faktor_pendukung[]" required>
                                                                        <option value="minimal_pendidikan">Minimal Pendidikan</option>
                                                                        <option value="pengalaman">Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan">Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal">Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option>
                                                                        <option value="bahasa" selected>Bahasa</option>
                                                                        <option value="keterampilan_teknis">Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi">Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_pendukung[]" value="0.25" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="remove" id="9" class="btn btn-danger btn_remove">X</button></td>
                                                            </tr>
                                                            <tr id="10" class="dynamic-added">
                                                                <td>
                                                                    <select class="form-control" name="faktor_pendukung[]" required>
                                                                        <option value="minimal_pendidikan">Minimal Pendidikan</option>
                                                                        <option value="pengalaman" selected>Pengalaman</option>
                                                                        <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option>
                                                                        <option value="status_pernikahan">Status Pernikahan</option>
                                                                        <option value="rentang_usia_minimal">Rentang Usia Minimal</option>
                                                                        <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option>
                                                                        <option value="bahasa">Bahasa</option>
                                                                        <option value="keterampilan_teknis">Keterampilan Teknis</option>
                                                                        <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option>
                                                                        <option value="sertifikasi" selected>Sertifikasi</option>
                                                                    </select>
                                                                <td>
                                                                    <input type="number" name="bobot_faktor_pendukung[]" value="0.35" min="0" max="1" step="any" class="form-control" required/></td> 
                                                                </td>
                                                                <td><button type="button" name="remove" id="10" class="btn btn-danger btn_remove">X</button></td>
                                                            </tr>  
                                                        </table>  
                                                    </div>
                                                    @error('faktor_pendukung') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    @error('bobot_faktor_pendukung') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="card-footer pb-0">
                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-primary btn-lg ms-auto" style="margin-right: -22px">Selanjutnya 
                                                <i class="fa fa-forward" style="font-size: 15px; margin-left: 5px"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pembobotanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembobotan Persyaratan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <p class="text-justify">
                        Pembobotan persyaratan merupakan salah satu tahap yang wajib diisi oleh penyedia kerja sebelum mengunggah lowongan pekerjaan. 
                        Tahap ini digunakan untuk membantu kami melakukan proses perhitungan pencocokan profil pelamar.
                        Kemudian memberikan alternatif pemecahan masalah dengan mengimplementasikan sistem pendukung keputusan
                        metode profile matching dalam memilih pelamar terbaik, dan memudahkan pihak penyedia kerja mendapat pelamar terbaik untuk lowongan pekerjaan yang diunggah. 
                        <br><br>
                        Penyedia kerja memberikan bobot persyaratan berdasarkan 2 kelompok yaitu: 
                        <ol type="1">
                            <li class="text-justify">Faktor Utama (Core Factor), yaitu merupakan kriteria (kompetensi) yang paling penting atau menonjol atau paling dibutuhkan oleh suatu penilaian yang diharapkan dapat memperoleh hasil yang optimal.</li>
                            <li class="text-justify">Faktor Pendukung (Secondary Factor), yaitu merupakan item-item selain yang ada pada core factor.
                                Atau  dengan kata lain merupakan faktor pendukung yang kurang dibutuhkan oleh suatu penilaian.</li>
                        </ol>
                        <p class="text-justify">
                            Jumlah pembobotan tiap faktor kelompok apabila dijumlahkan harus sama dengan = 1, tidak boleh lebih atau kurang dari 1.
                            Hasil akhir dari tahap ini, penyedia kerja akan mendapatkan ranking pelamar terbaik untuk lowongan pekerjaan yang diunggah.
                        </p>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </div>
        </div>
        </div>
    </div>
@endsection

@section('bottom-content')
    <script type="text/javascript">
        $(document).ready(function(){      
            var i=15;  

            $('#add_faktor_utama').click(function(){  
                i++;  
                $('#dynamic_field_faktor_utama').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" name="faktor_utama[]" required> \
                                                                            <option value="minimal_pendidikan" selected>Minimal Pendidikan</option> \
                                                                            <option value="pengalaman" >Pengalaman</option> \
                                                                            <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option> \
                                                                            <option value="status_pernikahan">Status Pernikahan</option> \
                                                                            <option value="rentang_usia_minimal">Rentang Usia Minimal</option> \
                                                                            <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option> \
                                                                            <option value="bahasa">Bahasa</option> \
                                                                            <option value="keterampilan_teknis">Keterampilan Teknis</option> \
                                                                            <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option> \
                                                                            <option value="sertifikasi">Sertifikasi</option> \
                                                                        </select></td> \
                                                                    <td> <input type="number" name="bobot_faktor_utama[]" value="0.2" min="0" max="1" step="any" class="form-control" required/></td> \
                                                                    <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
            });
            
            $('#add_faktor_pendukung').click(function(){  
                i++;  
                $('#dynamic_field_faktor_pendukung').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" name="faktor_pendukung[]" required> \
                                                                            <option value="minimal_pendidikan" selected>Minimal Pendidikan</option> \
                                                                            <option value="pengalaman" >Pengalaman</option> \
                                                                            <option value="jurusan_pendidikan_terakhir">Jurusan Pendidikan Terakhir</option> \
                                                                            <option value="status_pernikahan">Status Pernikahan</option> \
                                                                            <option value="rentang_usia_minimal">Rentang Usia Minimal</option> \
                                                                            <option value="rentang_usia_maksimal">Rentang Usia Maksimal</option> \
                                                                            <option value="bahasa">Bahasa</option> \
                                                                            <option value="keterampilan_teknis">Keterampilan Teknis</option> \
                                                                            <option value="keterampilan_non_teknis">Keterampilan Non Teknis</option> \
                                                                            <option value="sertifikasi">Sertifikasi</option> \
                                                                        </select></td> \
                                                                    <td> <input type="number" name="bobot_faktor_pendukung[]" value="0.2" min="0" max="1" step="any" class="form-control" required/></td> \
                                                                    <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
            });
        });

        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");  
            $('#row'+button_id+'').remove();
            $(this).closest('tr').remove();  
        });  
    </script>
@endsection