@php
    $containerNav = $containerNav ?? 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';

@endphp

<!-- Navbar -->
@if (isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-navbar-theme"
        id="layout-navbar">
@endif
@if (isset($navbarDetached) && $navbarDetached == '')
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="{{ $containerNav }}">
@endif

<!--  Brand demo (display only for navbar-full and hide on below xl) -->
@if (isset($navbarFull))
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{ url('/') }}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
                @include('_partials.macros', ['height' => 20])
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-1">{{ config('variables.templateName') }}</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>
@endif

<!-- ! Not required for layout-without-menu -->
@if (!isset($navbarHideToggle))
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ? ' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="mdi mdi-menu mdi-24px"></i>
        </a>
    </div>
@endif

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="app-brand justify-content-center">
            @if (Auth::user()->role == 'Admin')
                {{-- <img src="logo-transparan.png" alt="" width="50"> --}}
                <h5 class="mt-3 text-dark fw-bold">Gereja Huria Kristen Batak Protestan (HKBP)</h5>
            @elseif(Auth::user()->role == 'Jemaat')
                <div class="navbar-nav align-items-center">
                    <div class="app-brand justify-content-center">
                        <nav class="navbar navbar-example navbar-expand-lg ">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbar-ex-2" aria-controls="navbar-ex-2" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbar-ex-2">
                                    <div class="navbar-nav me-auto">
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->routeIs('beranda') ? 'active text-primary' : 'text-dark' }} fw-semibold"
                                                href="{{ route('beranda') }}">Beranda</a>
                                        </li>
                                        @php
                                            $jemaat = Auth::check() ? Auth::user()->jemaat : null;
                                            $dataJemaat =
                                                $jemaat &&
                                                $jemaat->nama_lengkap &&
                                                $jemaat->jenis_kelamin &&
                                                $jemaat->alamat &&
                                                $jemaat->tanggal_lahir &&
                                                $jemaat->umur &&
                                                $jemaat->nama_ayah &&
                                                $jemaat->nama_ibu &&
                                                $jemaat->NIK;
                                        @endphp

                                        @if ($dataJemaat)
                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('pendaftaran-menikah') ? 'active text-primary' : 'text-dark' }} fw-semibold"
                                                    href="{{ route('pendaftaran-menikah') }}">Pendaftaran Menikah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('pendaftaran-baptis') ? 'active text-primary' : 'text-dark' }} fw-semibold"
                                                    href="{{ route('pendaftaran-baptis') }}">Pendaftaran Baptis</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->routeIs('pendaftaran-sidi') ? 'active text-primary' : 'text-dark' }} fw-semibold"
                                                    href="{{ route('pendaftaran-sidi') }}">Pendaftaran Sidi</a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link text-dark fw-semibold incomplete-data-link"
                                                    href="#">Pendaftaran Menikah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-dark fw-semibold incomplete-data-link"
                                                    href="#">Pendaftaran Baptis</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-dark fw-semibold incomplete-data-link"
                                                    href="#">Pendaftaran Sidi</a>
                                            </li>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- /Search -->
    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                <li>
                    <a class="dropdown-item pb-2 mb-1" href="javascript:void(0);">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-2 pe-1">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                        class="w-px-40 h-auto rounded-circle">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">{{ Auth::user()->username }}</h6>
                                <small class="text-muted">{{ Auth::user()->role }}</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider my-1"></div>
                </li>
                @if (Auth::user()->role == 'Jemaat')
                    <li>
                        <a class="dropdown-item" href="/profile">
                            <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                            <span class="align-middle">Profil Saya</span>
                        </a>
                    </li>
                @endif
                <li>
                    <div class="dropdown-divider my-1"></div>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class='mdi mdi-power me-1 mdi-20px'></i>
                            <span class="align-middle">Log Out</span>
                        </button>
                    </form>
                    {{-- <a class="dropdown-item" href="javascript:void(0);">
                    </a> --}}
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.incomplete-data-link').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Identitas Belum Lengkap',
                    text: 'Silakan lengkapi identitas anda terlebih dahulu.',
                    footer: '<a href="{{ route('profile') }}">Klik untuk menuju halaman profile</a>'
                });
            });
        });
    });
</script>

@if (!isset($navbarDetached))
    </div>
@endif
</nav>
<!-- / Navbar -->
