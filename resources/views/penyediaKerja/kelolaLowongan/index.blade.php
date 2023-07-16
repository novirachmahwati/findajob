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
                                                <th>Jenis Pekerjaan</th>
                                                <th>Lokasi</th>
                                                <th>Status</th>
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
@endsection


@section('bottom-content')
    <script type="text/javascript">
        $(document).ready(function () {
            // datatable
            var tablelowongan = $('.kelola-lowongan-datatable').DataTable({
                processing: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                },
                ajax: "{{ route('kelola-lowongan.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'judul_pekerjaan', name: 'judul_pekerjaan'},
                    {data: 'jenis_pekerjaan', name: 'jenis_pekerjaan'},
                    {data: 'lokasi_pekerjaan', name: 'lokasi_pekerjaan'},
                    {data: 'status', name: 'status'},
                    {data: 'action',  name: 'action', orderable: false, searchable: false},
                ]
            });     
        });
    </script>
@endsection