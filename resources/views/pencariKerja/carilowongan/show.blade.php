@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Lowongan')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Lowongan'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent" style="margin-left: 15px">
                        <h6 class="text-capitalize" >Informasi Lowongan</h6>
                        <p>Berikut informasi dasar mengenai lowongan pekerjaan untuk Anda.</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                Lamar Sekarang
                        </button>
                    </div>
                    <div class="card-body p-3 mt-n3">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <div class="border border-light rounded-3 p-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama" class="form-control-label">Judul Pekerjaan</label>
                                                <input class="form-control" type="text" name="judul_pekerjaan" value="{{ $lowongan->judul_pekerjaan }}" readonly>
                                                @error('judul_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="deskripsi_pekerjaan" class="form-control-label">Deskripsi Pekerjaan</label>
                                                <textarea class="ckeditor form-control" type="text" name="deskripsi_pekerjaan" readonly>{{ $lowongan->deskripsi_pekerjaan }}</textarea>
                                                @error('deskripsi_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="jenis_pekerjaan" class="form-control-label">Jenis Pekerjaan</label>
                                                <input class="form-control" type="text" name="jenis_pekerjaan" value="{{ $lowongan->jenis_pekerjaan }}" readonly>
                                                @error('jenis_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="lokasi" class="form-control-label">Lokasi Pekerjaan</label>
                                                <input class="form-control" type="text" name="lokasi_pekerjaan" value="{{ $lowongan->lokasi_pekerjaan }}" readonly>
                                                @error('lokasi_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="rentang_gaji_minimal" class="form-control-label">Rentang Gaji Minimal (Rupiah)</label>
                                                <input class="form-control" type="number" name="rentang_gaji_minimal" value="{{ $lowongan->rentang_gaji_minimal }}" readonly>
                                                @error('rentang_gaji_minimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <label for="rentang_gaji_minimal" class="form-control-label">Rentang Gaji Maksimal (Rupiah)</label>
                                            <input class="form-control" type="number" name="rentang_gaji_maksimal" value="{{ $lowongan->rentang_gaji_maksimal }}" readonly>
                                            @error('rentang_gaji_maksimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                            </div>
                                            <div class="form-group" style="margin-top:-15px;">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="jenis_kelamin[]" type="checkbox" id="inlineCheckbox1" value="Laki-laki"
                                                    {{ in_array('Laki-laki', json_decode($lowongan->jenis_kelamin)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="jenis_kelamin[]" type="checkbox" id="inlineCheckbox2" value="Perempuan"
                                                    {{ in_array('Perempuan', json_decode($lowongan->jenis_kelamin)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                                </div>
                                                @error('jenis_kelamin') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <hr class="horizontal dark">
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Tanggal Tayang</label>
                                                <input class="form-control" type="date" name="tanggal_tayang" value="{{ $lowongan->tanggal_tayang }}" readonly>
                                                @error('tanggal_tayang') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Tanggal Kadaluwarsa</label>
                                                <input class="form-control" type="date" name="tanggal_kadaluwarsa" value="{{ $lowongan->tanggal_kadaluwarsa }}" readonly>
                                                @error('tanggal_kadaluwarsa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kuota" class="form-control-label">Kuota</label>
                                                <input class="form-control" type="number" name="kuota" value="{{ $lowongan->kuota }}" readonly>
                                                @error('kuota') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header pb-0 bg-transparent" style="margin-left: 15px">
                        <h6 class="text-capitalize mt-n3">Persyaratan Umum</h6>
                        <p>Berikut persyaratan umum untuk dasar penyaringan lamaran.</p>
                    </div>
                    <div class="card-body p-3 mt-n4">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <div class="border border-light rounded-3 p-3">
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="minimal_pendidikan" class="form-control-label">Minimal Pendidikan</label>
                                                <input class="form-control" type="text" name="minimal_pendidikan" value="{{ $lowongan->kriteria->minimal_pendidikan }}" readonly>
                                                @error('minimal_pendidikan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="tahun_pengalaman" class="form-control-label">Tahun Pengalaman</label>
                                                <input class="form-control" type="text" name="tahun_pengalaman" value="{{ $lowongan->kriteria->tahun_pengalaman }}" readonly>
                                                @error('tahun_pengalaman') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jurusan_pendidikan_terakhir" class="form-control-label">Jurusan Pendidikan Terakhir</label>
                                                <input class="form-control" type="text" name="jurusan_pendidikan_terakhir" value="{{ $lowongan->kriteria->jurusan_pendidikan_terakhir }}" readonly>
                                                @error('jurusan_pendidikan_terakhir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="status_pernikahan" class="form-control-label">Status Pernikahan</label>
                                            </div>
                                            <div class="form-group mt-n3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="status_pernikahan[]" type="checkbox" id="inlineCheckboxSP1" value=""
                                                    {{ in_array('Single / Belum Menikah', json_decode($lowongan->kriteria->status_pernikahan)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckboxSP1">Single / Belum Menikah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="status_pernikahan[]" type="checkbox" id="inlineCheckboxSP2" value=""
                                                    {{ in_array('Sudah Menikah', json_decode($lowongan->kriteria->status_pernikahan)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckboxSP2">Sudah Menikah</label>
                                                </div>
                                                @error('status_pernikahan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="rentang_usia_minimal" class="form-control-label">Rentang Usia Minimal (Tahun)</label>
                                                <input class="form-control" type="number" name="rentang_usia_minimal" value="{{ $lowongan->kriteria->rentang_usia_minimal }}" readonly>
                                                @error('rentang_usia_minimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="rentang_usia_maksimal" class="form-control-label">Rentang Usia Maksimal (Tahun)</label>
                                                <input class="form-control" type="number" name="rentang_usia_maksimal" value="{{ $lowongan->kriteria->rentang_usia_maksimal }}" readonly>
                                                @error('rentang_usia_maksimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bahasa" class="form-control-label">Bahasa</label>
                                            </div>
                                            <div class="form-group mt-n3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox1" value=""
                                                    {{ in_array('Bahasa Indonesia', json_decode($lowongan->kriteria->bahasa)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox1">Bahasa Indonesia</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox2" value=""
                                                    {{ in_array('Inggris', json_decode($lowongan->kriteria->bahasa)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox2">Inggris</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox3" value=""
                                                    {{ in_array('Mandarin', json_decode($lowongan->kriteria->bahasa)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox3">Mandarin</label>
                                                </div>
                                                @error('bahasa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                        <hr class="horizontal dark mt-3">
                                            <h6 class="text-capitalize mt-3">Persyaratan Khusus</h6>
                                            <p>Masukkan persyaratan khusus dan requirement yang kamu butuhkan, kemudian pilih prioritasnya.</p>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="keterampilan_teknis" class="form-control-label">Keterampilan Teknis / Hard Skill </label>
                                                <div class="table-responsive">  
                                                    <table class="table table-bordered" id="dynamic_field_keterampilan_teknis">  
                                                        <tr>  
                                                            <td><input type="text" name="keterampilan_teknis[]" placeholder="Contoh: Python" class="form-control" required/></td>   
                                                            <td><select class="form-control" name="prioritas_keterampilan_teknis[]" required>
                                                                <option value="" hidden>Pilih Prioritas</option>
                                                                <option value="4" @if(old('prioritas_keterampilan_teknis') == '4')selected @endif>Sangat Penting</option>
                                                                <option value="3" @if(old('prioritas_keterampilan_teknis') == '3')selected @endif>Penting</option>
                                                                <option value="2" @if(old('prioritas_keterampilan_teknis') == '2')selected @endif>Regular</option>
                                                                <option value="1" @if(old('prioritas_keterampilan_teknis') == '1')selected @endif>Menambah Value</option>
                                                            </select></td>
                                                            <td><button type="button" name="add_keterampilan_teknis" id="add_keterampilan_teknis" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>  
                                                        </tr>  
                                                    </table>  
                                                </div>
                                                @error('keterampilan_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                @error('prioritas_keterampilan_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="keterampilan_non_teknis" class="form-control-label">Keterampilan Non Teknis / Soft Skill </label>
                                                <div class="table-responsive">  
                                                    <table class="table table-bordered" id="dynamic_field_keterampilan_non_teknis">  
                                                        <tr>  
                                                            <td><input type="text" name="keterampilan_non_teknis[]" placeholder="Contoh: Kreatif" class="form-control" required/></td>   
                                                            <td><select class="form-control" name="prioritas_keterampilan_non_teknis[]" required>
                                                                <option value="" hidden>Pilih Prioritas</option>
                                                                <option value="4" @if(old('prioritas_keterampilan_non_teknis') == '4')selected @endif>Sangat Penting</option>
                                                                <option value="3" @if(old('prioritas_keterampilan_non_teknis') == '3')selected @endif>Penting</option>
                                                                <option value="2" @if(old('prioritas_keterampilan_non_teknis') == '2')selected @endif>Regular</option>
                                                                <option value="1" @if(old('prioritas_keterampilan_non_teknis') == '1')selected @endif>Menambah Value</option>
                                                            </select></td>
                                                            <td><button type="button" name="add_keterampilan_non_teknis" id="add_keterampilan_non_teknis" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>  
                                                        </tr>  
                                                    </table>  
                                                </div>
                                                @error('keterampilan_non_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                @error('prioritas_keterampilan_non_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sertifikasi" class="form-control-label">Sertifikasi</label>
                                                <div class="table-responsive">  
                                                    <table class="table table-bordered" id="dynamic_field_sertifikasi">  
                                                        <tr>  
                                                            <td><input type="text" name="sertifikasi[]" placeholder="Contoh: CCNA" class="form-control" /></td>   
                                                            <td><select class="form-control" name="prioritas_sertifikasi[]">
                                                                <option value="" hidden>Pilih Prioritas</option>
                                                                <option value="4" @if(old('prioritas_sertifikasi') == '4')selected @endif>Sangat Penting</option>
                                                                <option value="3" @if(old('prioritas_sertifikasi') == '3')selected @endif>Penting</option>
                                                                <option value="2" @if(old('prioritas_sertifikasi') == '2')selected @endif>Regular</option>
                                                                <option value="1" @if(old('prioritas_sertifikasi') == '1')selected @endif>Menambah Value</option>
                                                            </select></td>
                                                            <td><button type="button" name="add_sertifikasi" id="add_sertifikasi" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>  
                                                        </tr>  
                                                    </table>  
                                                </div>
                                                @error('sertifikasi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                @error('prioritas_sertifikasi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>

@endsection

@section('bottom-content')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection