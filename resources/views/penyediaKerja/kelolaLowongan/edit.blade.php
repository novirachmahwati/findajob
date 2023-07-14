@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Lowongan')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Lowongan'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                <form role="form_edit" id="myform" method="POST" action="{{ route('lowongan.update', $lowongan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')  
                    <div class="card-header pb-0 pt-4 bg-transparent" style="margin-left: 15px">
                        <h6 class="text-capitalize" >Informasi Lowongan</h6>
                    </div>
                    <div class="card-body p-3 mt-n3">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    @include('layouts.flash-message')
                                    <div class="border border-light rounded-3 p-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama" class="form-control-label">Penyedia Kerja</label>
                                                <input class="form-control" type="text"value="{{ $lowongan->penyediaKerja->user->name }}" readonly>
                                                <div id="passwordHelpBlock" class="form-text">
                                                    Klik <a href="{{ route('penyedia-kerja.show', $lowongan->penyediaKerja->id) }}" class="text-success"><b><u>disini.</u></b></a> Untuk informasi lebih lengkap tentang penyedia kerja.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama" class="form-control-label">Judul Pekerjaan</label>
                                                <input class="form-control" type="text" name="judul_pekerjaan" value="{{ $lowongan->judul_pekerjaan }}">
                                                @error('judul_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="deskripsi_pekerjaan" class="form-control-label">Deskripsi Pekerjaan</label>
                                                <textarea class="ckeditor form-control" type="text" name="deskripsi_pekerjaan">{{ $lowongan->deskripsi_pekerjaan }}</textarea>
                                                @error('deskripsi_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="jenis_pekerjaan" class="form-control-label">Jenis Pekerjaan</label>
                                                <input class="form-control" type="text" name="jenis_pekerjaan" value="{{ $lowongan->jenis_pekerjaan }}">
                                                @error('jenis_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="lokasi_pekerjaan" class="form-control-label">Lokasi Pekerjaan</label>
                                                <input class="form-control" type="text" name="lokasi_pekerjaan" value="{{ $lowongan->lokasi_pekerjaan }}">
                                                @error('lokasi_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="rentang_gaji_minimal" class="form-control-label">Rentang Gaji Minimal (Rupiah)</label>
                                                <input class="form-control" type="number" name="rentang_gaji_minimal" value="{{ $lowongan->rentang_gaji_minimal }}">
                                                @error('rentang_gaji_minimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <label for="rentang_gaji_maksimal" class="form-control-label">Rentang Gaji Maksimal (Rupiah)</label>
                                            <input class="form-control" type="number" name="rentang_gaji_maksimal" value="{{ $lowongan->rentang_gaji_maksimal }}">
                                            @error('rentang_gaji_maksimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                            </div>
                                            <div class="form-group" style="margin-top:-15px;">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="jenis_kelamin[]" type="checkbox" id="inlineCheckbox1" value="Laki-laki"
                                                    {{ in_array('Laki-laki', json_decode($lowongan->jenis_kelamin)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="jenis_kelamin[]" type="checkbox" id="inlineCheckbox2" value="Perempuan"
                                                    {{ in_array('Perempuan', json_decode($lowongan->jenis_kelamin)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                                </div>
                                                @error('jenis_kelamin') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <hr class="horizontal dark">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tanggal_tayang" class="form-control-label">Tanggal Tayang</label>
                                                <input class="form-control" type="date" name="tanggal_tayang" value="{{ $lowongan->tanggal_tayang }}">
                                                @error('tanggal_tayang') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="tanggal_kadaluwarsa" class="form-control-label">Tanggal Kadaluwarsa</label>
                                                <input class="form-control" type="date" name="tanggal_kadaluwarsa" value="{{ $lowongan->tanggal_kadaluwarsa }}">
                                                @error('tanggal_kadaluwarsa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="kuota" class="form-control-label">Kuota (Orang)</label>
                                                <input class="form-control" type="number" name="kuota" value="{{ $lowongan->kuota }}">
                                                @error('kuota') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="status" class="form-control-label">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Aktif" @if($lowongan->status == 'Aktif')selected @endif>Aktif</option>
                                                    <option value="Tidak Aktif" @if($lowongan->status == 'Tidak Aktif')selected @endif>Tidak Aktif</option>
                                                </select>
                                                @error('status') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
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
                                                <select class="form-control" name="minimal_pendidikan">
                                                    <option value="S3" @if($lowongan->kriteria->minimal_pendidikan == 'S3')selected @endif>S3</option>
                                                    <option value="S2" @if($lowongan->kriteria->minimal_pendidikan == 'S2')selected @endif>S2</option>
                                                    <option value="S1 / D4" @if($lowongan->kriteria->minimal_pendidikan == 'S1 / D4')selected @endif>S1 / D4</option>
                                                    <option value="D3" @if($lowongan->kriteria->minimal_pendidikan == 'D3')selected @endif>D3</option>
                                                    <option value="SMA / SMK" @if($lowongan->kriteria->minimal_pendidikan == 'SMA / SMK')selected @endif>SMA / SMK</option>
                                                    <option value="SMP" @if($lowongan->kriteria->minimal_pendidikan == 'SMP')selected @endif>SMP</option>
                                                    <option value="SD" @if($lowongan->kriteria->minimal_pendidikan == 'SD')selected @endif>SD</option>
                                                </select>
                                                @error('minimal_pendidikan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="pengalaman" class="form-control-label">Pengalaman (Tahun)</label>
                                                <select class="form-control" name="pengalaman">
                                                    <option value="Fresh Graduate" @if($lowongan->kriteria->pengalaman == 'Fresh Graduate')selected @endif>Fresh Graduate</option>
                                                    <option value="1 - 2" @if($lowongan->kriteria->pengalaman == '1 - 2')selected @endif>1 - 2</option>
                                                    <option value="3 - 5" @if($lowongan->kriteria->pengalaman == '3 - 5')selected @endif>3 - 5</option>
                                                    <option value="> 5" @if($lowongan->kriteria->pengalaman == '> 5')selected @endif>> 5</option>
                                                </select>
                                                @error('pengalaman') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jurusan_pendidikan_terakhir" class="form-control-label">Jurusan Pendidikan Terakhir</label>
                                                <input class="form-control" type="text" name="jurusan_pendidikan_terakhir" value="{{ $lowongan->kriteria->jurusan_pendidikan_terakhir }}">
                                                @error('jurusan_pendidikan_terakhir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="rentang_usia" class="form-control-label">Rentang Usia (Tahun)</label>
                                                <input class="form-control" type="text" name="rentang_usia" value="{{ $lowongan->kriteria->rentang_usia }}">
                                                @error('rentang_usia') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bahasa" class="form-control-label">Bahasa</label>
                                            </div>
                                            <div class="form-group mt-n3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox1" value="Bahasa Indonesia"
                                                    {{ in_array('Bahasa Indonesia', json_decode($lowongan->kriteria->bahasa)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Bahasa Indonesia</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox2" value="Inggris"
                                                    {{ in_array('Inggris', json_decode($lowongan->kriteria->bahasa)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Inggris</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox3" value="Mandarin"
                                                    {{ in_array('Mandarin', json_decode($lowongan->kriteria->bahasa)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineCheckbox3">Mandarin</label>
                                                </div>
                                                @error('bahasa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header pb-0 pt-4 bg-transparent" style="margin-left: 15px">
                        <h6 class="text-capitalize" >Persyaratan Khusus</h6>
                        <p>Berikut persyaratan khusus dan requirement berdasarkan skala prioritas yang dibutuhkan</p>
                    </div>
                    <div class="card-body p-3 mt-n3">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <div class="border border-light rounded-3 p-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="keterampilan_teknis" class="form-control-label">Keterampilan Teknis / Hard Skill </label>
                                                <div class="table-responsive">  
                                                    <table class="table table-bordered">  
                                                        @foreach (array_combine(json_decode($lowongan->kriteria->keterampilan_teknis), json_decode($lowongan->kriteria->prioritas_keterampilan_teknis))  as $keterampilan_teknis => $prioritas_keterampilan_teknis)
                                                            <tr>  
                                                                <td><input type="text" name="keterampilan_teknis[]" class="form-control" value="{{ $keterampilan_teknis }}"/></td>
                                                                <td><select class="form-control" name="prioritas_keterampilan_teknis[]" required>
                                                                    <option value="4" @if($prioritas_keterampilan_teknis == '4')selected @endif>Sangat Penting</option>
                                                                    <option value="3" @if($prioritas_keterampilan_teknis == '3')selected @endif>Penting</option>
                                                                    <option value="2" @if($prioritas_keterampilan_teknis == '2')selected @endif>Regular</option>
                                                                    <option value="1" @if($prioritas_keterampilan_teknis == '1')selected @endif>Menambah Value</option>
                                                                </select></td>
                                                            </tr> 
                                                        @endforeach
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
                                                    <table class="table table-bordered">  
                                                        @foreach (array_combine(json_decode($lowongan->kriteria->keterampilan_non_teknis), json_decode($lowongan->kriteria->prioritas_keterampilan_non_teknis))  as $keterampilan_non_teknis => $prioritas_keterampilan_non_teknis)
                                                            <tr>  
                                                                <td><input type="text" name="keterampilan_non_teknis[]" class="form-control" value="{{ $keterampilan_non_teknis }}"/></td>
                                                                <td><select class="form-control" name="prioritas_keterampilan_non_teknis[]" required>
                                                                    <option value="4" @if($prioritas_keterampilan_non_teknis == '4')selected @endif>Sangat Penting</option>
                                                                    <option value="3" @if($prioritas_keterampilan_non_teknis == '3')selected @endif>Penting</option>
                                                                    <option value="2" @if($prioritas_keterampilan_non_teknis == '2')selected @endif>Regular</option>
                                                                    <option value="1" @if($prioritas_keterampilan_non_teknis == '1')selected @endif>Menambah Value</option>
                                                                </select></td>
                                                            </tr> 
                                                        @endforeach 
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
                                                    <table class="table table-bordered">  
                                                        @foreach (array_combine(json_decode($lowongan->kriteria->sertifikasi), json_decode($lowongan->kriteria->prioritas_sertifikasi))  as $sertifikasi => $prioritas_sertifikasi)
                                                            <tr>  
                                                                <td><input type="text" name="sertifikasi[]" class="form-control" value="{{ $sertifikasi }}"/></td>
                                                                <td><select class="form-control" name="prioritas_sertifikasi[]" required>
                                                                    <option value="4" @if($prioritas_sertifikasi == '4')selected @endif>Sangat Penting</option>
                                                                    <option value="3" @if($prioritas_sertifikasi == '3')selected @endif>Penting</option>
                                                                    <option value="2" @if($prioritas_sertifikasi == '2')selected @endif>Regular</option>
                                                                    <option value="1" @if($prioritas_sertifikasi == '1')selected @endif>Menambah Value</option>
                                                                    @if($prioritas_sertifikasi == null) 
                                                                    <option value="1" selected>Menambah Value</option>
                                                                    @endif
                                                                </select></td>
                                                            </tr> 
                                                        @endforeach   
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
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('kelola-lowongan.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary ms-3">Simpan</button>
                    </div>
                </form>
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