@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Sertifikasi')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Sertifikasi'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize ms-4">Lisensi & Sertifikasi</h6>
                    </div>
                    <div class="card-body mt-n4">
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
                    <form role="form_tambah" id="form_tambah" method="POST" action={{ route('sertifikasi.store') }} enctype="multipart/form-data">
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
        </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title">This action is not reversible.</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               Are you sure you want to delete?
               <input type="hidden" id="id" name="id">
           </div>
           <div class="modal-footer">
               <button type="button" class="btn bg-white" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-danger" id="modal-confirm_delete">Delete</button>
           </div>
       </div>
   </div>
</div>
@endsection


@section('bottom-content')
    <script type="text/javascript">
        $(document).ready(function () {
            // datatable
            var table = $('.sertifikasi-datatable').DataTable({
                processing: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                },
                ajax: "{{ route('sertifikasi.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nama', name: 'nama'},
                    {data: 'penerbit', name: 'penerbit'},
                    {data: 'action',  name: 'action', orderable: false, searchable: false},
                ]
            });
            
            $('body').on('click', '.deleteSertifikasi', function () {
                var id = $(this).data('id');

                var deleteConfirm = confirm("Apakah anda yakin akan menghapus data ini?");
                if (deleteConfirm == true) {
                    // AJAX request
                    $.ajax({
                        url: "{{ url('sertifikasi') }}"+'/'+id,
                        type: 'DELETE',
                        data: {"_token": "{{ csrf_token() }}"},
                        success: function (data) {
                            location.reload();
                        },
                    });
                }
    });       
  });
    </script>
@endsection