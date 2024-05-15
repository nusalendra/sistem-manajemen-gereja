@extends('layouts/contentNavbarLayout')

@section('title', ' Detail Jemaat')

@section('content')
    <div class="row">
        <div class="card-header">
            <h5 class="mb-2 fw-bold bg-primary text-white p-2 rounded">Detail Jemaat</h5>
        </div>
        <div class="card mb-4">
            <div class="card-header p-0">
                <div class="nav-align-top">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#identitas-jemaat" aria-controls="identitas-jemaat"
                                aria-selected="true">Identitas Pribadi</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-top-profile" aria-controls="navs-top-profile"
                                aria-selected="false">Riwayat</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="identitas-jemaat" role="tabpanel">
                        <div class="row mb-3">
                            {{-- Nama Lengkap --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nama_lengkap }}</label>
                            </div>
                            {{-- Jenis Kelamin --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->jenis_kelamin }}</label>
                            </div>
                            {{-- Tanggal Lahir --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</label>
                            </div>
                            {{-- Umur --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Umur</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->umur }}</label>
                            </div>
                            {{-- Alamat --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Alamat</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->alamat }}</label>
                            </div>
                            {{-- NIK --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">NIK</label>
                            <div class="col-sm-10">
                                <label class="col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->NIK }}</label>
                            </div>
                            {{-- Nomor Baptis --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nomor_baptis }}</label>
                            </div>
                            {{-- Nama Ayah --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ayah</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nama_ayah }}</label>
                            </div>
                            {{-- Nama Ibu --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ibu</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nama_ibu }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade mt-2" id="navs-top-profile" role="tabpanel">
                        <div class="row mb-3">
                            <div>
                                <h5 class="mb-2 fw-semibold">Riwayat Menikah</h5>
                            </div>
                            @forelse ($data->menikah as $index => $menikah)
                                @if ($data->menikah->count() > 1)
                                    <h6 class="mt-3 fw-semibold">Pernikahan {{ $index + 1 }}</h6>
                                @endif
                                {{-- Nama Pasangan --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Pasangan</label>
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
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Umur Pasangan</label>
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
                            @empty
                                <p class="col-sm-10">Tidak ada data riwayat menikah</p>
                            @endforelse
                        </div>
                        <div class="row mt-2 mb-3">
                            <div>
                                <h5 class="mb-2 fw-semibold">Riwayat Baptis</h5>
                            </div>
                            @if ($data->baptis)
                                {{-- Tanggal Baptis --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Baptis</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ \Carbon\Carbon::parse($data->baptis->tanggal_baptis)->translatedFormat('d F Y') }}</label>
                                </div>
                                {{-- Nomor Baptis --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $data->nomor_baptis }}</label>
                                </div>
                                {{-- Status Baptis --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Status Baptis</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $data->status_baptis }}</label>
                                </div>
                            @else
                                <p class="col-sm-10">Tidak ada data riwayat baptis</p>
                            @endif
                        </div>
                        <div class="row mt-2 mb-3">
                            <div>
                                <h5 class="mb-2 fw-semibold">Riwayat Sidi</h5>
                            </div>
                            @if ($data->sidi)
                                {{-- Gereja Yang Membaptis --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Gereja Yang
                                    Membaptis</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $data->sidi->gereja_yang_membaptis }}</label>
                                </div>
                                {{-- Tanggal Sidi --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Sidi</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ \Carbon\Carbon::parse($data->sidi->tanggal_sidi)->translatedFormat('d F Y') }}</label>
                                </div>
                                {{-- Status Sidi --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Status Sidi</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $data->status_sidi }}</label>
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
@endsection
