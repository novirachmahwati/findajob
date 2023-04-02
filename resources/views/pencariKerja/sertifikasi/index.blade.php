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
                                    @include('layouts.flash-message')
                                    <p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                Tambah
                                        </button>
                                    </p>
                                    <div class="border border-light rounded-3 p-3">
                                    <table class="table table-bordered table-hover yajra-datatable" id="table">
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
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lisensi & Sertifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form role="form_tambah" id="myform" method="POST" action={{ route('SE.store') }} enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="pencari_kerja_id" value="{{ auth()->user()->pencariKerja->id }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama<span class="titik-logo">*</span></label>
                                    <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" placeholder="Contoh: CCNA">
                                    @error('nama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Penerbit<span class="titik-logo">*</span></label>
                                    <input class="form-control" type="text" name="penerbit" value="{{ old('penerbit') }}" placeholder="Contoh: Cisco">
                                    @error('penerbit') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal Diterbitkan<span class="titik-logo">*</span></label>
                                    <input class="form-control" type="date" name="tgl_diterbitkan" value="{{ old('tgl_diterbitkan') }}">
                                    @error('tgl_diterbitkan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal Kadaluawarsa<span class="titik-logo">*</span></label>
                                    <input class="form-control" type="date" name="tgl_kadaluwarsa" value="{{ old('tgl_kadaluwarsa') }}">
                                    @error('tgl_kadaluwarsa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kredensial ID<span class="titik-logo">*</span></label>
                                    <input class="form-control" type="text" name="kredensial_id" value="{{ old('kredensial_id') }}">
                                    @error('kredensial_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kredensial URL<span class="titik-logo">*</span></label>
                                    <input class="form-control" type="text" name="kredensial_url" value="{{ old('kredensial_url') }}">
                                    @error('kredensial_url') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="form_tambah">Simpan</button>
                </div>
            {{-- </form> --}}
        </div>
        </div>
    </div>

    <!-- Modal Lihat -->
    <div class="modal fade" id="modal_lihat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Sertifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method="POST" action={{ route('sertifikasi.store') }} enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="pencari_kerja_id" value="{{ auth()->user()->pencariKerja->id }}">
                        <input type="hidden" name="id" id="l_id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama<span class="titik-logo">*</span></label>
                                <input class="form-control" type="text" id="l_nama" name="nama" value="" placeholder="Contoh: CCNA">
                                @error('nama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Penerbit<span class="titik-logo">*</span></label>
                                <input class="form-control" type="text" id="l_penerbit" name="penerbit" value="" placeholder="Contoh: Cisco">
                                @error('penerbit') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                            </div>
                        </div>
                        <div class="col-md-6" style="float: left !important;">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Diterbitkan<span class="titik-logo">*</span></label>
                                <input class="form-control" type="date" id="l_tgl_diterbitkan" name="tgl_diterbitkan" value="">
                                @error('tgl_diterbitkan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                            </div>
                        </div>
                        <div class="col-md-6" style="float: left !important; padding-left: 10px">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Kadaluawarsa<span class="titik-logo">*</span></label>
                                <input class="form-control" type="date" id="l_tgl_kadaluwarsa" name="tgl_kadaluwarsa" value="">
                                @error('tgl_kadaluwarsa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kredensial ID<span class="titik-logo">*</span></label>
                                <input class="form-control" type="text" id="l_kredensial_id" name="kredensial_id" value="">
                                @error('kredensial_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kredensial URL<span class="titik-logo">*</span></label>
                                <input class="form-control" type="text" id="l_kredensial_url" name="kredensial_url" value="">
                                @error('kredensial_url') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection


@section('bottom-content')
    <script type="text/javascript">
        $(document).ready(function () {
            // datatable
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('sertifikasi.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nama', name: 'nama'},
                    {data: 'penerbit', name: 'penerbit'},
                    {data: 'action',  name: 'action', orderable: false, searchable: false},
                ]
            });

            //lihat data
            $('.lihat').on("click",function() {
                var _this = $(this).parents('tr');
                $('#l_nama').val(_this.find('.nama').text());
                var id = $(this).attr('data-id');
                $('#l_nama').val(data.nama);
                $.ajax({
                    url : "{{ route('sertifikasi.show', ['id' => "+id+"]) }}",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('#modal_lihat').modal('show');
                        $('#l_id').val(data.id);
                        $('#l_nama').val(data.nama);
                        // $('#modal_lihat').modal('show');
                    },
                    error: function(){
                        alert('failure');
                    }
                });
            });

            //lihat data
            // $('.lihat').on("click",function() {
            //     var id = $(this).attr('data-id');
            //     $.ajax({
            //         url : "{{ route('sertifikasi.show', ['id' => "+id+"]) }}",
            //         type: "GET",
            //         dataType: "JSON",
            //         success: function(data)
            //         {
            //             $('#l_id').val(data.id);
            //             $('#l_nama').val(data.nama);
            //             $('#modal_lihat').modal('show');
            //         },
            //         error: function(){
            //             alert('failure');
            //         }
            //     });
            // });

        });


        // // modal lihat
        // $(document).on('click', '.lihat', function()
        // {
        //     var _this = $(this).parents('tr');
        //     $('#l_nama').val(_this.find('.nama').text());
        // })
    </script>
    <script>
        $(document).ready(function() {
            //lihat data
            $('.lihat').on("click",function() {
                var _this = $(this).parents('tr');
                $('#l_nama').val(_this.find('.nama').text());
                var id = $(this).attr('data-id');
                $('#l_nama').val(data.nama);
                $.ajax({
                    url : "{{ route('sertifikasi.show', ['id' => "+id+"]) }}",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('#modal_lihat').modal('show');
                        $('#l_id').val(data.id);
                        $('#l_nama').val(data.nama);
                        // $('#modal_lihat').modal('show');
                    },
                    error: function(){
                        alert('failure');
                    }
                });
            });});


@endsection