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
                                    <div class="border border-light rounded-3 p-3">  
                                        <input type="hidden" name="pencari_kerja_id" value="{{ auth()->user()->pencariKerja->id }}">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nama Sertifikat</label>
                                                <input class="form-control" type="text" name="nama" value="{{ $sertifikasi->nama }}" readonly>
                                                @error('nama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Penerbit</label>
                                                <input class="form-control" type="text" name="penerbit" value="{{ $sertifikasi->penerbit }}" readonly>
                                                @error('penerbit') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Tanggal Diterbitkan</label>
                                                <input class="form-control" type="date" name="tgl_diterbitkan" value="{{ $sertifikasi->tgl_diterbitkan }}" readonly>
                                                @error('tgl_diterbitkan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Tanggal Kadaluawarsa</label>
                                                <input class="form-control" type="date" name="tgl_kadaluwarsa" value="{{ $sertifikasi->tgl_kadaluwarsa }}" readonly>
                                                @error('tgl_kadaluwarsa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">File</label><br>
                                                <a class="btn btn-light" href="{{ route('SE.file', $sertifikasi->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    <span class="d-sm-inline d-none ms-2">Lihat</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
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