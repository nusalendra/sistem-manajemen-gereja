@extends('layouts/contentNavbarLayout')

@section('title', 'Tambah Pelayanan Sepekan')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0 fw-semibold">Tambah Pengumuman</h5>
                </div>
                <div class="card-body">
                    <form action="/warta-jemaat/pengumuman" method="POST">
                        @csrf
                        <input type="hidden" name="warta_jemaat_id" value="{{ $id }}">

                        <div class="form-floating form-floating-outline mb-4 flex-fill mx-2">
                            <input type="text" name="judul" class="form-control" id="judul"
                                placeholder="Masukkan Judul" required />
                            <label for="judul">Judul <span class="text-danger">*</span></label>
                        </div>
                        <div class="mx-2">
                            <label for="isi">Isi <span class="text-danger">*</span></label>
                            <div class="form-floating form-floating-outline mb-4 flex-fill mt-2">
                                <input id="isi" type="hidden" name="isi" />
                                <trix-editor input="isi" class="trix-content"></trix-editor>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="d-flex justify-content-between card-header ">
                    <h5 class="text-dark fw-bold">Data Pengumuman</h5>
                </div>
                <div class="card ps-3 pe-3">
                    <div class="card-body px-0 pt-0">
                        <div class="table-responsive text-nowrap p-0">
                            <table id="myTable" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder text-start">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Judul</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $index + 1 }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{ $item->judul }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="ms-2 d-flex flex-column justify-content-center">
                                                        <form action="/warta-jemaat/pengumuman/{{ $item->id }}"
                                                            method="POST" role="form text-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="warta_jemaat_id"
                                                                value="{{ $id }}">
                                                            <button type="submit" class="btn btn-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-trash3 mb-1 me-1" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                                </svg>
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                            <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
                            <script>
                                let table = new DataTable('#myTable');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/trix.umd.min.js') }}"></script>
@endsection
