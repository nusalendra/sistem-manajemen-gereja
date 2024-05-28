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
                                data-bs-target="#riwayat" aria-controls="riwayat" aria-selected="false">Riwayat</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#akun" aria-controls="akun" aria-selected="false">Akun</button>
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
                                <label class="col-sm-10 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nama_lengkap }}</label>
                            </div>
                            {{-- Jenis Kelamin --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <label class="col-sm-10 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->jenis_kelamin }}</label>
                            </div>
                            {{-- Tanggal Lahir --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <label class="col-sm-10 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</label>
                            </div>
                            {{-- Umur --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Umur</label>
                            <div class="col-sm-10">
                                <label class="col-sm-10 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->umur }} Tahun</label>
                            </div>
                            {{-- Alamat --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Alamat</label>
                            <div class="col-sm-10">
                                <label class="col-sm-10 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->alamat }}</label>
                            </div>
                            {{-- NIK --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">NIK</label>
                            <div class="col-sm-10">
                                <label class="col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->NIK }}</label>
                            </div>
                            {{-- Nama Ayah --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ayah</label>
                            <div class="col-sm-10">
                                <label class="col-sm-10 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nama_ayah }}</label>
                            </div>
                            {{-- Nama Ibu --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ibu</label>
                            <div class="col-sm-10">
                                <label class="col-sm-10 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nama_ibu }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade mt-2" id="riwayat" role="tabpanel">
                        <div class="row mb-3">
                            <div>
                                <h5 class="mb-2 fw-semibold">Riwayat Menikah</h5>
                            </div>
                            @forelse ($menikah as $index => $item)
                                {{-- Nama Pasangan --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Pasangan</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $item->nama_pasangan }}</label>
                                </div>
                                {{-- Tanggal Lahir Pasangan --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Lahir
                                    Pasangan</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ \Carbon\Carbon::parse($item->tanggal_lahir_pasangan)->translatedFormat('d F Y') }}</label>
                                </div>
                                {{-- Umur Pasangan --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Umur Pasangan</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $item->umur_pasangan }} Tahun</label>
                                </div>
                                {{-- Nomor Baptis Pasangan --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis
                                    Pasangan</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $item->nomor_baptis_pasangan }}</label>
                                </div>
                                {{-- Tanggal Pernikahan --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal
                                    Pernikahan</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ \Carbon\Carbon::parse($item->tanggal_pernikahan)->translatedFormat('d F Y') }}</label>
                                </div>
                                {{-- Nama Ayah Pasangan --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ayah
                                    Pasangan</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $item->nama_ayah_pasangan }}</label>
                                </div>
                                {{-- Nama Ibu Pasangan --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Ibu
                                    Pasangan</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $item->nama_ibu_pasangan }}</label>
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
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ \Carbon\Carbon::parse($data->baptis->tanggal_baptis)->translatedFormat('d F Y') }}</label>
                                </div>
                                {{-- Nomor Baptis --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $data->baptis->nomor_baptis }}</label>
                                </div>
                                {{-- Status Baptis --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Status Baptis</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
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
                            @if ($data->sidi)
                                {{-- Gereja Yang Membaptis --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Gereja Yang
                                    Membaptis</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $data->sidi->gereja_yang_membaptis }}</label>
                                </div>
                                {{-- Tanggal Sidi --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Sidi</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ \Carbon\Carbon::parse($data->sidi->tanggal_sidi)->translatedFormat('d F Y') }}</label>
                                </div>
                                {{-- Status Sidi --}}
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Status Sidi</label>
                                <div class="col-sm-10">
                                    <label class="col-sm-10 col-form-label fw-bold text-dark"
                                        for="basic-default-name">{{ $data->sidi->status_sidi }}</label>
                                </div>
                            @else
                                <p class="col-sm-10">Tidak ada data riwayat sidi</p>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="akun" role="tabpanel">
                        <div class="row mt-2 mb-3">
                            <div>
                                <h5 class="mb-2 fw-semibold">Akun Jemaat</h5>
                            </div>
                            {{-- Username --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
                            <div class="col-sm-10">
                                <label class="col-sm-10 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->user->username }}</label>
                            </div>
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
                            <div class="col-sm-10">
                                <label class="col-sm-10 col-form-label fw-bold text-danger"
                                    for="basic-default-name">Password Tidak
                                    Ditampilkan</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
