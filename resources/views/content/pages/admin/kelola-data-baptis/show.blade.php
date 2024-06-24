@extends('layouts/contentNavbarLayout')

@section('title', 'Detail Data Baptis')

@section('content')

    <div class="row">
        <div class="card-header">
            <h5 class="mb-2 fw-bold bg-primary text-white p-2 rounded shadow-lg">Detail Jemaat Baptis</h5>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div>
                    <h5 class="mb-4 fw-semibold">Identitas Jemaat</h5>
                </div>
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
                    @if ($data->status_baptis == 'Sudah Baptis')
                        <div>
                            <h5 class="mt-4 mb-3 fw-semibold">Identitas Baptis</h5>
                        </div>
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Baptis</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                for="basic-default-name">{{ \Carbon\Carbon::parse($data->tanggal_baptis)->translatedFormat('d F Y') }}</label>
                        </div>
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                for="basic-default-name">{{ $data->nomor_baptis }}</label>
                        </div>
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Status Baptis</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label fw-bold text-dark"
                                for="basic-default-name">{{ $data->status_baptis }}</label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card mb-4">
            @if ($data->status_baptis == 'Menunggu Konfirmasi' || $data->status_baptis == 'Dikonfirmasi')
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="identitas-jemaat" role="tabpanel">
                            <div>
                                <h5 class="fw-bold">Menentukkan Tanggal Baptis</h5>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-company">Ditentukkan Pada
                                    Tanggal</label>
                                <div class="col-sm-9">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ \Carbon\Carbon::parse($data->tanggal_baptis)->translatedFormat('d F Y') }}</label>
                                </div>
                            </div>
                        </div>
                        @if ($data->status_baptis == 'Menunggu Konfirmasi')
                            <div class="mt-3">
                                <form action="/kelola-data-baptis/{{ $data->id }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="d-flex py-1 justify-content-center">
                                        <div class="me-2 d-flex flex-column justify-content-center">
                                            <button type="submit" class="btn btn-primary" name="action"
                                                value="konfirmasi_baptis">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2-circle me-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                                    <path
                                                        d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                                </svg>
                                                Konfirmasi Baptis
                                            </button>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <button type="submit" class="btn btn-danger" name="action"
                                                value="tolak_baptis">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x-circle me-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                </svg>
                                                Tolak Baptis
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @elseif ($data->status_baptis == 'Dikonfirmasi')
                            <div>
                                <h5 class="fw-bold">Input Nomor Baptis & Sertifikat</h5>
                            </div>
                            <form action="/kelola-data-baptis/{{ $data->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <div class="d-flex">
                                        <div class="form-floating form-floating-outline mb-4 flex-fill">
                                            <input type="text" name="nomor_baptis" class="form-control"
                                                id="nomor_baptis" placeholder="Masukkan Nomor Baptis" required />
                                            <label for="nomor_baptis">Nomor Baptis <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                            <input type="text" name="nama_pendeta" class="form-control"
                                                id="nama_pendeta" placeholder="Masukkan Nomor Baptis" required />
                                            <label for="nama_pendeta">Nama Pendeta Yang Membaptis<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                            <input type="file" name="sertifikat" class="form-control" id="sertifikat"
                                                accept=".png, .jpg, .pdf" required />
                                            <label for="sertifikat">Sertifikat <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="d-flex py-1 justify-content-center">
                                        <div class="me-2 d-flex flex-column justify-content-center">
                                            <button type="submit" class="btn btn-primary" name="action"
                                                value="dikonfirmasi">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2-circle me-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                                    <path
                                                        d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                                </svg>
                                                Konfirmasi Sudah Baptis
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
