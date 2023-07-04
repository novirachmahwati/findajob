@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Portal Lowongan Kerja')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Profil'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                    </div>
                    <div class="card-body p-3">
                        @if (Auth::user()->role == "Pencari Kerja")  
                            <div class="row">
                                <div class="col-auto ms-4">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="{{ asset(auth()->user()->pencariKerja->foto) }}" onerror="this.src='{{ asset('img/user.png') }}'"  alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <div class="col">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <p><i class="fas fa-envelope"></i>&nbsp;{{ auth()->user()->email }} |&nbsp;<i class="fas fa-phone"></i>&nbsp;{{ auth()->user()->pencariKerja->no_telp }}</p>
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
                                                        <label for="example-text-input" class="form-control-label">Agama<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="text" name="agama" value="{{ old('agama', auth()->user()->pencariKerja->agama) }}">
                                                        @error('agama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>        
                        @endif

                        @if (Auth::user()->role == "Penyedia Kerja")        
                            <div class="row">
                                <div class="col-auto ms-4">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="{{ asset(auth()->user()->pencariKerja->foto) }}" onerror="this.src='{{ asset('img/user.png') }}'"  alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <div class="col">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <p><i class="fas fa-envelope"></i>&nbsp;{{ auth()->user()->email }} |&nbsp;<i class="fas fa-phone"></i>&nbsp;{{ auth()->user()->pencariKerja->no_telp }}</p>
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
                                                        <label for="example-text-input" class="form-control-label">Agama<span class="titik-logo">*</span></label>
                                                        <input class="form-control" type="text" name="agama" value="{{ old('agama', auth()->user()->pencariKerja->agama) }}">
                                                        @error('agama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

