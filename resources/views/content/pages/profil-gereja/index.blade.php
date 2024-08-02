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
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="fw-bold text-center">Sejarah</h4>
                <h5 class="fw-semibold">Diresmikan 23 Januari 2000</h5>
                <div class="d-flex">
                    <img src="/sejarah-img.png" alt="Logo HKBP" width="650" height="650"
                        class="rounded mx-auto d-block">
                    <img src="/sejarah-img-2.png" alt="Logo HKBP" width="650" height="650"
                        class="rounded mx-auto d-block">
                </div>
                <p class="text-justify mt-3 fs-5 fw-semibold text-black"
                    style="font-family: 'Times New Roman', Times, serif">
                    HKBP berdiri sejak tahun 7 Oktober 1861 di tanah Batak dan ini merupakan buah pemberitaan Injil yang
                    disampaikan oleh misionaris Rheinische Missions Gessellschaft (RMG), sehingga berkembang ke seluruh
                    tanah
                    Batak termasuk di Indonesia dan di seluruh dunia. HKBP selalu mempersembahkan dirinya menjadi alat Allah
                    untuk melaksanakan misiNya sebagaimana disaksikan oleh Alkitab yang berdasarkan iman, kasih dan
                    pengharapan.
                    Keterpanggilan HKBP tentunya untuk menghayati teladan dari Tuhan Yesus yaitu memberi, berbagi dan
                    berkorban
                    serta senantiasa memberikan dirinya untuk dibarukan, mewujudnyatakan buah Roh yaitu kasih, sukacita,
                    damai
                    sejahtera, kesabaran, kemurahan, kebaikan, kesetiaan, kelemahlembutan dan penguasaan diri (Galatia
                    5:22-23).
                    Gereja HKBP tumbuh dari misi lembaga zending RMG (Rheinische Missionsgesellschaft) dari Jerman dan
                    Belanda
                    melalui misionaris Pdt Heine, Pdt Klemmer, Pdt Betz dan Pdt Van Asselt. Gereja HKBP tumbuh dari misi
                    lembaga
                    zending RMG (Rheinische Missionsgesellschaft) dari Jerman dan Belanda melalui misionaris Pdt Heine, Pdt
                    Klemmer, Pdt Betz dan Pdt Van Asselt.
                </p>
                <p class="text-justify mt-3 fs-5 fw-semibold text-black"
                    style="font-family: 'Times New Roman', Times, serif">
                    Lembaga Mission Batak ini sejak 1881 dipimpin oleh seorang pemimpin dengan jabatan Ephorus, oleh
                    penginjil
                    Ingwer Ludwig Nommensen. Pdt. I. L. Nommensen yang melalui banyak rintangan untuk mengembangkan Gereja
                    HKBP
                    di Tanah Batak. Penolakan-penolakan diterima, kemudian mencair setelah dia berhasil membaptis 4 pasangan
                    suami istri pada tanggal 27 Agustus tahun 1865 di Silindung. Kemudian berlanjut hingga 20 sampai 50
                    orang
                    jemaat dalam suatu acara ibadah. Perkembangan agama Kristen semakin terasa setelah Pdt. Nommensen
                    membangun
                    sebuah perkampungan yang dinamakan Desa Huta Dame di Saitnihuta. Bertahun-tahun menjalankan misi di
                    tanah
                    Batak, Nommensen lalu mengajukan permohonan kepada RMG Barmen agar misinya diperluas hingga wilayah
                    Simalungun. Permohonan itu ditanggapi dengan mengutus Pendeta Simon, Pendeta Guillaume dan Pendeta
                    Meisel
                    menuju Sigumpar pada 16 Maret 1903. Dari sana mereka pergi ke Tiga Langgiung, Purba, Sibuha-buhar,
                    Sirongit,
                    Bangun Purba, Tanjung Morawa, Medan, Deli Tua, Sibolangit dan Bukum.
                </p>
                <p class="text-justify mt-3 fs-5 fw-semibold text-black"
                    style="font-family: 'Times New Roman', Times, serif">
                    HKBP Simodong adalah salah satu administratif kewilayahan gerejawi HKBP yang berpusat di Tebing Tinggi,
                    Sumatera Utara, dengan area pelayanan yang meliputi, HKBP Brohol dan HKBP Tanjung Sigoni dimana tiga
                    gereja
                    ini dipimpin oleh satu pendeta ressort yaitu pendeta ressort hkbp simodong. Pada tahun 2023, terhitung
                    anggota jemaat sebanyak 469 jiwa dimana hkbp simodong merupakan jemaat yang terbanyak diantara dua
                    gereja
                    yang menjadi ressort pagaran. Gereja hkbp simodong juga menyediakan rumah dinas buat pendeta ressort.
                    Gereja
                    HKBP simodong merupakan gereja yang pertama kali ada di desa simodong.
                </p>
            </div>
        </div>
    </div>
@endsection
