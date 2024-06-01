@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Beranda')

@section('content')
    <div class="container ">
        <!-- Warta Jemaat Section -->
        <div class="card mb-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mt-3 me-4">
                <div class="d-flex align-items-center ms-3">
                    <img src="/logo-transparan.png" alt="Logo HKBP" width="75" height="75" class="me-3">
                    <div class="mt-3">
                        <h4 class="mb-0 fw-bold">WARTA JEMAAT</h4>
                        <h6 class="text-muted">GEREJA HURIA KRISTEN BATAK PROTESTAN</h6>
                    </div>
                </div>
                <p class="text-end fw-semibold"><strong>Tanggal </strong>
                    {{ \Carbon\Carbon::parse($wartaJemaat->tanggal)->translatedFormat('d F Y') }}</p>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h4 class="fw-bold">{{ $wartaJemaat->judul }}</h4>
                    <h5 class="fw-semibold">{{ $wartaJemaat->ayat }}</h5>
                </div>
                <div class="mt-5 mx-2" style="text-align: justify; color: #000; font-weight: 500; font-size: 16px;">
                    <p>{!! $wartaJemaat->isi !!}</p>
                </div>
                <p class="text-end text-dark fw-bold mt-4">({{ $wartaJemaat->nama_khutbah }})</p>
            </div>
        </div>

        <!-- Pelayanan Sepekan Section -->
        <div class="card mb-4 shadow-sm">
            <div class="card mb-4 shadow-sm">
                <div class="card-header mt-3">
                    <h4 class="mb-0 fw-bold text-center">PELAYANAN SEPEKAN</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold text-decoration-underline">Selasa, 28 Mei 2024</h6>
                            <div class="row fw-semibold text-dark">
                                <div class="col-5 mb-0">Persk Wanita</div>
                                <div class="col-7 mb-0">Pkl. 17:00 WIB</div>
                            </div>
                            <div class="row text-dark">
                                <div class="col-5 mb-0">Firman</div>
                                <div class="col-7 mb-0">: Ibu Mikha</div>
                            </div>
                            <div class="row text-dark">
                                <div class="col-5 mb-0">Liturgos</div>
                                <div class="col-7 mb-0">: Ibu Yani</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold text-decoration-underline">Selasa, 28 Mei 2024</h6>
                            <div class="row fw-semibold text-dark">
                                <div class="col-5 mb-0">Persk Wanita</div>
                                <div class="col-7 mb-0">Pkl. 17:00 WIB</div>
                            </div>
                            <div class="row text-dark">
                                <div class="col-5 mb-0">Acara</div>
                                <div class="col-7 mb-0">: Persekutuan</div>
                            </div>
                            <div class="row text-dark">
                                <div class="col-5 mb-0">Tempat</div>
                                <div class="col-7 mb-0">: Gereja</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengumuman Section -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h2 class="mb-0">Pengumuman</h2>
            </div>
            <div class="card-body">
                <h4>Judul: Kebaktian Umum</h4>
                <p><strong>Isi:</strong> Kebaktian umum akan diadakan pada hari Minggu, 2 Juni 2024, pukul 10:00 di gereja
                    utama.</p>
            </div>
        </div>
    </div>

@endsection
