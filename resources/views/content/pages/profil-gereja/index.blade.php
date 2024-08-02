@extends('layouts/blankLayout')

@section('title', 'Profil Gereja')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

<style>
    .table {
        width: 100%;
        /* Mengatur lebar tabel */
        margin-top: 20px;
        /* Memberi jarak atas */
    }

    .table thead th {
        background-color: #f8f9fa;
        /* Warna latar belakang untuk header */
    }

    .table td,
    .table th {
        padding: 8px;
        /* Padding untuk sel tabel */
        border: 1px solid #dee2e6;
        /* Border untuk sel */
    }

    .table th {
        text-align: center;
        /* Menyatukan teks header */
    }
</style>

@section('content')
    <div class="container mt-3 mb-5">
        <img src="/profil-img.png" alt="Logo HKBP" width="800" height="800" class="rounded mx-auto d-block">
        <h5 class="fw-bold text-center mt-3">3.340407N 99.357012E</h5>

        <!-- Tabel Data -->
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">Informasi Gereja</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gereja</td>
                    <td>Huria Kristen Batak Protestan</td>
                </tr>
                <tr>
                    <td>Kantor</td>
                    <td>Tebing Tinggi Lama Kota Tebing Tinggi</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>Simodong, Sei Suka, Batu Bara</td>
                </tr>
                <tr>
                    <td>Pelayanan</td>
                    <td>Kabupaten Batubara</td>
                </tr>
                <tr>
                    <td>Resort</td>
                    <td>28</td>
                </tr>
                <tr>
                    <td>Persiapan</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Gereja</td>
                    <td>128</td>
                </tr>
                <tr>
                    <td>Jumlah anggota</td>
                    <td>469 jiwa</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">Jemaat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Keluarga (ripe)</td>
                    <td>100 Kartu Keluarga</td>
                </tr>
                <tr>
                    <td>Bapak (Ama)</td>
                    <td>70 Jiwa</td>
                </tr>
                <tr>
                    <td>Ibu (Ina)</td>
                    <td>89 Jiwa</td>
                </tr>
                <tr>
                    <td>Pemuda (NaposoBulung)</td>
                    <td>90 Jiwa</td>
                </tr>
                <tr>
                    <td>Anak-anak (Dakdanak)</td>
                    <td>120 Jiwa</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">Pelayan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pendeta</td>
                    <td>Pdt.Jonatan Sibarani, STh (Pendeta Ressort)</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-5">
            <h4 class="fw-bold text-center">Sejarah</h4>
            <h5 class="fw-semibold">Diresmikan 23 Januari 2000</h5>
            <div class="d-flex">
                <img src="/sejarah-img.png" alt="Logo HKBP" width="650" height="650" class="rounded mx-auto d-block">
                <img src="/sejarah-img-2.png" alt="Logo HKBP" width="650" height="650" class="rounded mx-auto d-block">
            </div>
            <p class="text-justify mt-3 fw-semibold text-black">
                HKBP Simodong adalah salah satu administratif kewilayahan gerejawi HKBP yang berpusat di Tebing Tinggi,
                Sumatera Utara, dengan area pelayanan yang meliputi, HKBP Brohol dan HKBP Tanjung Sigoni dimana tiga gereja
                ini dipimpin oleh satu pendeta ressort yaitu pendeta ressort hkbp simodong. Pada tahun 2023, terhitung
                anggota jemaat sebanyak 469 jiwa dimana hkbp simodong merupakan jemaat yang terbanyak diantara dua gereja
                yang menjadi ressort pagaran.
            </p>
        </div>
    </div>
@endsection
