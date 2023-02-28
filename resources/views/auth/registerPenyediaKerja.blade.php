@extends('layouts.app')
@section('title', 'Registrasi')
@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Registrasi Akun</h4>
                                    <p class="mb-0 text-justify">Daftar sebagai Penyedia Kerja dan dapatkan potensi kandidat terbaik</p>
                                    <div class="d-flex">
                                        <a href="{{ route('registrasi') }}" class="btn w-100 px-3 mb-2 mt-3 me-2">Pencari Kerja</a>
                                        <a href="{{ route('registrasi.penyediaKerja') }}" class="btn bg-gradient-primary w-100 px-3 mb-2 mt-3 active">Penyedia Kerja</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('registrasi.penyediaKerja.perform') }}">
                                        @csrf
                                        <input type="hidden" name="role" value="Penyedia Kerja">
                                        <div class="flex flex-col mb-3">
                                            <input type="text" name="name" class="form-control" placeholder="Nama instansi anda" aria-label="Name" value="{{ old('name') }}" >
                                            @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}" >
                                            @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Kata sandi" aria-label="Password">
                                            @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mb-0 mt-3">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto" style="margin-top: -15px">
                                        Sudah memiliki akun?
                                        <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Login</a>
                                        disini.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('/img/bg/register/pencariKerja/1.jpg');background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h3 class="mt-5 text-white font-weight-bolder position-relative">Findajob<span class="titik-logo">.</span></h3>
                                <h4 class="text-white font-weight-bolder position-relative">Registrasi akun penyedia kerja</h4>
                                <p class="text-white position-relative"><span class="highlight">Situs lowongan kerja terbaru dan peluang karir IT</span></p>
                                <p class="text-white position-relative" style="margin-top: -12px"><span class="highlight">terlengkap 2023.</span></p>
                            </div>
                        </div>
                    </div>
                                
                </div>
            </div>
        </section>
    </main>
@endsection
