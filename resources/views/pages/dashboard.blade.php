@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Portal Lowongan Kerja')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        @if (Auth::user()->role == "Pencari Kerja")
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card"><a href="{{ route('riwayat-lamaran.index') }}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 font-weight-bold">
                                            @if ($jml_lamaranTerkirim == 0)
                                            Belum ada lamaran kerja terkirim
                                            @else
                                            {{ $jml_lamaranTerkirim }} Lamaran kerja anda telah berhasil dikirim
                                            @endif</p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card"><a href="{{ route('daftar-riwayat-hidup.index') }}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 font-weight-bold">1 Daftar riwayat hidup berhasil diunggah</p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="fa fa-file text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card"><a href="{{ route('sertifikasi.index') }}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 font-weight-bold">
                                            @if ($jml_sertifikasi == 0)
                                            Belum ada sertifikasi yang dimiliki
                                            @else
                                            {{ $jml_sertifikasi }} Sertifikasi anda telah berhasil diunggah
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card"><a href="{{ route('UC.download') }}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 font-weight-bold">
                                            Unduh format daftar riwayat hidup
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="fa fa-download text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-auto ms-4">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="{{ asset(auth()->user()->pencariKerja->foto) }}" onerror="this.src='{{ asset('img/user.png') }}'"  alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <div class="col">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <p><i class="fa fa-envelope"></i>&nbsp;{{ auth()->user()->email }} |&nbsp;<i class="fa fa-phone"></i>&nbsp;{{ auth()->user()->pencariKerja->no_telp }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form role="form" method="POST" action={{ route('profil.edit') }} enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header pb-0">
                                            @include('layouts.flash-message')
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0">Edit Profile</p>
                                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Simpan</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
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
                                                        <label for="example-text-input" class="form-control-label">Role</label>
                                                        <input class="form-control" type="text" name="role" value="{{ old('role', auth()->user()->role) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Alamat<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="text" name="alamat" value="{{ old('alamat', auth()->user()->pencariKerja->alamat) }}">
                                                        @error('alamat') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Tempat Lahir<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="text" name="tempat_lahir"  value="{{ old('tempat_lahir', auth()->user()->pencariKerja->tempat_lahir) }}">
                                                        @error('tempat_lahir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Tanggal Lahir<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="date" name="tgl_lahir" value="{{ old('tgl_lahir', auth()->user()->pencariKerja->tgl_lahir) }}">
                                                        @error('tgl_lahir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin<span class="titik-logo">*</span></label>
                                                        <select class="form-control" name="jenis_kelamin">
                                                            <option value="" disabled hidden></option>
                                                            <option value="Laki-laki" {{ auth()->user()->pencariKerja->jenis_kelamin == "Laki-laki"  ? 'selected' : ''}} >Laki-laki</option>
                                                            <option value="Perempuan" {{ auth()->user()->pencariKerja->jenis_kelamin == "Perempuan"  ? 'selected' : ''}}>Perempuan</option>
                                                        </select>
                                                        @error('jenis_kelamin') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">No. Telepon<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="text" name="no_telp" value="{{ old('no_telp', auth()->user()->pencariKerja->no_telp) }}">
                                                        @error('no_telp') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="agama" class="form-control-label">Agama<span class="titik-logo">*</span></label>
                                                        <select class="form-control" name="agama">
                                                            <option value="Islam" {{ auth()->user()->pencariKerja->agama == "Islam"  ? 'selected' : ''}}>Islam</option>
                                                            <option value="Protestan" {{ auth()->user()->pencariKerja->agama == "Protestan"  ? 'selected' : ''}}>Protestan</option>
                                                            <option value="Katolik" {{ auth()->user()->pencariKerja->agama == "Katolik"  ? 'selected' : ''}}>Katolik</option>
                                                            <option value="Hindu" {{ auth()->user()->pencariKerja->agama == "Hindu"  ? 'selected' : ''}}>Hindu</option>
                                                            <option value="Buddha" {{ auth()->user()->pencariKerja->agama == "Buddha"  ? 'selected' : ''}}>Buddha</option>
                                                            <option value="Khonghucu" {{ auth()->user()->pencariKerja->agama == "Khonghucu"  ? 'selected' : ''}}>Khonghucu</option>
                                                        </select>
                                                        @error('agama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
        @endif

        @if (Auth::user()->role == "Penyedia Kerja")
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card"><a href="{{ route('kelola-lowongan.index') }}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 font-weight-bold">
                                            @if ($jml_lowongan == 0)
                                            Belum ada lamaran kerja diunggah
                                            @else
                                            {{ $jml_lowongan }} Lamaran kerja anda telah diunggah
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card"><a href="{{ route('kelola-lowongan.index') }}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 font-weight-bold">
                                            @if ($jml_lowongan_aktif == 0)
                                            Belum ada lowongan kerja aktif
                                            @else
                                            {{ $jml_lowongan_aktif }} Lowongan kerja anda aktif dipublikasikan
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="fa fa-file text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card"><a href="{{ route('kelola-lowongan.index') }}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 font-weight-bold">
                                            @if ($jml_lowongan_tdk_aktif == 0)
                                            Belum ada lowongan kerja tidak aktif
                                            @else
                                            {{ $jml_lowongan_tdk_aktif }} Lowongan kerja anda tidak aktif dipublikasikan
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card"><a href="{{ route('lihat-pelamar.index') }}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 font-weight-bold">
                                            @if ($jml_pelamar == 0)
                                            Belum ada pelamar yang masuk
                                            @else
                                            {{ $jml_pelamar }} Pelamar telah melamar lowongan anda
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="fa fa-download text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-auto ms-4">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="{{ asset(auth()->user()->penyediaKerja->foto) }}" onerror="this.src='{{ asset('img/office-building.png') }}'"  alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <div class="col">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <p><i class="fa fa-envelope"></i>&nbsp;{{ auth()->user()->email }} |&nbsp;<i class="fa fa-phone"></i>&nbsp;{{ auth()->user()->penyediaKerja->no_telp }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form role="form" method="POST" action={{ route('profil.edit') }} enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header pb-0">
                                            @include('layouts.flash-message')
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0">Edit Profile</p>
                                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Simpan</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
                                                        <label for="example-text-input" class="form-control-label">Role</label>
                                                        <input class="form-control" type="text" name="role" value="{{ old('role', auth()->user()->role) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="bidang" class="form-control-label">Bidang Bisnis<span class="titik-logo">*</span></label>
                                                        <select class="form-control" name="bidang">
                                                            <option value="" hidden>Pilih Bidang Bisnis</option>
                                                            <option value="IT/Komputer" {{ auth()->user()->penyediaKerja->bidang == "IT/Komputer"  ? 'selected' : ''}}>IT/Komputer</option>
                                                        </select>
                                                        @error('bidang') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Alamat<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="text" name="alamat" value="{{ old('alamat', auth()->user()->penyediaKerja->alamat) }}" placeholder="Alamat Perusahaan">
                                                        @error('alamat') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">No. Telepon<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="text" name="no_telp" value="{{ old('no_telp', auth()->user()->penyediaKerja->no_telp) }}" placeholder="No. Telepon Perusahaan">
                                                        @error('no_telp') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jml_karyawan" class="form-control-label">Jumlah Karyawan<span class="titik-logo">*</span></label>
                                                        <select class="form-control" name="jml_karyawan">
                                                            <option value="" hidden>Pilih Jumlah Karyawan</option>
                                                            <option value="< 50 Karyawan" {{ auth()->user()->penyediaKerja->jml_karyawan == "< 50 Karyawan"  ? 'selected' : ''}}>< 50 Karyawan</option>
                                                            <option value="50-100 Karyawan" {{ auth()->user()->penyediaKerja->jml_karyawan == "50-100 Karyawan"  ? 'selected' : ''}}>50-100 Karyawan</option>
                                                            <option value="101-250 Karyawan" {{ auth()->user()->penyediaKerja->jml_karyawan == "101-250 Karyawan"  ? 'selected' : ''}}>101-250 Karyawan</option>
                                                            <option value="251-500 Karyawan" {{ auth()->user()->penyediaKerja->jml_karyawan == "251-500 Karyawan"  ? 'selected' : ''}}>251-500 Karyawan</option>
                                                            <option value="501-1000 Karyawan" {{ auth()->user()->penyediaKerja->jml_karyawan == "501-1000 Karyawan"  ? 'selected' : ''}}>501-1000 Karyawan</option>
                                                            <option value="> 1000 Karyawan" {{ auth()->user()->penyediaKerja->jml_karyawan == "> 1000 Karyawan"  ? 'selected' : ''}}>> 1000 Karyawan</option>
                                                        </select>
                                                        @error('jml_karyawan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="deskripsi" class="form-control-label">Deskripsi<span class="titik-logo">*</span></label>
                                                        <textarea class="ckeditor form-control" type="text" name="deskripsi">{{ auth()->user()->penyediaKerja->deskripsi }}</textarea>
                                                        @error('deskripsi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
        @endif
        
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