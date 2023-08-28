@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Sertifikasi')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Sertifikasi'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize" style="margin-left: 15px">Lisensi & Sertifikasi</h6>
                    </div>
                    <div class="card-body p-3" style="margin-top: -15px">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <form role="form_edit" id="myform" method="POST" action="{{ route('sertifikasi.update', $sertifikasi->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')  
                                        <div class="border border-light rounded-3 p-3">
                                                <input type="hidden" name="pencari_kerja_id" value="{{ $sertifikasi->pencari_kerja_id }}">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Nama Sertifikat<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="text" name="nama" value="{{ $sertifikasi->nama }}">
                                                        @error('nama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Penerbit<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="text" name="penerbit" value="{{ $sertifikasi->penerbit }}">
                                                        @error('penerbit') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="float: left !important">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Tanggal Diterbitkan<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="date" name="tgl_diterbitkan" value="{{ $sertifikasi->tgl_diterbitkan }}">
                                                        @error('tgl_diterbitkan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Tanggal Kadaluawarsa<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="date" name="tgl_kadaluwarsa" value="{{ $sertifikasi->tgl_kadaluwarsa }}">
                                                        @error('tgl_kadaluwarsa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="file" class="form-control-label">Unggah File<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="file" name="file" value="{{ $sertifikasi->file }}">
                                                        @error('file') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary ms-3">Simpan</button>
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