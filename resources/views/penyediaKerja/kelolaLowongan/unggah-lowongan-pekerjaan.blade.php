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
                <div class="card" style="opacity: 0.5; background-color: #DED3D3">
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
                <div class="card" style="opacity: 0.5; background-color: #DED3D3">
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
                        <h6 class="text-capitalize" style="margin-left: 15px">Informasi Lowongan</h6>
                        <p style="margin-left: 15px">Tambahkan informasi dasar mengenai lowongan pekerjaan Anda.</p>
                    </div>
                    <div class="card-body p-3" style="margin-top: -30px">
                        <div class="row">
                            <div class="col">
                                <form role="form" method="POST" action={{ route('ULP.store') }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="penyedia_kerja_id" value="{{ auth()->user()->penyediaKerja->id }}">
                                            <input type="hidden" name="status" value="Aktif">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nama" class="form-control-label">Judul Pekerjaan<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="judul_pekerjaan" value="{{ old('judul_pekerjaan') }}" placeholder="Judul Pekerjaan">
                                                    @error('judul_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="deskripsi_pekerjaan" class="form-control-label">Deskripsi Pekerjaan<span class="titik-logo">*</span></label>
                                                    <textarea class="ckeditor form-control" type="text" name="deskripsi_pekerjaan" value="{{ old('deskripsi_pekerjaan') }}" placeholder="Deskripsi Pekerjaan"></textarea>
                                                    @error('deskripsi_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jenis_pekerjaan" class="form-control-label">Jenis Pekerjaan<span class="titik-logo">*</span></label>
                                                    <select class="form-control" name="jenis_pekerjaan">
                                                        <option value="" hidden>Pilih Jenis Pekerjaan</option>
                                                        <option value="Full Time" @if(old('jenis_pekerjaan') == 'Full Time')selected @endif>Full Time</option>
                                                        <option value="Part Time" @if(old('jenis_pekerjaan') == 'Part Time')selected @endif>Part Time</option>
                                                        <option value="Temporary" @if(old('jenis_pekerjaan') == 'Temporary')selected @endif>Temporary</option>
                                                        <option value="Kontrak" @if(old('jenis_pekerjaan') == 'Kontrak')selected @endif>Kontrak</option>
                                                        <option value="Magang" @if(old('jenis_pekerjaan') == 'Magang')selected @endif>Magang</option>
                                                        <option value="Pekerja Harian" @if(old('jenis_pekerjaan') == 'Pekerja Harian')selected @endif>Pekerja Harian</option>
                                                    </select>
                                                    @error('jenis_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lokasi" class="form-control-label">Lokasi Pekerjaan<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="lokasi_pekerjaan" value="{{ old('lokasi_pekerjaan') }}" placeholder="Lokasi Pekerjaan">
                                                    @error('lokasi_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="rentang_gaji_minimal" class="form-control-label">Rentang Gaji (Rupiah)<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="number" name="rentang_gaji_minimal" value="{{ old('rentang_gaji_minimal') }}" placeholder="Rentang gaji minimal" min="1">
                                                    @error('rentang_gaji_minimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-top: 30px;">
                                                    <input class="form-control" type="number" name="rentang_gaji_maksimal" value="{{ old('rentang_gaji_maksimal') }}" placeholder="Rentang gaji maksimal" min="1">
                                                    @error('rentang_gaji_maksimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin<span class="titik-logo">*</span></label>
                                                </div>
                                                <div class="form-group" style="margin-top:-15px;">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="jenis_kelamin[]" type="checkbox" id="inlineCheckbox1" value="Laki-laki">
                                                        <label class="form-check-label" for="inlineCheckbox1">Laki-laki</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="jenis_kelamin[]" type="checkbox" id="inlineCheckbox2" value="Perempuan">
                                                        <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                                    </div>
                                                    @error('jenis_kelamin') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <hr class="horizontal dark">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Tanggal Tayang<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="date" name="tanggal_tayang" value="{{ old('tanggal_tayang') }}">
                                                    @error('tanggal_tayang') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Tanggal Kadaluwarsa<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="date" name="tanggal_kadaluwarsa" value="{{ old('tanggal_kadaluwarsa') }}">
                                                    @error('tanggal_kadaluwarsa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kuota" class="form-control-label">Kuota<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="number" name="kuota" value="{{ old('kuota') }}" placeholder="Kuota Lowongan" min="1">
                                                    @error('kuota') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
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
@endsection

@section('bottom-content')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection