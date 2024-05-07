@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah Jemaat')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0 fw-semibold">Tambah Jemaat</h5>
                </div>
                <div class="card-body">
                    <form action="/data-jemaat" method="POST">
                        @csrf
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                placeholder="Masukkan Nama Lengkap" required />
                            <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                            <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="nomor_baptis" class="form-control" id="nomor_baptis"
                                placeholder="Masukkan Nomor Baptis (Opsional)" />
                            <label for="nomor_baptis">Nomor Baptis</label>
                        </div>
                        <div>
                            <h5 class="mb-4 fw-semibold">Tambah Akun</h5>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="username" class="form-control" id="username"
                                placeholder="Masukkan Username" required />
                            <label for="username">Username <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="password" name="password" id="password" class="form-control phone-mask"
                                placeholder="Masukkan Password" required />
                            <label for="password">Password <span class="text-danger">*</span></label>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
