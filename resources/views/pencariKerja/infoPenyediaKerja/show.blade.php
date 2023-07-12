@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Info Penyedia Kerja')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Info Penyedia Kerja'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize" style="margin-left: 15px">Info Penyedia Kerja</h6>
                    </div>
                    <div class="card-body p-3" style="margin-top: -15px">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <div class="border border-light rounded-3 p-3">  
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="avatar avatar-xl position-relative">
                                                    <img src="{{ $penyediaKerja->foto }}" onerror="this.src='{{ asset('img/office-building.png') }}'"  alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h4>{{ $penyediaKerja->user->name }}</h4>
                                                <p><i class="fas fa-envelope"></i>&nbsp;{{ $penyediaKerja->user->email }} |&nbsp;<i class="fas fa-phone"></i>&nbsp;{{ $penyediaKerja->no_telp }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="col-md-6" style="float: left !important">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                                        <input class="form-control" type="text" name="name" value="{{ $penyediaKerja->user->name }}" readonly>
                                                        @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Email</label>
                                                        <input class="form-control" type="email" name="email" value="{{ $penyediaKerja->user->email }}" readonly>
                                                        @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="bidang" class="form-control-label">Bidang Bisnis</label>
                                                        <input class="form-control" type="text" name="role" value="{{ $penyediaKerja->bidang }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Alamat</label>
                                                        <input class="form-control" type="text" name="alamat" value="{{ $penyediaKerja->alamat }}" readonly>
                                                        @error('alamat') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="float: left !important">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">No. Telepon</label>
                                                        <input class="form-control" type="text" name="no_telp" value="{{ $penyediaKerja->no_telp }}" readonly>
                                                        @error('no_telp') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                                    <div class="form-group">
                                                        <label for="jml_karyawan" class="form-control-label">Jumlah Karyawan</label>
                                                        <input class="form-control" type="text" name="jml_karyawan" value="{{ $penyediaKerja->jml_karyawan }}" readonly>
                                                        @error('jml_karyawan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                                        <textarea class="ckeditor form-control" type="text" name="deskripsi" readonly>{{ $penyediaKerja->deskripsi }}</textarea>
                                                        @error('deskripsi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <a href="{{ route('penyedia-kerja.index') }}" class="btn btn-secondary">Kembali</a>
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