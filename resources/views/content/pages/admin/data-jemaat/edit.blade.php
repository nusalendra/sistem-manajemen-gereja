@extends('layouts/contentNavbarLayout')

@section('title', ' Edit Jemaat')

@section('content')
    <div class="row">
        <div class="card-header">
            <h5 class="mb-2 fw-bold bg-primary text-white p-2 rounded">Edit Jemaat</h5>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form action="/data-jemaat/{{ $data->id }}" method="POST" id="jemaatForm" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div>
                        <h5 class="mb-4 fw-semibold">Identitas Pribadi</h5>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                placeholder="Masukkan Nama Lengkap" value="{{ $data->nama_lengkap }}" required />
                            <label for="nama_lengkap">Nama Lengkap</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <select name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Pria" {{ $data->jenis_kelamin === 'Pria' ? 'selected' : '' }}>Pria
                                </option>
                                <option value="Wanita" {{ $data->jenis_kelamin === 'Wanita' ? 'selected' : '' }}>Wanita
                                </option>
                            </select>
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                placeholder="Masukkan Tanggal Lahir" value="{{ $data->tanggal_lahir }}" />
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="number" name="umur" class="form-control" id="umur"
                                placeholder="Masukkan Umur" value="{{ $data->umur }}" />
                            <label for="umur">Umur</label>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="NIK" class="form-control" id="NIK"
                                placeholder="Masukkan NIK" value="{{ $data->NIK }}" />
                            <label for="NIK">NIK</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="alamat" class="form-control" id="alamat"
                                placeholder="Masukkan Alamat" value="{{ $data->alamat }}" />
                            <label for="alamat">Alamat</label>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nama_ayah" class="form-control" id="nama_ayah"
                                placeholder="Masukkan Nama Ayah" value="{{ $data->nama_ayah }}" />
                            <label for="nama_ayah">Nama Ayah</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="nama_ibu" class="form-control" id="nama_ibu"
                                placeholder="Masukkan Nama Ibu" value="{{ $data->nama_ibu }}" />
                            <label for="nama_ibu">Nama Ibu</label>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <select name="status_jemaat" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>Pilih Status Kelamin</option>
                                <option value="Hidup" {{ $data->status_jemaat === 'Hidup' ? 'selected' : '' }}>Hidup
                                </option>
                                <option value="Meninggal" {{ $data->status_jemaat === 'Meninggal' ? 'selected' : '' }}>
                                    Meninggal
                                </option>
                            </select>
                            <label for="status_jemaat">Status Jemaat</label>
                        </div>
                    </div>

                    {{-- Data Menikah --}}
                    <div>
                        <h5 class="mb-4 fw-semibold">Data Menikah</h5>
                    </div>
                    @forelse ($menikah as $index => $item)
                        <input type="hidden" name="menikah[{{ $index }}][id]" value="{{ $item->id }}">
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="menikah[{{ $index }}][nama_pasangan]"
                                    class="form-control" id="nama_pasangan_{{ $index }}"
                                    placeholder="Masukkan Nama Lengkap Pasangan" value="{{ $item->nama_pasangan }}" />
                                <label for="nama_pasangan_{{ $index }}">Nama lengkap Pasangan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <select name="menikah[{{ $index }}][jenis_kelamin_pasangan]" class="form-select"
                                    aria-label="Default select example" required>
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Pria"
                                        {{ $item->jenis_kelamin_pasangan === 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Wanita"
                                        {{ $item->jenis_kelamin_pasangan === 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                                <label for="jenis_kelamin_pasangan_{{ $index }}">Jenis Kelamin <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="number" name="menikah[{{ $index }}][umur_pasangan]"
                                    class="form-control" id="umur_pasangan_{{ $index }}"
                                    placeholder="Masukkan Umur Pasangan" value="{{ $item->umur_pasangan }}" />
                                <label for="umur_pasangan_{{ $index }}">Umur Pasangan</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="menikah[{{ $index }}][nama_ayah_pasangan]"
                                    class="form-control" id="nama_ayah_pasangan_{{ $index }}"
                                    placeholder="Masukkan Nama Ayah Pasangan" value="{{ $item->nama_ayah_pasangan }}" />
                                <label for="nama_ayah_pasangan_{{ $index }}">Nama Ayah Pasangan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="menikah[{{ $index }}][nama_ibu_pasangan]"
                                    class="form-control" id="nama_ibu_pasangan_{{ $index }}"
                                    placeholder="Masukkan Nama Ibu Pasangan" value="{{ $item->nama_ibu_pasangan }}" />
                                <label for="nama_ibu_pasangan_{{ $index }}">Nama Ibu Pasangan</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="menikah[{{ $index }}][tanggal_lahir_pasangan]"
                                    class="form-control" id="tanggal_lahir_pasangan_{{ $index }}"
                                    placeholder="Masukkan Tanggal Lahir Pasangan"
                                    value="{{ $item->tanggal_lahir_pasangan }}" />
                                <label for="tanggal_lahir_pasangan_{{ $index }}">Tanggal Lahir Pasangan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="menikah[{{ $index }}][nomor_baptis_pasangan]"
                                    class="form-control" id="nomor_baptis_pasangan_{{ $index }}"
                                    placeholder="Masukkan Nomor Baptis Pasangan"
                                    value="{{ $item->nomor_baptis_pasangan }}" />
                                <label for="nomor_baptis_pasangan_{{ $index }}">Nomor Baptis Pasangan</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="menikah[{{ $index }}][tanggal_pernikahan]"
                                    class="form-control" id="tanggal_pernikahan_{{ $index }}"
                                    placeholder="Masukkan Tanggal Pernikahan" value="{{ $item->tanggal_pernikahan }}" />
                                <label for="tanggal_pernikahan_{{ $index }}">Tanggal Pernikahan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <select name="menikah[{{ $index }}][status_menikah]" class="form-select"
                                    aria-label="Default select example" required>
                                    <option selected disabled>Pilih Status Menikah</option>
                                    <option value="Sudah Menikah"
                                        {{ $item->status_menikah === 'Sudah Menikah' ? 'selected' : '' }}>Sudah Menikah
                                    </option>
                                    <option value="Cerai" {{ $item->status_menikah === 'Cerai' ? 'selected' : '' }}>Cerai
                                    </option>
                                </select>
                                <label for="status_menikah">Ubah Status Menikah</label>
                            </div>
                        </div>
                    @empty
                        {{-- Form untuk menambah data baru jika tidak ada data --}}
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="menikah[0][nama_pasangan]" class="form-control"
                                    id="nama_pasangan_0" placeholder="Masukkan Nama Lengkap Pasangan" />
                                <label for="nama_pasangan_0">Nama lengkap Pasangan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <select name="menikah[0][jenis_kelamin_pasangan]" class="form-select"
                                    aria-label="Default select example" required>
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                                <label for="jenis_kelamin_pasangan">Jenis Kelamin <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="number" name="menikah[0][umur_pasangan]" class="form-control"
                                    id="umur_pasangan_0" placeholder="Masukkan Umur Pasangan" />
                                <label for="umur_pasangan_0">Umur Pasangan</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="menikah[0][nama_ayah_pasangan]" class="form-control"
                                    id="nama_ayah_pasangan_0" placeholder="Masukkan Nama Ayah Pasangan" />
                                <label for="nama_ayah_pasangan_0">Nama Ayah Pasangan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="menikah[0][nama_ibu_pasangan]" class="form-control"
                                    id="nama_ibu_pasangan_0" placeholder="Masukkan Nama Ibu Pasangan" />
                                <label for="nama_ibu_pasangan_0">Nama Ibu Pasangan</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="menikah[0][tanggal_lahir_pasangan]" class="form-control"
                                    id="tanggal_lahir_pasangan_0" placeholder="Masukkan Tanggal Lahir Pasangan" />
                                <label for="tanggal_lahir_pasangan_0">Tanggal Lahir Pasangan</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="menikah[0][nomor_baptis_pasangan]" class="form-control"
                                    id="nomor_baptis_pasangan_0" placeholder="Masukkan Nomor Baptis Pasangan" />
                                <label for="nomor_baptis_pasangan_0">Nomor Baptis Pasangan</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="menikah[0][tanggal_pernikahan]" class="form-control"
                                    id="tanggal_pernikahan_0" placeholder="Masukkan Tanggal Pernikahan" />
                                <label for="tanggal_pernikahan_0">Tanggal Pernikahan</label>
                            </div>
                        </div>
                    @endforelse


                    {{-- Data Baptis --}}
                    <div>
                        <h5 class="mb-4 fw-semibold">Data Baptis</h5>
                    </div>
                    @if ($data->baptis)
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="file" name="sertifikat" class="form-control" id="sertifikat"
                                    accept=".pdf, .jpg, .png" />
                                <label for="sertifikat">Upload Ulang Sertifikat</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="tanggal_baptis" class="form-control" id="tanggal_baptis"
                                    placeholder="Masukkan Tanggal Baptis" value="{{ $data->baptis->tanggal_baptis }}" />
                                <label for="tanggal_baptis">Tanggal Baptis</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="nomor_baptis" class="form-control" id="nomor_baptis"
                                    placeholder="Masukkan Nomor Baptis (Opsional)"
                                    value="{{ $data->baptis->nomor_baptis }}" />
                                <label for="nomor_baptis">Nomor Baptis</label>
                            </div>
                        </div>
                    @else
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="file" name="sertifikat" class="form-control" id="sertifikat"
                                    accept=".pdf, .jpg, .png" />
                                <label for="sertifikat">Upload Ulang Sertifikat</label>
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
                    @endif

                    {{-- Data Sidi --}}
                    <div>
                        <h5 class="mb-4 fw-semibold">Data Sidi</h5>
                    </div>
                    @if ($data->sidi)
                        <div class="d-flex">
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="text" name="gereja_yang_membaptis" class="form-control"
                                    id="gereja_yang_membaptis" placeholder="Masukkan Nama Gereja"
                                    value="{{ $data->sidi->gereja_yang_membaptis }}" />
                                <label for="gereja_yang_membaptis">Gereja Yang Membaptis</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                                <input type="date" name="tanggal_sidi" class="form-control" id="tanggal_sidi"
                                    placeholder="Masukkan Tanggal Sidi" value="{{ $data->sidi->tanggal_sidi }}" />
                                <label for="tanggal_sidi">Tanggal Sidi</label>
                            </div>
                        </div>
                    @else
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
                    @endif

                    <div>
                        <h5 class="mb-4 fw-semibold">Tambah Akun</h5>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="Masukkan Username" value="{{ $data->user->username }}" required />
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="password" name="password" id="password" class="form-control phone-mask"
                            placeholder="Masukkan Password Baru" />
                        <label for="password">Password Baru</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

    </div>
@endsection
