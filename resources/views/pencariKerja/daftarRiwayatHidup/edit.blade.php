@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Daftar Riwayat Hidup')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Daftar Riwayat Hidup'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize ms-4">Daftar Riwayat Hidup</h6>
                    </div>
                    <div class="card-body mt-n4">
                        <div class="row">
                            <div class="col">
                                <form role="form" method="POST" action={{ route('daftar-riwayat-hidup.update', auth()->user()->pencariKerja->id) }} enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="file" name="cv" accept="pdf">
                                            @error('cv') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="pt-3">
                                            <p>Catatan :</p>
                                            <p>Daftar riwayat hidup yang sudah diunggah dapat diakses oleh semua perusahaan yang telah dilamar</p>
                                            <p>Kami menganjurkan anda menggunakan format yang dapat diunduh <a href="{{ route('UC.download') }}" class="text-success"><b><u>disini.</u></b></a> Untuk performa lamaran yang lebih baik.</p>
                                            <p class="text-secondary"><i>Unggah daftar riwayat hidup dalam bentuk <b class="text-danger">PDF (Maksimal 3 MB)</b></i></p>
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
