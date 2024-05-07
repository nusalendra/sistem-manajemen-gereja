@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah Warta Jemaat')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0 fw-semibold">Tambah Warta Jemaat</h5>
                </div>
                <div class="card-body">
                    <form action="/warta-jemaat" method="POST">
                        @csrf
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="judul" class="form-control" id="judul"
                                placeholder="Masukkan Judul" required />
                            <label for="judul">Judul <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="ayat" class="form-control" id="ayat"
                                placeholder="Masukkan Ayat" required />
                            <label for="ayat">Ayat <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="nama_khutbah" class="form-control" id="nama_khutbah"
                                placeholder="Masukkan Nama Khutbah" />
                            <label for="nama_khutbah">Nama Khutbah <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="hari" class="form-control" id="hari"
                                placeholder="Masukkan Hari" />
                            <label for="hari">Hari <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="time" name="jam" class="form-control" id="jam"
                                placeholder="Masukkan Jam" />
                            <label for="jam">Jam <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="tempat" class="form-control" id="tempat"
                                placeholder="Masukkan Nama Tempat" />
                            <label for="tempat">Nama Tempat <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="liturgos" class="form-control" id="liturgos"
                                placeholder="Masukkan Liturgos" />
                            <label for="liturgos">Liturgos <span class="text-danger">*</span></label>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
