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
                                        Perankingan Persyaratan
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
                        <h6 class="text-capitalize" style="margin-left: 15px">Persyaratan Umum</h6>
                        <p style="margin-left: 15px">Masukkan persyaratan umum untuk dasar penyaringan lamaran.</p>
                    </div>
                    <div class="card-body p-3" style="margin-top: -30px">
                        <div class="row">
                            <div class="col">
                                <form role="form" method="POST" action={{ route('PUK.store') }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="penyedia_kerja_id" value="{{ auth()->user()->penyediaKerja->id }}">
                                            <input type="hidden" name="status" value="Aktif">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="minimal_pendidikan" class="form-control-label">Minimal Pendidikan<span class="titik-logo">*</span></label>
                                                    <select class="form-control" name="minimal_pendidikan">
                                                        <option value="" hidden>Pilih Minimal Pendidikan</option>
                                                        <option value="SMK" @if(old('minimal_pendidikan') == 'SMK')selected @endif>SMK</option>
                                                        <option value="Diploma" @if(old('minimal_pendidikan') == 'Diploma')selected @endif>Diploma</option>
                                                        <option value="Sarjana" @if(old('minimal_pendidikan') == 'Sarjana')selected @endif>Sarjana</option>
                                                        <option value="Magister" @if(old('minimal_pendidikan') == 'Magister')selected @endif>Magister</option>
                                                        <option value="Doktoral" @if(old('minimal_pendidikan') == 'Doktoral')selected @endif>Doktoral</option>
                                                        <option value="SD atau Sederajat" @if(old('minimal_pendidikan') == 'SD atau Sederajat')selected @endif>SD atau Sederajat</option>
                                                        <option value="SMP atau Sederajat" @if(old('minimal_pendidikan') == 'SMP atau Sederajat')selected @endif>SMP atau Sederajat</option>
                                                        <option value="SMA atau Sederajat" @if(old('minimal_pendidikan') == 'SMA atau Sederajat')selected @endif>SMA atau Sederajat</option>
                                                    </select>
                                                    @error('minimal_pendidikan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="status_pernikahan" class="form-control-label">Status Pernikahan<span class="titik-logo">*</span></label>
                                                </div>
                                                <div class="form-group" style="margin-top:-15px;">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="status_pernikahan[]" type="checkbox" id="inlineCheckbox1" value="Single / Belum Menikah">
                                                        <label class="form-check-label" for="inlineCheckbox1">Single / Belum Menikah</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="status_pernikahan[]" type="checkbox" id="inlineCheckbox2" value="Sudah Menikah">
                                                        <label class="form-check-label" for="inlineCheckbox2">Sudah Menikah</label>
                                                    </div>
                                                    @error('status_pernikahan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="rentang_usia_minimal" class="form-control-label">Rentang Usia (Tahun)<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="number" name="rentang_usia_minimal" value="{{ old('rentang_usia_minimal') }}" placeholder="Rentang usia minimal">
                                                    @error('rentang_usia_minimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-top: 30px;">
                                                    <input class="form-control" type="number" name="rentang_usia_maksimal" value="{{ old('rentang_usia_maksimal') }}" placeholder="Rentang usia maksimal">
                                                    @error('rentang_usia_maksimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <hr class="horizontal dark mt-3">
                                            {{-- <div class="card-header pb-0 pt-4 bg-transparent"> --}}
                                                <h6 class="text-capitalize mt-3">Persyaratan Khusus</h6>
                                                <p>Masukkan persyaratan khusus dan requirement yang kamu butuhkan, seperti keahlian bahasa tertentu.</p>
                                            {{-- </div> --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="kualifikasi" class="form-control-label">Kualifikasi / Requirements <span class="titik-logo">*</span></label>
                                                    <textarea class="ckeditor form-control" type="text" name="kualifikasi" value="{{ old('kualifikasi') }}" placeholder="Kualifikasi"></textarea>
                                                    @error('kualifikasi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
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