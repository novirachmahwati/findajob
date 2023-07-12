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
                                                    <img src="{{ $pencariKerja->foto }}" onerror="this.src='{{ asset('img/user.png') }}'"  alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h4>{{ $pencariKerja->user->name }}</h4>
                                                <p><i class="fas fa-envelope"></i>&nbsp;{{ $pencariKerja->user->email }} |&nbsp;<i class="fas fa-phone"></i>&nbsp;{{ $pencariKerja->no_telp }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="col-md-6" style="float: left !important">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                                        <input class="form-control" type="text" name="name" value="{{ $pencariKerja->user->name }}" readonly>
                                                        @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Email</label>
                                                        <input class="form-control" type="email" name="email" value="{{ $pencariKerja->user->email }}" readonly>
                                                        @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Alamat</label>
                                                        <input class="form-control" type="text" name="alamat" value="{{ $pencariKerja->alamat }}" readonly>
                                                        @error('alamat') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="float: left !important">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                                                        <input class="form-control" type="text" name="tempat_lahir" value="{{ $pencariKerja->tempat_lahir }}" readonly>
                                                        @error('tempat_lahir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                                                        <input class="form-control" type="date" name="tgl_lahir" value="{{ $pencariKerja->tgl_lahir }}" readonly>
                                                        @error('tgl_lahir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                                        <input class="form-control" type="text" name="jenis_kelamin"  value="{{ $pencariKerja->jenis_kelamin }}" readonly>
                                                        @error('jenis_kelamin') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">No. Telepon</label>
                                                        <input class="form-control" type="text" name="no_telp" value="{{ $pencariKerja->no_telp }}" readonly>
                                                        @error('no_telp') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Agama</label>
                                                        <input class="form-control" type="text" name="agama" value="{{ $pencariKerja->agama }}" readonly>
                                                        @error('agama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize" style="margin-left: 15px">Daftar Riwayat Hidup</h6>
                    </div>
                    <div class="card-body p-3" style="margin-top: -15px">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <div class="border border-light rounded-3 p-3">  
                                        <a class="btn btn-primary" href="{{ route('daftar-riwayat-hidup.show', $pencariKerja->id) }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            <span class="d-sm-inline d-none ms-2">Lihat</span>
                                        </a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize" style="margin-left: 15px">Sertifikasi</h6>
                    </div>
                    <div class="card-body p-3" style="margin-top: -15px">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <div class="border border-light rounded-3 p-3">  
                                        <div class="row">
                                            <div class="col">
                                                <table class="table table-bordered table-hover yajra-datatable sertifikasi-datatable" id="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Penerbit</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <a href="{{ route('pencari-kerja.index') }}" class="btn btn-secondary">Kembali</a>
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

            // datatable
            var table = $('.sertifikasi-datatable').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                },
                ajax: "{{ route('show_sertifikasi', $pencariKerja->id) }}",
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nama', name: 'nama'},
                    {data: 'penerbit', name: 'penerbit'},
                    {data: 'action',  name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
