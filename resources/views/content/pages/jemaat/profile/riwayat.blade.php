@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Riwayat')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
                <li class="nav-item"><a class="nav-link" href="/profile"><i
                            class="mdi mdi-account-outline mdi-20px me-1"></i>Profil Saya</a></li>
                <li class="nav-item"><a class="nav-link active" href="/riwayat"><i class="mdi mdi-link mdi-20px me-1"></i>
                        Riwayat</a></li>
            </ul>
            <div class="card mb-4">
                <div class="card-body pt-2 mt-1">
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="tab-pane fade show active mt-2" id="navs-top-profile" role="tabpanel">
                                <div class="row mb-3">
                                    <div>
                                        <h5 class="mb-2 fw-semibold">Riwayat Menikah</h5>
                                    </div>
                                    @if ($menikah)
                                        {{-- Nama Pasangan --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Nama
                                            Pasangan</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ $menikah->nama_pasangan }}</label>
                                        </div>
                                        {{-- Tanggal Lahir Pasangan --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Lahir
                                            Pasangan</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ \Carbon\Carbon::parse($menikah->tanggal_lahir_pasangan)->translatedFormat('d F Y') }}</label>
                                        </div>
                                        {{-- Umur Pasangan --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Umur
                                            Pasangan</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ $menikah->umur_pasangan }}</label>
                                        </div>
                                        {{-- Nomor Baptis Pasangan --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis
                                            Pasangan</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ $menikah->nomor_baptis_pasangan }}</label>
                                        </div>
                                        {{-- Tanggal Pernikahan --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal
                                            Pernikahan</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ \Carbon\Carbon::parse($menikah->tanggal_pernikahan)->translatedFormat('d F Y') }}</label>
                                        </div>
                                        {{-- Nama Ayah Pasangan --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ayah
                                            Pasangan</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ $menikah->nama_ayah_pasangan }}</label>
                                        </div>
                                        {{-- Nama Ibu Pasangan --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ibu
                                            Pasangan</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ $menikah->nama_ibu_pasangan }}</label>
                                        </div>
                                    @else
                                        <p class="col-sm-10">Tidak ada data riwayat menikah</p>
                                    @endif
                                </div>
                                <div class="row mt-2 mb-3">
                                    <div>
                                        <h5 class="mb-2 fw-semibold">Riwayat Baptis</h5>
                                    </div>
                                    @if ($data->baptis && $data->baptis->status_baptis == 'Sudah Baptis')
                                        {{-- Tanggal Baptis --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal
                                            Baptis</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ \Carbon\Carbon::parse($data->baptis->tanggal_baptis)->translatedFormat('d F Y') }}</label>
                                        </div>
                                        {{-- Nomor Baptis --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor
                                            Baptis</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ $data->baptis->nomor_baptis }}</label>
                                        </div>
                                        {{-- Status Baptis --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Status
                                            Baptis</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ $data->baptis->status_baptis }}</label>
                                        </div>
                                    @else
                                        <p class="col-sm-10">Tidak ada data riwayat baptis</p>
                                    @endif
                                </div>
                                <div class="row mt-2 mb-3">
                                    <div>
                                        <h5 class="mb-2 fw-semibold">Riwayat Sidi</h5>
                                    </div>
                                    @if ($data->sidi && $data->sidi->status_sidi == 'Sudah Sidi')
                                        {{-- Gereja Yang Membaptis --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Gereja Yang
                                            Membaptis</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ $data->sidi->gereja_yang_membaptis }}</label>
                                        </div>
                                        {{-- Tanggal Sidi --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal
                                            Sidi</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ \Carbon\Carbon::parse($data->sidi->tanggal_sidi)->translatedFormat('d F Y') }}</label>
                                        </div>
                                        {{-- Status Sidi --}}
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Status
                                            Sidi</label>
                                        <div class="col-sm-10">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                                for="basic-default-name">{{ $data->sidi->status_sidi }}</label>
                                        </div>
                                    @else
                                        <p class="col-sm-10">Tidak ada data riwayat sidi</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
