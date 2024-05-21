@extends('layouts/contentNavbarLayout')

@section('title', ' Identitas Calon Pasangan')

@section('content')
    <div class="row">
        <div class="card-header">
            <h5 class="mb-2 fw-bold bg-primary text-white p-2 rounded">Identitas Calon Pasangan</h5>
        </div>
        <div class="card mb-4">
            <div class="card-header p-0">
                <div class="nav-align-top">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#identitas-jemaat" aria-controls="identitas-jemaat"
                                aria-selected="true">Calon Pasangan 1</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-top-profile" aria-controls="navs-top-profile"
                                aria-selected="false">Calon Pasangan 2</button>
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
                                    for="basic-default-name">{{ $data->jemaat->nama_lengkap }}</label>
                            </div>
                            {{-- Jenis Kelamin --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->jemaat->jenis_kelamin }}</label>
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
                                    for="basic-default-name">{{ $data->jemaat->umur }}</label>
                            </div>
                            {{-- Nomor Baptis --}}
                            @if ($data->jemaat->baptis)
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $data->jemaat->baptis->nomor_baptis }}</label>
                                </div>
                            @else
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-2 col-form-label fw-bold text-danger"
                                        for="basic-default-name">Nomor
                                        Baptis Tidak Ada</label>
                                </div>
                            @endif
                            {{-- Nama Ayah --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ayah</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->jemaat->nama_ayah }}</label>
                            </div>
                            {{-- Nama Ibu --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ibu</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->jemaat->nama_ibu }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                        <div class="row mb-3">
                            {{-- Nama Pasangan --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nama_pasangan }}</label>
                            </div>
                            {{-- Jenis Kelamin --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->jenis_kelamin_pasangan }}</label>
                            </div>
                            {{-- Tanggal Lahir Pasangan --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ \Carbon\Carbon::parse($data->tanggal_lahir_pasangan)->translatedFormat('d F Y') }}</label>
                            </div>
                            {{-- Umur Pasangan --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Umur</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->umur_pasangan }}</label>
                            </div>
                            {{-- Nomor Baptis Pasangan --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nomor_baptis_pasangan }}</label>
                            </div>
                            {{-- Nama Ayah Pasangan --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ayah</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nama_ayah_pasangan }}</label>
                            </div>
                            {{-- Nama Ibu Pasangan --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ibu</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nama_ibu_pasangan }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="identitas-jemaat" role="tabpanel">
                        <div>
                            <h5 class="fw-bold">Rencana Tanggal Pernikahan</h5>
                        </div>
                        <div class="row mb-3">
                            {{-- Tanggal Pernikahan --}}
                            <label class="col-sm-3 col-form-label" for="basic-default-company">Direncanakan Pada
                                Tanggal</label>
                            <div class="col-sm-9">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ \Carbon\Carbon::parse($data->tanggal_pernikahan)->translatedFormat('d F Y') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <form action="/kelola-data-menikah/{{ $data->id }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="d-flex py-1 justify-content-center">
                                <div class="me-2 d-flex flex-column justify-content-center">
                                    <button type="submit" class="btn btn-info" name="action"
                                        value="konfirmasi_pengajuan_menikah">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check2-circle me-1" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                            <path
                                                d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                        </svg>
                                        Konfirmasi Pengajuan Menikah
                                    </button>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <button type="submit" class="btn btn-danger" name="action"
                                        value="tolak_pengajuan_menikah">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-circle me-1" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg>
                                        Tolak Pengajuan Menikah
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
