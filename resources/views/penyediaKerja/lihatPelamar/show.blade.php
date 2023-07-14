@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Lihat Pelamar')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Lihat Pelamar'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize ms-4">Lihat Pelamar</h6>
                    </div>
                    <div class="card-body mt-n4">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    @include('layouts.flash-message')
                                    <p>
                                        <a href="{{ url(Request::url()) }}" class="btn btn-primary">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                            Refresh
                                        </a>
                                    </p>
                                    <div class="border border-light rounded-3 p-3">
                                    <table class="table table-bordered table-hover yajra-datatable lihat-pelamar-datatable" id="tableLihatPelamar">
                                        <thead>
                                            <tr>
                                                <th>Ranking</th>
                                                <th>Nama</th>
                                                <th>Skor</th>
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
            var tableLihatPelamar = $('.lihat-pelamar-datatable').DataTable({
                processing: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                },
                ajax: "{{ Request::url() }}",
                columns: [
                    {data: 'rank', name: 'hasil_perhitungan.rank', orderable: true, searchable: true},
                    {data: 'name', name: 'users.name'},
                    {data: 'skor', name: 'hasil_perhitungan.skor'},
                    {data: 'action',  name: 'action', orderable: false, searchable: false},
                ]
            });      
        });
    </script>
@endsection