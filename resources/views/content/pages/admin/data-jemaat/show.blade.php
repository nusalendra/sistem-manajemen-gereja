@extends('layouts/contentNavbarLayout')

@section('title', ' Detail Jemaat')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Identitas Jemaat</h5>
                </div>
                <div class="card-body">
                    <form>
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
                                    for="basic-default-name">{{ $data->tanggal_lahir }}</label>
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
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->NIK }}</label>
                            </div>
                            {{-- Nomor Baptis --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor Baptis</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->nomor_baptis }}</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div>
                                <h5 class="mb-4 fw-semibold">Nama Orang Tua</h5>
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
                        <div class="row mb-3">
                            <div>
                                <h5 class="mb-4 fw-semibold">Status</h5>
                            </div>
                            {{-- Status Jemaat --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Status Jemaat</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->status_jemaat }}</label>
                            </div>
                            {{-- Status Menikah --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Status Menikah</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->status_menikah }}</label>
                            </div>
                            {{-- Status Baptis --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Status Baptis</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->status_baptis }}</label>
                            </div>
                            {{-- Status Sidi --}}
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Status Sidi</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label fw-bold text-dark"
                                    for="basic-default-name">{{ $data->status_sidi }}</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
