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
                        <h6 class="text-capitalize" style="margin-left: 15px">Lengkapi Biodata Informasi Pencari Kerja</h6>
                    </div>
                    <div class="card-body p-3" style="margin-top: -15px">
                        <div class="row">
                            <div class="col">
                                <form role="form" method="POST" action={{ route('LB.store') }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="usia" value="0">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Nama<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="name" value="{{ old('name', auth()->user()->name) }}">
                                                    @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Email<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                                    @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Alamat<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat Pencari Kerja">
                                                    @error('alamat') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Tempat Lahir<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="tempat_lahir"  value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir Pencari Kerja">
                                                    @error('tempat_lahir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Tanggal Lahir<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                                    @error('tgl_lahir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin<span class="titik-logo">*</span></label>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <option value="" hidden>Pilih Jenis Kelamin Pencari Kerja</option>
                                                        <option value="Laki-laki" @if(old('jenis_kelamin') == 'Laki-laki')selected @endif>Laki-laki</option>
                                                        <option value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan')selected @endif>Perempuan</option>
                                                    </select>
                                                    @error('jenis_kelamin') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">No. Telepon<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="no_telp" value="{{ old('no_telp') }}" placeholder="No. Telepon Pencari Kerja">
                                                    @error('no_telp') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="agama" class="form-control-label">Agama<span class="titik-logo">*</span></label>
                                                    <select class="form-control" name="agama">
                                                        <option value="" hidden>Pilih Agama Pencari Kerja</option>
                                                        <option value="Islam" @if(old('agama') == 'Islam')selected @endif>Islam</option>
                                                        <option value="Protestan" @if(old('agama') == 'Protestan')selected @endif>Protestan</option>
                                                        <option value="Katolik" @if(old('agama') == 'Katolik')selected @endif>Katolik</option>
                                                        <option value="Hindu" @if(old('agama') == 'Hindu')selected @endif>Hindu</option>
                                                        <option value="Buddha" @if(old('agama') == 'Buddha')selected @endif>Buddha</option>
                                                        <option value="Khonghucu" @if(old('agama') == 'Khonghucu')selected @endif>Khonghucu</option>
                                                    </select>
                                                    @error('agama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
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