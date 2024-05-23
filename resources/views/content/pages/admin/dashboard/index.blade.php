@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2 fw-bold">Jemaat Gereja</h5>
                    </div>
                    <p class="mt-3">Menampilkan jumlah total jemaat terdaftar, jemaat yang sudah menikah, jemaat yang
                        sudah
                        dibaptis, dan jemaat yang sudah sidi</p>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-dark rounded shadow">
                                        <i class="mdi mdi-account-outline mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Total Jemaat Terdaftar</div>
                                    <h5 class="mb-0">{{ $totalJemaat }} Jemaat</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-primary rounded shadow">
                                        <i class="mdi mdi-account-multiple mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Total Jemaat Sudah Menikah</div>
                                    <h5 class="mb-0">{{ $totalMenikah }} Jemaat</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-warning rounded shadow">
                                        <i class="mdi mdi-account-group mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Total Jemaat Sudah Baptis</div>
                                    <h5 class="mb-0">{{ $totalBaptis }} Jemaat</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-info rounded shadow">
                                        <i class="mdi mdi-account-group mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Total Jemaat Sudah Sidi</div>
                                    <h5 class="mb-0">{{ $totalSidi }} Jemaat</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Jemaat Pria & Wanita --}}
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="mt-3 ms-2 me-2">
                    {!! $jemaatChart->container() !!}
                </div>
            </div>
        </div>

        {{-- Total Jemaat Hidup & Meninggal --}}
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="mt-3 ms-2 me-2">
                    {!! $statusJemaatChart->container() !!}
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="row gy-4">
                {{-- Pendaftaran Menikah Menunggu Konfirmasi --}}
                <div class="col-sm-12">
                    <div class="card h-70">
                        <div class="card-header pb-0">
                            <h6 class="mb-0 fw-bold">Pendaftaran Menikah</h6>
                            <div class="card-body mt-mg-1">
                                <h6 class="mb-2">Belum Dikonfirmasi Admin</h6>
                                <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
                                    <h4 class="mb-0 me-2 text-danger">{{ $pendaftaranMenikah }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Pendaftaran Baptis Menunggu Konfirmasi --}}
                <div class="col-sm-12">
                    <div class="card h-70">
                        <div class="card-header pb-0">
                            <h6 class="mb-0 fw-bold">Pendaftaran Baptis</h6>
                            <div class="card-body mt-mg-1">
                                <h6 class="mb-2">Belum Dikonfirmasi Admin</h6>
                                <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
                                    @if ($pendaftaranBaptis > 0)
                                        <h4 class="mb-0 me-2 text-danger">{{ $pendaftaranBaptis }}</h4>
                                    @else
                                        <h4 class="mb-0 me-2">0</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Pendaftaran Sidi Menunggu Konfirmasi --}}
                <div class="col-sm-12">
                    <div class="card h-70">
                        <div class="card-header pb-0">
                            <h6 class="mb-0 fw-bold">Pendaftaran Sidi</h6>
                            <div class="card-body mt-mg-1">
                                <h6 class="mb-2">Belum Dikonfirmasi Admin</h6>
                                <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
                                    @if ($pendaftaranSidi > 0)
                                        <h4 class="mb-0 me-2 text-danger">{{ $pendaftaranSidi }}</h4>
                                    @else
                                        <h4 class="mb-0 me-2">0</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-md-6">
            <div class="card">
                <div class="mt-3 ms-2 me-2">
                    {!! $umurJemaatChart->container() !!}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $jemaatChart->cdn() }}"></script>

    {{ $jemaatChart->script() }}

    <script src="{{ $statusJemaatChart->cdn() }}"></script>

    {{ $statusJemaatChart->script() }}

    <script src="{{ $umurJemaatChart->cdn() }}"></script>

    {{ $umurJemaatChart->script() }}
@endsection
