@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Lowongan')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Lowongan'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-4 bg-transparent" style="margin-left: 15px">
                        <h6 class="text-capitalize" >Informasi Lowongan</h6>
                        @if (Auth::user()->role == "Pencari Kerja")
                            <p>Berikut informasi dasar mengenai lowongan pekerjaan untuk Anda.</p>
                            @if($riwayatLamaran->count() == 0)  
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lamarModal">
                                    Lamar Sekarang
                                </button>
                            @else
                                <button type="button" class="btn btn-primary text-white" disabled>
                                    Anda sudah melamar
                                </button>
                            @endif
                        @endif
                    </div>
                    <div class="card-body p-3 mt-n3">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <div class="border border-light rounded-3 p-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama" class="form-control-label">Penyedia Kerja</label>
                                                <input class="form-control" type="text"value="{{ $lowongan->penyediaKerja->user->name }}" readonly>
                                                <div id="passwordHelpBlock" class="form-text">
                                                    Klik <a href="{{ route('info-penyedia-kerja.show', $lowongan->penyediaKerja->id) }}" class="text-success"><b><u>disini.</u></b></a> Untuk informasi lebih lengkap tentang penyedia kerja.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama" class="form-control-label">Judul Pekerjaan</label>
                                                <input class="form-control" type="text" name="judul_pekerjaan" value="{{ $lowongan->judul_pekerjaan }}" readonly>
                                                @error('judul_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="deskripsi_pekerjaan" class="form-control-label">Deskripsi Pekerjaan</label>
                                                <textarea class="ckeditor form-control" type="text" name="deskripsi_pekerjaan" readonly>{{ $lowongan->deskripsi_pekerjaan }}</textarea>
                                                @error('deskripsi_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="jenis_pekerjaan" class="form-control-label">Jenis Pekerjaan</label>
                                                <input class="form-control" type="text" name="jenis_pekerjaan" value="{{ $lowongan->jenis_pekerjaan }}" readonly>
                                                @error('jenis_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="lokasi" class="form-control-label">Lokasi Pekerjaan</label>
                                                <input class="form-control" type="text" name="lokasi_pekerjaan" value="{{ $lowongan->lokasi_pekerjaan }}" readonly>
                                                @error('lokasi_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="rentang_gaji_minimal" class="form-control-label">Rentang Gaji Minimal (Rupiah)</label>
                                                <input class="form-control" type="number" name="rentang_gaji_minimal" value="{{ $lowongan->rentang_gaji_minimal }}" readonly>
                                                @error('rentang_gaji_minimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <label for="rentang_gaji_minimal" class="form-control-label">Rentang Gaji Maksimal (Rupiah)</label>
                                            <input class="form-control" type="number" name="rentang_gaji_maksimal" value="{{ $lowongan->rentang_gaji_maksimal }}" readonly>
                                            @error('rentang_gaji_maksimal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                            </div>
                                            <div class="form-group" style="margin-top:-15px;">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="jenis_kelamin[]" type="checkbox" id="inlineCheckbox1" value="Laki-laki"
                                                    {{ in_array('Laki-laki', json_decode($lowongan->jenis_kelamin)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="jenis_kelamin[]" type="checkbox" id="inlineCheckbox2" value="Perempuan"
                                                    {{ in_array('Perempuan', json_decode($lowongan->jenis_kelamin)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                                </div>
                                                @error('jenis_kelamin') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <hr class="horizontal dark">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Tanggal Tayang</label>
                                                <input class="form-control" type="date" name="tanggal_tayang" value="{{ $lowongan->tanggal_tayang }}" readonly>
                                                @error('tanggal_tayang') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Tanggal Kadaluwarsa</label>
                                                <input class="form-control" type="date" name="tanggal_kadaluwarsa" value="{{ $lowongan->tanggal_kadaluwarsa }}" readonly>
                                                @error('tanggal_kadaluwarsa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="kuota" class="form-control-label">Kuota (Orang)</label>
                                                <input class="form-control" type="number" name="kuota" value="{{ $lowongan->kuota }}" readonly>
                                                @error('kuota') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="status" class="form-control-label">Status</label>
                                                <input class="form-control" type="text" name="status" value="{{ $lowongan->status }}" readonly>
                                                @error('status') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header pb-0 bg-transparent" style="margin-left: 15px">
                        <h6 class="text-capitalize mt-n3">Persyaratan Umum</h6>
                        <p>Berikut persyaratan umum untuk dasar penyaringan lamaran.</p>
                    </div>
                    <div class="card-body p-3 mt-n4">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <div class="border border-light rounded-3 p-3">
                                        <div class="col-md-6" style="float: left !important">
                                            <div class="form-group">
                                                <label for="minimal_pendidikan" class="form-control-label">Minimal Pendidikan</label>
                                                <input class="form-control" type="text" name="minimal_pendidikan" value="{{ $lowongan->kriteria->minimal_pendidikan }}" readonly>
                                                @error('minimal_pendidikan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: left !important; padding-left: 10px;">
                                            <div class="form-group">
                                                <label for="pengalaman" class="form-control-label">Pengalaman (Tahun)</label>
                                                <input class="form-control" type="text" name="pengalaman" value="{{ $lowongan->kriteria->pengalaman }}" readonly>
                                                @error('pengalaman') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jurusan_pendidikan_terakhir" class="form-control-label">Jurusan Pendidikan Terakhir</label>
                                                <input class="form-control" type="text" name="jurusan_pendidikan_terakhir" value="{{ $lowongan->kriteria->jurusan_pendidikan_terakhir }}" readonly>
                                                @error('jurusan_pendidikan_terakhir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="rentang_usia" class="form-control-label">Rentang Usia (Tahun)</label>
                                                <input class="form-control" type="text" name="rentang_usia" value="{{ $lowongan->kriteria->rentang_usia }}" readonly>
                                                @error('rentang_usia') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bahasa" class="form-control-label">Bahasa</label>
                                            </div>
                                            <div class="form-group mt-n3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox1" value=""
                                                    {{ in_array('Bahasa Indonesia', json_decode($lowongan->kriteria->bahasa)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox1">Bahasa Indonesia</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox2" value=""
                                                    {{ in_array('Inggris', json_decode($lowongan->kriteria->bahasa)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox2">Inggris</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox3" value=""
                                                    {{ in_array('Mandarin', json_decode($lowongan->kriteria->bahasa)) ? 'checked' : '' }} onclick="return false;">
                                                    <label class="form-check-label" for="inlineCheckbox3">Mandarin</label>
                                                </div>
                                                @error('bahasa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header pb-0 pt-4 bg-transparent" style="margin-left: 15px">
                        <h6 class="text-capitalize" >Persyaratan Khusus</h6>
                        <p>Berikut persyaratan khusus dan requirement berdasarkan skala prioritas yang dibutuhkan</p>
                    </div>
                    <div class="card-body p-3 mt-n3">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <div class="border border-light rounded-3 p-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="keterampilan_teknis" class="form-control-label">Keterampilan Teknis / Hard Skill </label>
                                                <div class="table-responsive">  
                                                    <table class="table table-bordered">  
                                                        @foreach (array_combine(json_decode($lowongan->kriteria->keterampilan_teknis), json_decode($lowongan->kriteria->prioritas_keterampilan_teknis))  as $keterampilan_teknis => $prioritas_keterampilan_teknis)
                                                            <tr>  
                                                                <td><input type="text" class="form-control" value="{{ $keterampilan_teknis }}" readonly/></td>
                                                                @switch($prioritas_keterampilan_teknis)
                                                                    @case(4)
                                                                        <td><input type="text" class="form-control" value="Sangat Penting" readonly/></td>
                                                                        @break
                                                                    @case(3)
                                                                        <td><input type="text" class="form-control" value="Penting" readonly/></td>
                                                                        @break
                                                                    @case(2)
                                                                        <td><input type="text" class="form-control" value="Regular" readonly/></td>
                                                                        @break
                                                                    @case(1)
                                                                        <td><input type="text" class="form-control" value="Menambah Value" readonly/></td>
                                                                        @break
                                                                    @default
                                                                        <td><input type="text" class="form-control" value="Penting" readonly/></td>
                                                                @endswitch
                                                            </tr> 
                                                        @endforeach
                                                    </table>  
                                                </div>
                                                @error('keterampilan_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                @error('prioritas_keterampilan_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="keterampilan_non_teknis" class="form-control-label">Keterampilan Non Teknis / Soft Skill </label>
                                                <div class="table-responsive">  
                                                    <table class="table table-bordered">  
                                                        @foreach (array_combine(json_decode($lowongan->kriteria->keterampilan_non_teknis), json_decode($lowongan->kriteria->prioritas_keterampilan_non_teknis))  as $keterampilan_non_teknis => $prioritas_keterampilan_non_teknis)
                                                            <tr>  
                                                                <td><input type="text" class="form-control" value="{{ $keterampilan_non_teknis }}" readonly/></td>
                                                                @switch($prioritas_keterampilan_non_teknis)
                                                                    @case(4)
                                                                        <td><input type="text" class="form-control" value="Sangat Penting" readonly/></td>
                                                                        @break
                                                                    @case(3)
                                                                        <td><input type="text" class="form-control" value="Penting" readonly/></td>
                                                                        @break
                                                                    @case(2)
                                                                        <td><input type="text" class="form-control" value="Regular" readonly/></td>
                                                                        @break
                                                                    @case(1)
                                                                        <td><input type="text" class="form-control" value="Menambah Value" readonly/></td>
                                                                        @break
                                                                    @default
                                                                        <td><input type="text" class="form-control" value="Penting" readonly/></td>
                                                                @endswitch
                                                            </tr> 
                                                        @endforeach 
                                                    </table>  
                                                </div>
                                                @error('keterampilan_non_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                @error('prioritas_keterampilan_non_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sertifikasi" class="form-control-label">Sertifikasi</label>
                                                <div class="table-responsive">  
                                                    <table class="table table-bordered">  
                                                        @foreach (array_combine(json_decode($lowongan->kriteria->sertifikasi), json_decode($lowongan->kriteria->prioritas_sertifikasi))  as $sertifikasi => $prioritas_sertifikasi)
                                                            <tr>  
                                                                <td><input type="text" class="form-control" value="{{ $sertifikasi }}" readonly/></td>
                                                                @switch($prioritas_sertifikasi)
                                                                    @case(4)
                                                                        <td><input type="text" class="form-control" value="Sangat Penting" readonly/></td>
                                                                        @break
                                                                    @case(3)
                                                                        <td><input type="text" class="form-control" value="Penting" readonly/></td>
                                                                        @break
                                                                    @case(2)
                                                                        <td><input type="text" class="form-control" value="Regular" readonly/></td>
                                                                        @break
                                                                    @case(1)
                                                                        <td><input type="text" class="form-control" value="Menambah Value" readonly/></td>
                                                                        @break
                                                                    @default
                                                                        <td><input type="text" class="form-control" value="" readonly/></td>
                                                                @endswitch
                                                            </tr> 
                                                        @endforeach   
                                                    </table>  
                                                </div>
                                                @error('sertifikasi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                @error('prioritas_sertifikasi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
                        @if(empty($riwayatLamaran))
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lamarModal">
                                Lamar Sekarang
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
    
    @if (Auth::user()->role == "Pencari Kerja")
    <!-- Modal -->
    <div class="modal fade" id="lamarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form_lamar" id="form_lamar" method="POST" action={{ route('sukses-lamar') }} enctype="multipart/form-data">
                    @csrf
                    <p>Anda akan melamar posisi sebagai {{ $lowongan->judul_pekerjaan }} di {{ $lowongan->penyediaKerja->user->name }}</p>
                    <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                    <input type="hidden" name="pencari_kerja_id" value="{{ auth()->user()->pencariKerja->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="form_lamar">Kirim Lamaran</button>
            </div>
        </div>
        </div>
    </div>
    @endif

@endsection

@section('bottom-content')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection