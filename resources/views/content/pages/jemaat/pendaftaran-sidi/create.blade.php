@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Pendaftaran Menikah')

@section('content')

    <div class="row">
        <div class="card-header">
            <h5 class="mb-2 fw-bold bg-primary text-white p-2 rounded shadow-lg">Pendaftaran Sidi</h5>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div>
                    <h5 class="mb-4 fw-semibold">Identitas Anda</h5>
                </div>
                <div class="d-flex">
                    <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap"
                            value="{{ $data->nama_lengkap }}" readonly />
                        <label for="nama">Nama lengkap</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Jenis Kelamin"
                            value="{{ $data->jenis_kelamin }}" readonly />
                        <label for="nama">Jenis Kelamin</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                        <input type="text" name="umur" class="form-control" id="umur" placeholder="Umur"
                            value="{{ $data->umur }}" readonly />
                        <label for="umur">Umur</label>
                    </div>
                    @if ($data->baptis)
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nomor_baptis" class="form-control" id="nomor_baptis"
                                placeholder="nomor_baptis" value="{{ $data->baptis->nomor_baptis }}" readonly />
                            <label for="nomor_baptis">Nomor Baptis</label>
                        </div>
                    @else
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nomor_baptis" class="form-control" id="nomor_baptis"
                                placeholder="Nomor Baptis Tidak Ada" readonly />
                            <label for="nomor_baptis">Nomor Baptis</label>
                        </div>
                    @endif
                </div>
                <div class="d-flex">
                    <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                        <input type="text" name="nama_ayah" class="form-control" id="nama_ayah"
                            placeholder="Masukkan Nama Ayah" value="{{ $data->nama_ayah }}" readonly />
                        <label for="nama_ayah">Nama Ayah</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                        <input type="text" name="nama_ibu" class="form-control" id="nama_ibu"
                            placeholder="Masukkan Nama Ibu" value="{{ $data->nama_ibu }}" readonly />
                        <label for="nama_ibu">Nama Ibu</label>
                    </div>
                </div>
                <form id="pendaftaranSidi" action="/pendaftaran-sidi" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->jemaat->id }}" name="jemaat_id">
                    <div>
                        <h5 class="mb-4 fw-semibold">Menentukkan Gereja yang membaptis & tanggal sidi</h5>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="gereja_yang_membaptis" class="form-control"
                                id="gereja_yang_membaptis" placeholder="Masukkan Nama Gereja" required />
                            <label for="gereja_yang_membaptis">Nama Gereja Yang Membaptis <span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="date" name="tanggal_sidi" class="form-control" id="tanggal_sidi"
                                placeholder="Masukkan Tanggal Pernikahan" required />
                            <label for="tanggal_sidi">Tanggal Sidi <span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('pendaftaranSidi').addEventListener('submit', function(event) {
            event.preventDefault();

            var jemaat_id = document.querySelector('input[name="jemaat_id"]').value;

            fetch('/cek-status-sidi', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        jemaat_id: jemaat_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'Belum Baptis') {
                        Swal.fire({
                            title: 'Gagal Mendaftar',
                            text: 'Anda belum baptis. Tidak dapat melakukan Pendaftaran Sidi',
                            icon: 'error'
                        });
                    } else if (data.status === 'Sudah Sidi') {
                        Swal.fire({
                            title: 'Gagal Mendaftar',
                            text: 'Anda sudah sidi. Tidak dapat mendaftar lagi.',
                            icon: 'error'
                        });
                    } else if (data.status === 'Menunggu Konfirmasi') {
                        Swal.fire({
                            title: 'Gagal Mendaftar',
                            text: 'Pendaftaran Anda sedang menunggu konfirmasi. Tidak dapat mendaftar lagi.',
                            icon: 'warning'
                        });
                    } else {
                        Swal.fire({
                            title: 'Pendaftaran Sidi',
                            text: "Pilih Lanjutkan untuk mengirim pendaftaran Sidi",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Lanjutkan'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Pendaftaran Berhasil',
                                    text: 'Pendaftaran Sidi sudah dikirim. Silahkan untuk menunggu konfirmasi',
                                    icon: 'success'
                                }).then(() => {
                                    event.target.submit();
                                });
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
    <script>
        document.getElementById('pendaftaranSidi').addEventListener('submit', function(event) {
            event.preventDefault();


        });
    </script>
@endsection
