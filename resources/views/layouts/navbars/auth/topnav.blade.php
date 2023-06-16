<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}" id="navbarBlur"
        data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $title }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav justify-content-end">
                @if (Auth::user()->role == "Pencari Kerja")
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="{{ route('lowongan.index') }}" class="nav-link text-white p-0">
                            Cari Lowongan
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="{{ route('info-penyedia-kerja.index') }}" class="nav-link text-white p-0">
                            Info Penyedia Kerja
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="{{ route('riwayat-lamaran.index') }}" class="nav-link text-white p-0">
                            Riwayat Lamaran
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role == "Penyedia Kerja")
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="{{ route('kelola-lowongan.index') }}" class="nav-link text-white p-0">
                            Kelola Lowongan
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="{{ route('info-penyedia-kerja.index') }}" class="nav-link text-white p-0">
                            Info Pencari Kerja
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="{{ route('lihat-pelamar.index') }}" class="nav-link text-white p-0">
                            Lihat Pelamar
                        </a>
                    </li>        
                @endif

                <li class="nav-item d-flex align-items-center">
                    <div class="vr" style="height: 40px; margin-right: 15px; color:white"></div>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"data-bs-toggle="dropdown" aria-expanded="false">
                        <div>
                            <i class="far fa-user"></i>
                            {{ Auth::user()->name }}
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a href="{{ route('profil') }}" class="dropdown-item border-radius-md">
                                <i class="fa fa-user"></i>
                                <span class="d-sm-inline d-none ms-2">Edit Profil</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item border-radius-md">
                                    <i class="fa fa-sign-out"></i>
                                    <span class="d-sm-inline d-none ms-2">Log out</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
