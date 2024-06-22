@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Beranda')

@section('content')
    <div class="container">
        <div class="card mb-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mt-3 me-4">
                <div class="d-flex align-items-center ms-3">
                    <img src="/logo-transparan.png" alt="Logo HKBP" width="75" height="75" class="me-3">
                    <div class="mt-3">
                        <h4 class="mb-0 fw-bold">WARTA JEMAAT</h4>
                        <h6 class="text-muted">GEREJA HURIA KRISTEN BATAK PROTESTAN</h6>
                    </div>
                </div>
                @if ($wartaJemaat)
                    <p class="text-end fw-semibold"><strong>Tanggal </strong>
                        {{ \Carbon\Carbon::parse($wartaJemaat->tanggal)->translatedFormat('d F Y') }}</p>
                @endif
            </div>
            <div class="card-body">
                @if ($wartaJemaat)
                    <div class="text-center">
                        <h4 class="fw-bold">{{ $wartaJemaat->judul }}</h4>
                        <h5 class="fw-semibold">{{ $wartaJemaat->ayat }}</h5>
                    </div>
                    <div class="mt-5 mx-2" style="text-align: justify; color: #000; font-weight: 500; font-size: 16px;">
                        <p>{!! $wartaJemaat->isi !!}</p>
                    </div>
                    <p class="text-end text-dark fw-bold mt-4">({{ $wartaJemaat->nama_khutbah }})</p>
                @else
                    <h4 class="fw-bold text-center text-danger">WARTA JEMAAT KOSONG</h4>
                @endif
            </div>
        </div>
        @if ($pelayananSepekan->isNotEmpty())
            <div class="card mb-4 shadow-sm">
                <div class="card-header mt-3">
                    <h4 class="mb-0 fw-bold text-center">PELAYANAN SEPEKAN</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($pelayananSepekan as $item)
                            <div class="col-md-6 mt-4">
                                <h6 class="fw-bold text-decoration-underline">{{ $item->hari }}</h6>
                                <div class="row fw-semibold text-dark">
                                    <div class="col-5 mb-0">{{ $item->kegiatan }}</div>
                                    <div class="col-7 mb-0">{{ $item->jam }}</div>
                                </div>
                                <div class="row text-dark">
                                    <div class="col-5 mb-0">Firman</div>
                                    <div class="col-7 mb-0">: {{ $item->firman }}</div>
                                </div>
                                <div class="row text-dark">
                                    <div class="col-5 mb-0">Liturgos</div>
                                    <div class="col-7 mb-0">: {{ $item->liturgos }}</div>
                                </div>
                                @if ($item->gitaris)
                                    <div class="row text-dark">
                                        <div class="col-5 mb-0">Gitaris</div>
                                        <div class="col-7 mb-0">: {{ $item->gitaris }}</div>
                                    </div>
                                @endif
                                @if ($item->singer)
                                    <div class="row text-dark">
                                        <div class="col-5 mb-0">Singer</div>
                                        <div class="col-7 mb-0">: {{ $item->singer }}</div>
                                    </div>
                                @endif
                                @if ($item->musik)
                                    <div class="row text-dark">
                                        <div class="col-5 mb-0">Musik</div>
                                        <div class="col-7 mb-0">: {{ $item->musik }}</div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if ($pengumuman->isNotEmpty())
            <div class="card mb-4 shadow-sm">
                <div class="card-header mt-3">
                    <h4 class="mb-0 fw-bold text-center">PENGUMUMAN</h4>
                </div>
                <div class="card-body">
                    @foreach ($pengumuman as $item)
                        <div class="mx-2" style="text-align: justify; color: #000; font-weight: 400; font-size: 16px;">
                            <h5 class="fw-bold mt-3">{{ $item->judul }}</h5>
                            <p class="">{!! $item->isi !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="card-body mt-3">
            <div class="d-flex flex-wrap">
                {{-- Total Jemaat Pria & Wanita --}}
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="mt-3 ms-2 me-2">
                            {!! $totalJemaatPriaWanitaChart->container() !!}
                        </div>
                    </div>
                </div>

                {{-- Total Jemaat Hidup & Meninggal --}}
                <div class="col-3 ms-4 mb-4">
                    <div class="card">
                        <div class="mt-3 ms-2 me-2">
                            {!! $statusJemaatChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $totalJemaatPriaWanitaChart->cdn() }}"></script>

    {{ $totalJemaatPriaWanitaChart->script() }}

    <script src="{{ $statusJemaatChart->cdn() }}"></script>

    {{ $statusJemaatChart->script() }}
@endsection
