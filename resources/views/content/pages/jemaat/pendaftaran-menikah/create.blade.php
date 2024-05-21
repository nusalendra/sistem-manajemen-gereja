@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Pendaftaran Menikah')

@section('content')

    <div class="row">
        <div class="card-header">
            <h5 class="mb-2 fw-bold bg-primary text-white p-2 rounded shadow-lg">Pendaftaran Menikah</h5>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                {{-- Data Menikah --}}
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
                    <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                        <input type="text" name="umur" class="form-control" id="umur" placeholder="Umur"
                            value="{{ $data->umur }}" readonly />
                        <label for="umur">Umur</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                        <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                            placeholder="Tanggal Lahir"
                            value="{{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}" readonly />
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                    </div>
                    @if ($data->baptis)
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nomor_baptis" class="form-control" id="nomor_baptis"
                                placeholder="Nomor Baptis" value="{{ $data->baptis->nomor_baptis }}" readonly />
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
                <div>
                    <h5 class="mb-4 fw-semibold">Identitas Pasangan</h5>
                </div>
                <form id="pendaftaranMenikah" action="/pendaftaran-menikah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->jemaat->id }}" name="jemaat_id">
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nama_pasangan" class="form-control" id="nama_pasangan"
                                placeholder="Masukkan Nama Lengkap Pasangan" required />
                            <label for="nama_pasangan">Nama lengkap Pasangan <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <select name="jenis_kelamin_pasangan" class="form-select" aria-label="Default select example"
                                required>
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                            <label for="jenis_kelamin_pasangan">Jenis Kelamin <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="umur_pasangan" class="form-control" id="umur_pasangan"
                                placeholder="... Tahun" />
                            <label for="umur_pasangan">Umur Pasangan <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="date" name="tanggal_lahir_pasangan" class="form-control"
                                id="tanggal_lahir_pasangan" placeholder="Masukkan Tanggal Lahir Pasangan" required />
                            <label for="tanggal_lahir_pasangan">Tanggal Lahir Pasangan <span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nomor_baptis_pasangan" class="form-control"
                                id="nomor_baptis_pasangan" placeholder="Masukkan Nomor Baptis Pasangan" required />
                            <label for="nomor_baptis_pasangan">Nomor Baptis Pasangan <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nama_ayah_pasangan" class="form-control" id="nama_ayah_pasangan"
                                placeholder="Masukkan Nama Ayah Pasangan" required />
                            <label for="nama_ayah_pasangan">Nama Ayah Pasangan <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nama_ibu_pasangan" class="form-control" id="nama_ibu_pasangan"
                                placeholder="Masukkan Nama Ibu Pasangan" required />
                            <label for="nama_ibu_pasangan">Nama Ibu Pasangan <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-4 fw-semibold">Menentukkan Tanggal Pernikahan</h5>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="date" name="tanggal_pernikahan" class="form-control" id="tanggal_pernikahan"
                                placeholder="Masukkan Tanggal Pernikahan" required />
                            <label for="tanggal_pernikahan">Tanggal Pernikahan <span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('pendaftaranMenikah').addEventListener('submit', function(event) {
            event.preventDefault();

            var jemaat_id = document.querySelector('input[name="jemaat_id"]').value;

            // Lakukan AJAX request untuk mengecek status menikah
            fetch('/cek-status-menikah', {
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
                    if (data.status === 'Sudah Menikah') {
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Anda sudah menikah. Tidak dapat mendaftar lagi.',
                            icon: 'error'
                        });
                    } else if (data.status === 'Menunggu Konfirmasi') {
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Pendaftaran Anda sedang menunggu konfirmasi. Tidak dapat mendaftar lagi.',
                            icon: 'warning'
                        });
                    } else {
                        Swal.fire({
                            title: 'Pendaftaran Menikah',
                            text: "Apakah identitas pasangan sudah benar?",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Lanjutkan'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Pendaftaran Berhasil',
                                    text: 'Pendaftaran Menikah sudah dikirim. Silahkan untuk menunggu konfirmasi',
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
@endsection
