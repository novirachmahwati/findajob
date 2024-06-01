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
                <div class="card" style="opacity: 0.5; background-color: #DED3D3">
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
                <div class="card" style="opacity: 0.5; background-color: #DED3D3">
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
                        <h6 class="text-capitalize" style="margin-left: 15px">Persyaratan Umum</h6>
                        <p style="margin-left: 15px">Masukkan persyaratan umum untuk dasar penyaringan lamaran.</p>
                    </div>
                    <div class="card-body p-3" style="margin-top: -30px">
                        <div class="row">
                            <div class="col">
                                <form role="form" method="POST" action={{ route('persyaratan-umum-khusus.store') }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="lowongan_id" value="{{ $lowongan_id }}">
                                            <input type="hidden" name="prioritas_minimal_pendidikan" value="#">
                                            <input type="hidden" name="usia_minimal" value="0">
                                            <input type="hidden" name="usia_maksimal" value="0">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="minimal_pendidikan" class="form-control-label">Minimal Pendidikan<span class="titik-logo">*</span></label>
                                                    <select class="form-control" name="minimal_pendidikan">
                                                        <option value="" hidden>Pilih Minimal Pendidikan</option>
                                                        <option value="S3" @if(old('minimal_pendidikan') == 'S3')selected @endif>S3</option>
                                                        <option value="S2" @if(old('minimal_pendidikan') == 'S2')selected @endif>S2</option>
                                                        <option value="S1 / D4" @if(old('minimal_pendidikan') == 'S1 / D4')selected @endif>S1 / D4</option>
                                                        <option value="D3" @if(old('minimal_pendidikan') == 'D3')selected @endif>D3</option>
                                                        <option value="SMA / SMK" @if(old('minimal_pendidikan') == 'SMA / SMK')selected @endif>SMA / SMK</option>
                                                        <option value="SMP" @if(old('minimal_pendidikan') == 'SMP')selected @endif>SMP</option>
                                                        <option value="SD" @if(old('minimal_pendidikan') == 'SD')selected @endif>SD</option>
                                                    </select>
                                                    @error('minimal_pendidikan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pengalaman" class="form-control-label">Pengalaman (Tahun)<span class="titik-logo">*</span></label>
                                                    <select class="form-control" name="pengalaman">
                                                        <option value="" hidden>Pilih Minimal Tahun Pengalaman Kerja</option>
                                                        <option value="Fresh Graduate" @if(old('pengalaman') == 'Fresh Graduate')selected @endif>Fresh Graduate</option>
                                                        <option value="1 - 2" @if(old('pengalaman') == '1 - 2')selected @endif>1 - 2</option>
                                                        <option value="3 - 5" @if(old('pengalaman') == '3 - 5')selected @endif>3 - 5</option>
                                                        <option value="> 5" @if(old('pengalaman') == '> 5')selected @endif>> 5</option>
                                                    </select>
                                                    @error('pengalaman') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="jurusan_pendidikan_terakhir" class="form-control-label">Jurusan Pendidikan Terakhir<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="jurusan_pendidikan_terakhir" value="{{ old('jurusan_pendidikan_terakhir') }}" placeholder="Jurusan Pendidikan Terakhir">
                                                    @error('jurusan_pendidikan_terakhir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="rentang_usia" class="form-control-label">Rentang Usia (Tahun)<span class="titik-logo">*</span></label>
                                                    <input class="form-control" type="text" name="rentang_usia" value="{{ old('rentang_usia') }}" placeholder="Rentang usia minimal-maksimal">
                                                    @error('rentang_usia') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="bahasa" class="form-control-label">Bahasa<span class="titik-logo">*</span></label>
                                                </div>
                                                <div class="form-group" style="margin-top:-15px;">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox1" value="Bahasa Indonesia">
                                                        <label class="form-check-label" for="inlineCheckbox1">Bahasa Indonesia</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox2" value="Inggris">
                                                        <label class="form-check-label" for="inlineCheckbox2">Inggris</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="bahasa[]" type="checkbox" id="inlineCheckbox3" value="Mandarin">
                                                        <label class="form-check-label" for="inlineCheckbox3">Mandarin</label>
                                                    </div>
                                                    @error('bahasa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <hr class="horizontal dark mt-3">
                                                <h6 class="text-capitalize mt-3">Persyaratan Khusus</h6>
                                                <p>Masukkan persyaratan khusus dan requirement yang kamu butuhkan, kemudian pilih prioritasnya.</p>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="keterampilan_teknis" class="form-control-label">Keterampilan Teknis / Hard Skill <span class="titik-logo">*</span></label>
                                                    <div class="table-responsive">  
                                                        <table class="table table-bordered" id="dynamic_field_keterampilan_teknis">  
                                                            <tr>  
                                                                <td><input type="text" name="keterampilan_teknis[]" placeholder="Contoh: Python" class="form-control" required/></td>   
                                                                <td><select class="form-control" name="prioritas_keterampilan_teknis[]" required>
                                                                    <option value="" hidden>Pilih Prioritas</option>
                                                                    <option value="4" @if(old('prioritas_keterampilan_teknis') == '4')selected @endif>Sangat Penting</option>
                                                                    <option value="3" @if(old('prioritas_keterampilan_teknis') == '3')selected @endif>Penting</option>
                                                                    <option value="2" @if(old('prioritas_keterampilan_teknis') == '2')selected @endif>Regular</option>
                                                                    <option value="1" @if(old('prioritas_keterampilan_teknis') == '1')selected @endif>Menambah Value</option>
                                                                </select></td>
                                                                <td><button type="button" name="add_keterampilan_teknis" id="add_keterampilan_teknis" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>  
                                                            </tr>  
                                                        </table>  
                                                    </div>
                                                    @error('keterampilan_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    @error('prioritas_keterampilan_teknis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="keterampilan_non_teknis" class="form-control-label">Keterampilan Non Teknis / Soft Skill <span class="titik-logo">*</span></label>
                                                    <div class="table-responsive">  
                                                        <table class="table table-bordered" id="dynamic_field_keterampilan_non_teknis">  
                                                            <tr>  
                                                                <td><input type="text" name="keterampilan_non_teknis[]" placeholder="Contoh: Kreatif" class="form-control" required/></td>   
                                                                <td><select class="form-control" name="prioritas_keterampilan_non_teknis[]" required>
                                                                    <option value="" hidden>Pilih Prioritas</option>
                                                                    <option value="4" @if(old('prioritas_keterampilan_non_teknis') == '4')selected @endif>Sangat Penting</option>
                                                                    <option value="3" @if(old('prioritas_keterampilan_non_teknis') == '3')selected @endif>Penting</option>
                                                                    <option value="2" @if(old('prioritas_keterampilan_non_teknis') == '2')selected @endif>Regular</option>
                                                                    <option value="1" @if(old('prioritas_keterampilan_non_teknis') == '1')selected @endif>Menambah Value</option>
                                                                </select></td>
                                                                <td><button type="button" name="add_keterampilan_non_teknis" id="add_keterampilan_non_teknis" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>  
                                                            </tr>  
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
                                                        <table class="table table-bordered" id="dynamic_field_sertifikasi">  
                                                            <tr>  
                                                                <td><input type="text" name="sertifikasi[]" placeholder="Contoh: CCNA" class="form-control" /></td>   
                                                                <td><select class="form-control" name="prioritas_sertifikasi[]">
                                                                    <option value="" hidden>Pilih Prioritas</option>
                                                                    <option value="4" @if(old('prioritas_sertifikasi') == '4')selected @endif>Sangat Penting</option>
                                                                    <option value="3" @if(old('prioritas_sertifikasi') == '3')selected @endif>Penting</option>
                                                                    <option value="2" @if(old('prioritas_sertifikasi') == '2')selected @endif>Regular</option>
                                                                    <option value="1" @if(old('prioritas_sertifikasi') == '1')selected @endif>Menambah Value</option>
                                                                </select></td>
                                                                <td><button type="button" name="add_sertifikasi" id="add_sertifikasi" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>  
                                                            </tr>  
                                                        </table>  
                                                    </div>
                                                    @error('sertifikasi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                    @error('prioritas_sertifikasi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                                </div>
                                            </div>
                                    </div>
                                        <div class="card-footer pb-0">
                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-primary btn-lg ms-auto" style="margin-right: -22px">Selanjutnya 
                                                <i class="fa fa-forward" style="font-size: 15px; margin-left: 5px"></i></button>
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
        $(document).ready(function(){      
        var i=1;  


        $('#add_keterampilan_teknis').click(function(){  
            i++;  
            $('#dynamic_field_keterampilan_teknis').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="keterampilan_teknis[]" placeholder="Contoh: SQL" class="form-control" /></td>   \
                                                                <td><select class="form-control" name="prioritas_keterampilan_teknis[]"> \
                                                                    <option value="" hidden>Pilih Prioritas</option> \
                                                                    <option value="4" @if(old("prioritas_keterampilan_teknis") == "4")selected @endif>Sangat Penting</option> \
                                                                    <option value="3" @if(old("prioritas_keterampilan_teknis") == "3")selected @endif>Penting</option> \
                                                                    <option value="2" @if(old("prioritas_keterampilan_teknis") == "2")selected @endif>Regular</option> \
                                                                    <option value="1" @if(old("prioritas_keterampilan_teknis") == "1")selected @endif>Menambah Value</option> \
                                                                </select></td> \
                                                                <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });
        
        $('#add_keterampilan_non_teknis').click(function(){  
            i++;  
            $('#dynamic_field_keterampilan_non_teknis').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="keterampilan_non_teknis[]" placeholder="Contoh: Inovatif" class="form-control" /></td>   \
                                                                <td><select class="form-control" name="prioritas_keterampilan_non_teknis[]"> \
                                                                    <option value="" hidden>Pilih Prioritas</option> \
                                                                    <option value="4" @if(old("prioritas_keterampilan_non_teknis") == "4")selected @endif>Sangat Penting</option> \
                                                                    <option value="3" @if(old("prioritas_keterampilan_non_teknis") == "3")selected @endif>Penting</option> \
                                                                    <option value="2" @if(old("prioritas_keterampilan_non_teknis") == "2")selected @endif>Regular</option> \
                                                                    <option value="1" @if(old("prioritas_keterampilan_non_teknis") == "1")selected @endif>Menambah Value</option> \
                                                                </select></td> \
                                                                <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });

        $('#add_sertifikasi').click(function(){  
            i++;  
            $('#dynamic_field_sertifikasi').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="sertifikasi[]" placeholder="Contoh: Oracle" class="form-control" /></td>   \
                                                                <td><select class="form-control" name="prioritas_sertifikasi[]"> \
                                                                    <option value="" hidden>Pilih Prioritas</option> \
                                                                    <option value="4" @if(old("prioritas_sertifikasi") == "4")selected @endif>Sangat Penting</option> \
                                                                    <option value="3" @if(old("prioritas_sertifikasi") == "3")selected @endif>Penting</option> \
                                                                    <option value="2" @if(old("prioritas_sertifikasi") == "2")selected @endif>Regular</option> \
                                                                    <option value="1" @if(old("prioritas_sertifikasi") == "1")selected @endif>Menambah Value</option> \
                                                                </select></td> \
                                                                <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });
    });


        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });  
    </script>
@endsection