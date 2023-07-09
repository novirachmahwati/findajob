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
                                <div class="card-body">
                                    @include('layouts.flash-message')
                                    <a class="btn btn-primary" href="{{ route('daftar-riwayat-hidup.show', auth()->user()->pencariKerja->id) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <span class="d-sm-inline d-none ms-2">Lihat</span>
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('daftar-riwayat-hidup.edit', auth()->user()->pencariKerja->id) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        <span class="d-sm-inline d-none ms-2">Edit</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>

@endsection
