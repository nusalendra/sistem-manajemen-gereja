@php
    $isMenu = true;
    $navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Profil Saya')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
                <li class="nav-item"><a class="nav-link active" href="/profile"><i
                            class="mdi mdi-account-outline mdi-20px me-1"></i>Profil Saya</a></li>
                <li class="nav-item"><a class="nav-link" href="/riwayat"><i class="mdi mdi-link mdi-20px me-1"></i>Riwayat</a>
                </li>
            </ul>
            <div class="card mb-4">
                <div class="card-body pt-2 mt-1">
                    <form id="formAccountSettings" action="/profile/{{ $user->id }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row mt-2 gy-4">
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap"
                                        value="{{ $data->nama_lengkap }}" autofocus placeholder="Tambahkan Nama Lengkap" />
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select name="jenis_kelamin" class="form-select" aria-label="Default select example"
                                        required>
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Pria" {{ $data->jenis_kelamin === 'Pria' ? 'selected' : '' }}>Pria
                                        </option>
                                        <option value="Wanita" {{ $data->jenis_kelamin === 'Wanita' ? 'selected' : '' }}>
                                            Wanita
                                        </option>
                                    </select>
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select name="kondisi_tubuh" class="form-select" aria-label="Default select example"
                                        required>
                                        <option selected disabled>Pilih Kondisi Tubuh</option>
                                        <option value="Normal" {{ $data->kondisi_tubuh === 'Normal' ? 'selected' : '' }}>
                                            Normal
                                        </option>
                                        <option value="Disabilitas"
                                            {{ $data->kondisi_tubuh === 'Disabilitas' ? 'selected' : '' }}>
                                            Disabilitas
                                        </option>
                                    </select>
                                    <label for="kondisi_tubuh">Kondisi Tubuh</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir"
                                        value="{{ $data->tempat_lahir }}" autofocus placeholder="Tambahkan Tempat Lahir" />
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ $data->tanggal_lahir }}" autofocus />
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="number" id="umur" name="umur"
                                        value="{{ $data->umur }}" autofocus placeholder="... Tahun" />
                                    <label for="umur">Umur</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="number" id="NIK" name="NIK"
                                        value="{{ $data->NIK }}" autofocus placeholder="Tambahkan NIK" />
                                    <label for="NIK">NIK</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="number" id="KK" name="KK"
                                        value="{{ $data->KK }}" autofocus
                                        placeholder="Tambahkan Nomor Kartu Keluarga (KK)" />
                                    <label for="KK">Nomor Kartu Keluarga (KK)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="number" id="nomor_handphone" name="nomor_handphone"
                                        value="{{ $data->nomor_handphone }}" autofocus
                                        placeholder="Tambahkan Nomor Handphone" />
                                    <label for="nomor_handphone">Nomor Handphone</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select name="golongan_darah" class="form-select" aria-label="Default select example"
                                        required>
                                        <option selected disabled>Pilih Golongan Darah</option>
                                        <option value="A" {{ $data->golongan_darah === 'A' ? 'selected' : '' }}>A
                                        </option>
                                        <option value="B" {{ $data->golongan_darah === 'B' ? 'selected' : '' }}>B
                                        </option>
                                        <option value="AB" {{ $data->golongan_darah === 'AB' ? 'selected' : '' }}>AB
                                        </option>
                                        <option value="O" {{ $data->golongan_darah === 'O' ? 'selected' : '' }}>O
                                        </option>
                                    </select>
                                    <label for="golongan_darah">Golongan Darah</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="pendidikan" name="pendidikan"
                                        value="{{ $data->pendidikan }}" autofocus
                                        placeholder="Tambahkan Pendidikan Terakhir" />
                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="pekerjaan" name="pekerjaan"
                                        value="{{ $data->pekerjaan }}" autofocus placeholder="Tambahkan Pekerjaan" />
                                    <label for="pekerjaan">Pekerjaan</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ $data->alamat }}" placeholder="Tambahkan Alamat" />
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="kabupaten" name="kabupaten"
                                        value="{{ $data->kabupaten }}" autofocus placeholder="Tambahkan Kabupaten" />
                                    <label for="kabupaten">Kabupaten</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="provinsi" name="provinsi"
                                        value="{{ $data->provinsi }}" autofocus placeholder="Tambahkan Provinsi" />
                                    <label for="provinsi">Provinsi</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                        value="{{ $data->nama_ayah }}" placeholder="Tambahkan Nama Ayah" />
                                    <label for="nama_ayah">Nama Ayah</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                        value="{{ $data->nama_ibu }}" placeholder="Tambahkan Nama Ibu" />
                                    <label for="nama_ibu">Nama Ibu</label>
                                </div>
                            </div>
                            <h5 class="fw-semibold">Akun</h5>
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="username" name="username"
                                        value="{{ $user->username }}" autofocus />
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="email" id="email" name="email"
                                        value="{{ $user->email }}" autofocus placeholder="Tambahkan Email" />
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="password" id="password" name="password" autofocus
                                        placeholder="Tambahkan Password Baru" />
                                    <label for="password">Password Baru</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
