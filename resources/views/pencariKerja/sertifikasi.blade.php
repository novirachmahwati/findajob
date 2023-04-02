@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Profil Pencari Kerja')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Profil Pencari Kerja'])
    <div class="container-fluid py-4">
        <div class="row">
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
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px; line-height: 3">
                                        Lengkapi Biodata
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
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px; line-height: 3">
                                        Unggah Foto
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
                                        Sertifikasi
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
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px">
                                        Unggah Daftar Riwayat Hidup
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
                        <h6 class="text-capitalize" style="margin-left: 15px">Lisensi & Sertifikasi</h6>
                    </div>
                    <div class="card-body p-3" style="margin-top: -15px">
                        <div class="row">
                            <div class="col">
                                <form role="form" method="POST" action={{ route('SE.store') }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <p>
                                            <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Tambah
                                            </a>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <input type="hidden" name="pencari_kerja_id" value="{{ auth()->user()->pencariKerja->id }}">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Nama<span class="titik-logo">*</span></label>
                                                            <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" placeholder="Contoh: CCNA">
                                                            @error('nama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Penerbit<span class="titik-logo">*</span></label>
                                                            <input class="form-control" type="text" name="penerbit" value="{{ old('penerbit') }}" placeholder="Contoh: Cisco">
                                                            @error('penerbit') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Tanggal Diterbitkan<span class="titik-logo">*</span></label>
                                                            <input class="form-control" type="date" name="tgl_diterbitkan" value="{{ old('tgl_diterbitkan') }}">
                                                            @error('tgl_diterbitkan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Tanggal Kadaluawarsa<span class="titik-logo">*</span></label>
                                                            <input class="form-control" type="date" name="tgl_kadaluwarsa" value="{{ old('tgl_kadaluwarsa') }}">
                                                            @error('tgl_kadaluwarsa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Kredensial ID<span class="titik-logo">*</span></label>
                                                            <input class="form-control" type="text" name="kredensial_id" value="{{ old('kredensial_id') }}">
                                                            @error('kredensial_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Kredensial URL<span class="titik-logo">*</span></label>
                                                            <input class="form-control" type="text" name="kredensial_url" value="{{ old('kredensial_url') }}">
                                                            @error('kredensial_url') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                        </div>
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