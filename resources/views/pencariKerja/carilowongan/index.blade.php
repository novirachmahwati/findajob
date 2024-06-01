@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Lowongan')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Lowongan'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 p-4 bg-transparent">
                        <h6>Cari Lowongan</h6>
                        <p>Rekomendasi berdasarkan preferensimu</p>
                        <form class="row g-3">
                            <div class="col-md-4">
                                <label for="pendidikan" class="form-label">Minimal Pendidikan</label>
                                <input type="text" class="form-control" id="pendidikan" value="{{ auth()->user()->pencariKerja->pendidikan }}">
                            </div>
                            <div class="col-md-4">
                                <label for="jurusan" class="form-label">Jurusan Pendidikan</label>
                                <input type="text" class="form-control" id="jurusan" value="{{ auth()->user()->pencariKerja->jurusan }}">
                            </div>
                            <div class="col-md-3">
                              <label for="usia" class="form-label">Usia (Tahun)</label>
                              <input type="number" class="form-control" id="usia" value="{{ auth()->user()->pencariKerja->usia }}">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary" style="margin-top: 30px"><i class="fa fa-search"></i></button>
                            </div>
                          </form>
                    </div>
                    <div class="card-body mt-n4">
                        <div class="row">
                            <div class="col">
                                @include('layouts.flash-message')
                                <div class="border border-light rounded-3 p-3 mt-4">
                                <table class="table table-bordered table-hover yajra-datatable lowongan-datatable" id="tablelowongan">
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
        @include('layouts.footers.auth.footer')
    </div>

</div>
@endsection

@section('bottom-content')
    <script type="text/javascript">
        $(document).ready(function () {
            // datatable
            var tablelowongan = $('.lowongan-datatable').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                },
                ajax: "{{ route('lowongan.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'judul_pekerjaan', name: 'judul_pekerjaan'},
                    {data: 'name', name: 'users.name'},
                    {data: 'jenis_pekerjaan', name: 'jenis_pekerjaan'},
                    {data: 'lokasi_pekerjaan', name: 'lokasi_pekerjaan'},
                    {data: 'action',  name: 'action', orderable: false, searchable: false},
                ]
            });
  });
    </script>
@endsection