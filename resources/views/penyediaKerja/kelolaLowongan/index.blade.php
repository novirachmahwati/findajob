@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Kelola Lowongan')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kelola Lowongan'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize ms-4">Kelola Lowongan</h6>
                    </div>
                    <div class="card-body mt-n4">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    @include('layouts.flash-message')
                                    <p>
                                        <a href="{{ route('kelola-lowongan.create') }}" class="btn btn-primary">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Unggah
                                        </a>
                                    </p>
                                    <div class="border border-light rounded-3 p-3">
                                    <table class="table table-bordered table-hover yajra-datatable kelola-lowongan-datatable" id="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Penyedia Kerja</th>
                                                <th>Jenis Pekerjaan</th>
                                                <th>Lokasi</th>
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
            var tablelowongan = $('.kelola-lowongan-datatable').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                },
                ajax: "{{ route('kelola-lowongan.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'judul_pekerjaan', name: 'judul_pekerjaan'},
                    {data: 'name', name: 'users.name'},
                    {data: 'jenis_pekerjaan', name: 'jenis_pekerjaan'},
                    {data: 'lokasi_pekerjaan', name: 'lokasi_pekerjaan'},
                    {data: 'action',  name: 'action', orderable: false, searchable: false},
                ]
            });
                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
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