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
                        <h6 class="text-capitalize" style="margin-left: 15px">Informasi Lowongan</h6>
                        <p style="margin-left: 15px">Tambahkan informasi dasar mengenai lowongan pekerjaan Anda.</p>
                    </div>
                    <div class="card-body p-3" style="margin-top: -30px">
                        <div class="row">
                            <div class="col">
                                <form role="form" method="POST" action={{ route('LD.store') }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nama" class="form-control-label">Judul Pekerjaan<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="judul_pekerjaan" value="{{ old('judul_pekerjaan') }}">
                                                    @error('judul_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                                                    {{-- <label for="example-text-input" class="form-control-label">Telepon Administrator<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="no_telp_administrator" value="{{ old('no_telp_administrator') }}">
                                                    @error('no_telp_administrator') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror --}}
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Alamat<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="alamat" value="{{ old('alamat', auth()->user()->penyediaKerja->alamat) }}">
                                                    @error('alamat') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Tempat Lahir<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="tempat_lahir"  value="{{ old('tempat_lahir', auth()->user()->penyediaKerja->tempat_lahir) }}">
                                                    @error('tempat_lahir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Tanggal Lahir<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="date" name="tgl_lahir" value="{{ old('tgl_lahir', auth()->user()->penyediaKerja->tgl_lahir) }}">
                                                    @error('tgl_lahir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin<span class="titik-logo">*</span></label>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <option value="" disabled hidden></option>
                                                        <option value="Laki-laki" @if(old('jenis_kelamin') == 'Laki-laki')selected @endif>Laki-laki</option>
                                                        <option value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan')selected @endif>Perempuan</option>
                                                    </select>
                                                    @error('jenis_kelamin') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">No. Telepon<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="no_telp" value="{{ old('no_telp', auth()->user()->penyediaKerja->no_telp) }}">
                                                    @error('no_telp') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Agama<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="agama" value="{{ old('agama', auth()->user()->penyediaKerja->agama) }}">
                                                    @error('agama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                        </div> --}}
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