@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah Jemaat')

@section('content')
    <div class="row">
        <div class="card-header">
            <h5 class="mb-2 fw-bold bg-primary text-white p-2 rounded">Tambah Jemaat</h5>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form action="/data-jemaat" method="POST" id="jemaatForm" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <h5 class="mb-4 fw-semibold">Identitas Pribadi</h5>
                    </div>
                    <div class="form-floating form-floating-outline mb-4 mx-2">
                        <select name="jenis_jemaat" id="jenis_jemaat" class="form-select"
                            aria-label="Default select example" required>
                            <option value="Jemaat Baru" selected>Jemaat Baru</option>
                            <option value="Jemaat Lama">Jemaat Lama</option>
                        </select>
                        <label for="jenis_jemaat">Jenis Jemaat <span class="text-danger">*</span></label>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                placeholder="Masukkan Nama Lengkap" required />
                            <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <select name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                            <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <select name="kondisi_tubuh" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>Pilih Kondisi Tubuh</option>
                                <option value="Normal">Normal</option>
                                <option value="Disabilitas">Disabilitas</option>
                            </select>
                            <label for="kondisi_tubuh">Kondisi Tubuh <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <!-- Inputan untuk jemaat baru -->
                    <div id="inputanJemaatBaru" style="display: none;">
                        <!-- Inputan jemaat baru disini -->
                    </div>

                    <!-- Inputan untuk jemaat lama -->
                    <div id="inputanJemaatLama" style="display: none;">
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                    placeholder="Masukkan Tempat Lahir" />
                                <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                    placeholder="Masukkan Tanggal Lahir" />
                                <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="number" name="umur" class="form-control" id="umur"
                                    placeholder="Masukkan Umur" />
                                <label for="umur">Umur <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="number" name="NIK" class="form-control" id="NIK"
                                    placeholder="Masukkan NIK" />
                                <label for="NIK">NIK <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="number" name="KK" class="form-control" id="KK"
                                    placeholder="Masukkan Nomor KK" />
                                <label for="KK">Nomor Kartu Keluarga (KK) <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="number" name="nomor_handphone" class="form-control" id="nomor_handphone"
                                    placeholder="Masukkan Nomor Handphone" />
                                <label for="nomor_handphone">Nomor Handphone <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <select name="golongan_darah" class="form-select" aria-label="Default select example"
                                    required>
                                    <option selected disabled>Pilih Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                                <label for="golongan_darah">Golongan Darah <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="pendidikan" class="form-control" id="pendidikan"
                                    placeholder="Masukkan Pendidikan Terakhir" />
                                <label for="pendidikan">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan"
                                    placeholder="Masukkan Pekerjaan" />
                                <label for="pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    placeholder="Masukkan Alamat" />
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="kabupaten" class="form-control" id="kabupaten"
                                    placeholder="Masukkan Kabupaten" />
                                <label for="kabupaten">Kabupaten <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="provinsi" class="form-control" id="provinsi"
                                    placeholder="Masukkan Provinsi" />
                                <label for="provinsi">Provinsi <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="nama_ayah" class="form-control" id="nama_ayah"
                                    placeholder="Masukkan Nama Ayah" />
                                <label for="nama_ayah">Nama Ayah <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="nama_ibu" class="form-control" id="nama_ibu"
                                    placeholder="Masukkan Nama Ibu" />
                                <label for="nama_ibu">Nama Ibu <span class="text-danger">*</span></label>
                            </div>
                        </div>

                        {{-- Data Baptis --}}
                        <div>
                            <h5 class="mb-4 fw-semibold">Data Baptis</h5>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="file" name="sertifikat" class="form-control" id="sertifikat"
                                    accept=".pdf, .jpg, .png" />
                                <label for="sertifikat">Upload Sertifikat</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="tanggal_baptis" class="form-control" id="tanggal_baptis"
                                    placeholder="Masukkan Tanggal Baptis" />
                                <label for="tanggal_baptis">Tanggal Baptis</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="nomor_baptis" class="form-control" id="nomor_baptis"
                                    placeholder="Masukkan Nomor Baptis (Opsional)" />
                                <label for="nomor_baptis">Nomor Baptis</label>
                            </div>
                        </div>

                        {{-- Data Sidi --}}
                        <div>
                            <h5 class="mb-4 fw-semibold">Data Sidi</h5>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="gereja_yang_membaptis" class="form-control"
                                    id="gereja_yang_membaptis" placeholder="Masukkan Nama Gereja" />
                                <label for="gereja_yang_membaptis">Gereja Yang Membaptis</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="tanggal_sidi" class="form-control" id="tanggal_sidi"
                                    placeholder="Masukkan Tanggal Sidi" />
                                <label for="tanggal_sidi">Tanggal Sidi</label>
                            </div>
                        </div>

                        {{-- Data Menikah --}}
                        <div>
                            <h5 class="mb-4 fw-semibold">Data Menikah</h5>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="nama_pasangan" class="form-control" id="nama_pasangan"
                                    placeholder="Masukkan Nama Lengkap Pasangan" />
                                <label for="nama_pasangan">Nama lengkap Pasangan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <select name="jenis_kelamin_pasangan" class="form-select"
                                    aria-label="Default select example" required>
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                                <label for="jenis_kelamin_pasangan">Jenis Kelamin <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="number" name="umur_pasangan" class="form-control" id="umur_pasangan"
                                    placeholder="Masukkan Umur Pasangan" />
                                <label for="umur_pasangan">Umur Pasangan</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="nama_ayah_pasangan" class="form-control"
                                    id="nama_ayah_pasangan" placeholder="Masukkan Nama Ayah Pasangan" />
                                <label for="nama_ayah_pasangan">Nama Ayah Pasangan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="nama_ibu_pasangan" class="form-control"
                                    id="nama_ibu_pasangan" placeholder="Masukkan Nama Ibu Pasangan" />
                                <label for="nama_ibu_pasangan">Nama Ibu Pasangan</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="tanggal_lahir_pasangan" class="form-control"
                                    id="tanggal_lahir_pasangan" placeholder="Masukkan Tanggal Lahir Pasangan" />
                                <label for="tanggal_lahir_pasangan">Tanggal Lahir Pasangan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="nomor_baptis_pasangan" class="form-control"
                                    id="nomor_baptis_pasangan" placeholder="Masukkan Nomor Baptis Pasangan" />
                                <label for="nomor_baptis_pasangan">Nomor Baptis Pasangan</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="tanggal_pernikahan" class="form-control"
                                    id="tanggal_pernikahan" placeholder="Masukkan Tanggal Pernikahan" />
                                <label for="tanggal_pernikahan">Tanggal Pernikahan</label>
                            </div>
                        </div>
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
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="Masukkan Email" />
                        <label for="email">Email</label>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jenisJemaatSelect = document.getElementById('jenis_jemaat');
            const inputanJemaatBaru = document.getElementById('inputanJemaatBaru');
            const inputanJemaatLama = document.getElementById('inputanJemaatLama');

            function toggleFormInputs() {
                if (jenisJemaatSelect.value === 'Jemaat Lama') {
                    inputanJemaatLama.style.display = 'block';
                    inputanJemaatBaru.style.display = 'none';
                    setRequired(inputanJemaatLama, true);
                    setRequired(inputanJemaatBaru, false);
                } else {
                    inputanJemaatLama.style.display = 'none';
                    inputanJemaatBaru.style.display = 'block';
                    setRequired(inputanJemaatLama, false);
                    setRequired(inputanJemaatBaru, true);
                }
            }

            function setRequired(element, isRequired) {
                const inputs = element.querySelectorAll('input, select');
                inputs.forEach(input => {
                    const label = input.closest('.form-floating').querySelector('label');
                    if (label && label.querySelector('.text-danger')) {
                        if (isRequired) {
                            input.setAttribute('required', 'required');
                        } else {
                            input.removeAttribute('required');
                        }
                    }
                });
            }

            toggleFormInputs();
            jenisJemaatSelect.addEventListener('change', toggleFormInputs);
        });
    </script>
@endsection
