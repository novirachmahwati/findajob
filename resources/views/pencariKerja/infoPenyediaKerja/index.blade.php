@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Info Penyedia Kerja')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Info Penyedia Kerja'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize ms-4">Info Penyedia Kerja</h6>
                    </div>
                    <div class="card-body mt-n4">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    @include('layouts.flash-message')
                                    <div class="border border-light rounded-3 p-3">
                                    <table class="table table-bordered table-hover yajra-datatable penyedia-kerja-datatable" id="tablePenyediaKerja">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Penyedia Kerja</th>
                                                <th>Bidang</th>
                                                <th>Alamat</th>
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

</div>
@endsection

@section('bottom-content')
    <script type="text/javascript">
        $(document).ready(function () {
            // datatable
            var tablePenyediaKerja = $('.penyedia-kerja-datatable').DataTable({
                processing: true,
                scrollX: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                },
                ajax: "{{ route('penyedia-kerja.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'users.name'},
                    {data: 'bidang', name: 'penyedia_kerjas.bidang'},
                    {data: 'alamat', name: 'penyedia_kerjas.alamat'},
                    {data: 'action',  name: 'action', orderable: false, searchable: false},
                ]
            });
  });
    </script>
@endsection