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
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="tanggal" class="form-control" id="tanggal"
                                    placeholder="Masukkan Tanggal Lahir" />
                                <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="judul" class="form-control" id="judul"
                                    placeholder="Masukkan Judul" />
                                <label for="judul">Judul <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="nama_khutbah" class="form-control" id="nama_khutbah"
                                    placeholder="Masukkan Nama Khutbah" />
                                <label for="nama_khutbah">Nama Khutbah <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="ayat" class="form-control" id="ayat"
                                    placeholder="Masukkan Ayat" />
                                <label for="ayat">Ayat <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="mx-2">
                            <label for="isi">Isi <span class="text-danger">*</span></label>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mt-2">
                                <input id="isi" type="hidden" name="isi" value="" />
                                <trix-editor input="isi" class="trix-content"></trix-editor>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/trix.umd.min.js') }}"></script>
@endsection
