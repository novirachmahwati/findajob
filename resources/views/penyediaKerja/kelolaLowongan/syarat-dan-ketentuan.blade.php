@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Unggah Lowongan Pekerjaan')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Unggah Lowongan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12">
                <p class="text-white" style="position: relative !important">Ikuti langkah-langkah berikut untuk mempublish lowongan.</p>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <h5 class="text-white" style="line-height: 2.2">1</h5>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px;">
                                        Informasi Lowongan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <h5 class="text-white" style="line-height: 2.2">
                                        2
                                    </h5>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px">
                                        Persyaratan Umum & Khusus
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <h5 class="text-white" style="line-height: 2.2">
                                        3
                                    </h5>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px">
                                        Pembobotan Persyaratan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <h5 class="text-white" style="line-height: 2.2">
                                        4
                                    </h5>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold" style="margin-left: 10px;">
                                        Syarat & Ketentuan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent">
                        <h6 class="text-capitalize" style="margin-left: 15px">Syarat & Ketentuan</h6>
                        <p style="margin-left: 15px">Berikut merupakan syarat dan ketentuan untuk menayangkan lowongan pekerjaan ini.</p>
                    </div>
                    <div class="card-body p-3" style="margin-top: -30px">
                        <div class="row">
                            <div class="col">
                                <div class="bg-light rounded mt-3 p-3" style="overflow-y: scroll; height: 300px; margin-left: 20px">
                                    <p>1. Ketika membuka lowongan kerja di Findajob </p>
                                    <ol type="a">
                                        <li>Penyedia Kerja adalah perusahaan atau perseorangan yang menyediakan lowongan pekerjaan yang akan ditayangkan di Findajob</li>
                                        <li>Penyedia Kerja perusahaan atau perseorangan wajib memiliki akun di Findajob dan wajib melengkapi data yang dipersyaratkan</li>
                                        <li>Penyedia Kerja secara sadar memahami data penyedia Kerja dan lowongan pekerjaan yang akan ditampilkan</li>
                                    </ol>
                                    <p>2. Anda wajib melindungi dan menjaga seluruh data individu yang ada pada akun anda, termasuk data anda, perusahaan, dan pencari kerja sesuai perundangan yang berlaku.</p>
                                    <p>3. Konten dan materi lowongan kerja yang dipublikasikan menjadi tanggungjawab penyedia kerja.</p>
                                    <p>4. Admin Findajob berhak :</p>
                                    <ol type="a">
                                        <li>Mengelola dan mengolah data yang sudah diberikan penyedia kerja untuk kepentingan pelaporan.</li>
                                        <li>Menghapus, memblokir, memverifikasi, dan menyatakan status lainnya terkait data yang diberikan penyedia kerja bilamana ditemukan kesesuaian atau ketidaksesuaian.</li>
                                    </ol>
                                </div>
                                <form role="form" method="POST" action={{ route('SDK.store') }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="check">
                                                    <label class="form-check-label" for="check">
                                                      Saya setuju dengan syarat dan ketentuan di atas
                                                    </label>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="card-footer pb-0">
                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-primary btn-lg ms-auto text-white" style="margin-right: -22px" id="submit" disabled>
                                                Selanjutnya 
                                                <i class="fa fa-forward" style="font-size: 15px; margin-left: 5px"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
            $('#check').click(function() {
                if ($(this).is(':checked')) {
                    $('#submit').removeAttr('disabled');
                } else {
                    $('#submit').attr('disabled', 'disabled');
                }
                });
        });
    </script>
@endsection