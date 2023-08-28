<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}"
            target="_blank">
            <h4 class="font-weight-bolder" style="margin-left: 10px" >Findajob<span class="titik-logo">.</span></h4>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role == "Pencari Kerja")
                <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'lowongan.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'lowongan.show' ? 'active' : '' }}" href="{{ route('lowongan.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-search text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Cari Lowongan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'penyedia-kerja.index' ? 'active' : '' }}" href="{{ route('penyedia-kerja.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-building text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Info Penyedia Kerja</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{  Route::currentRouteName() == 'riwayat-lamaran.index' ? 'active' : '' }}" href="{{ route('riwayat-lamaran.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Riwayat Lamaran</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Portofolio</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{  Route::currentRouteName() == 'daftar-riwayat-hidup.index' ? 'active' : '' }} {{  Route::currentRouteName() == 'daftar-riwayat-hidup.edit' ? 'active' : '' }}" href="{{ route('daftar-riwayat-hidup.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-file text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Daftar Riwayat Hidup</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'sertifikasi.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'sertifikasi.show' ? 'active' : '' }} {{ Route::currentRouteName() == 'sertifikasi.edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'SE.file' ? 'active' : '' }}" href="{{ route('sertifikasi.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-id-card-o text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Sertifikasi</span>
                        </a>
                    </li>        
            @endif

            @if (Auth::user()->role == "Penyedia Kerja")
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'kelola-lowongan.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'kelola-lowongan.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'lowongan.show' ? 'active' : '' }} {{ Route::currentRouteName() == 'lowongan.edit' ? 'active' : '' }}" href="{{ route('kelola-lowongan.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-pencil text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kelola Lowongan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'pencari-kerja.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'pencari-kerja.show' ? 'active' : '' }}" href="{{ route('pencari-kerja.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Info Pencari Kerja</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{  Route::currentRouteName() == 'lihat-pelamar.index' ? 'active' : '' }} {{  Route::currentRouteName() == 'lihat-pelamar.show' ? 'active' : '' }}" href="{{ route('lihat-pelamar.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-inbox text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Lihat Pelamar</span>
                    </a>
                </li>
            @endif
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Akun</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profil' ? 'active' : '' }}" href="{{ route('profil') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'logout' ? 'active' : '' }}" href="{{ route('logout') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-sign-out text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Log Out</span>
                </a>
            </li>
        </ul>              
        
    </div>
</aside>
