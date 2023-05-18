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
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px; line-height: 3">
                                        Kontak
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
                        <h6 class="text-capitalize" style="margin-left: 15px">Kontak</h6>
                        <p style="margin-left: 15px">Kami akan mengirimkan email ke daftar email di bawah ini untuk setiap lamaran yang masuk.</p>
                    </div>
                    <div class="card-body p-3" style="margin-top: -30px">
                        <div class="row">
                            <div class="col">
                                <form role="form" method="POST" action={{ route('ULP.store') }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="penyedia_kerja_id" value="{{ auth()->user()->penyediaKerja->id }}">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="kontak" class="form-control-label">Kontak <span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="kontak" value="{{ old('kontak') }}" placeholder="Masukkan Email Anda">
                                                    @error('kontak') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
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