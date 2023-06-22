@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Lowongan')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Lowongan'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent text-center" style="margin-left: 15px">
                        <img style="width: 100px" src="{{ asset('img/letter.png') }}">
                        <h6>Lamaran Anda telah berhasil dikirim ke {{ $riwayatLamaran->lowongan->penyediaKerja->user->name }}</h6>
                        <p>Perusahaan akan menghubungi Anda apabila Anda terpilih. Terima kasih dan semoga sukses!</p>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('lowongan.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('riwayat-lamaran.index') }}" class="btn btn-primary ms-3">Lihat Riwayat Lamaran</a>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection