<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Permohonan Dispensasi Nikah</title>
    <style>
        @page {
            size: A4;
            margin: .3in .6in;
        }

        body {
            font-family: Roboto, "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: 400;
            margin: 0;
        }

        body * {
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            align-items: start;
        }

        table td,
        table th {
            padding: .5em;
            border: 1px solid black;
            vertical-align: top;
        }

        .th-center {
            vertical-align: middle !important;
        }

        table.table-borderless td {
            padding: .8em .7em .1em 0;
            border: 0;
        }

        .pe-td {
            width: 150px;
        }

        table.header-table {
            border: 0;
        }

        table.header-table td {
            padding: 0;
            border: 0;
        }

        .table-borderless {
            border: 0;
            margin-left: -.1em;
        }

        .footer {
            margin-top: 35rem;
            float: right;
        }

        .table-borderless,
        .table-borderless td,
        .table-borderless th {}

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .w-full {
            width: 210mm !important;
        }

        .w-signature {
            width: 170mm !important;
        }

        .tr-full {
            width: calc(210mm - 4em);
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <header>
        <table class="header-table" style="width: 100%">
            <tr>
                @if ($logo)
                    <td rowspan="5" style="padding: 0;">
                        <img src="{{ $logo }}" style="width: 8em; height:8em;" alt="logo">
                    </td>
                @endif
                <td>
                    <p style="text-align: center; margin-bottom: .1em; margin-top: .1em;">
                        PEMERINTAH KABUPATEN BLITAR<br>
                        DINAS PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK,<br>
                        PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA
                    </p>
                    <h3 style="text-align: center; margin-bottom: .2em; margin-top: .2em;">UPT PERLINDUNGAN PEREMPUAN
                        DAN ANAK</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <p style=" text-align: center; font-size:.9em;">Jl. HOS Cokroaminoto No. 12 Blitar Telp/Fax : (0342)
                        801053 / 807718</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="text-align: center; font-size: .9em;">Website : www.dppkb-p3a.blitarkab.go.id / Email :
                        ppa_upt@blitarkab.go.id</p>
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td colspan="2">
                    <hr style="margin-top: -3rem;">
                </td>
            </tr>
        </table>
    </header>
    <main style="padding:0 4rem;">
        <div class="container">
            <center>
                <h3>SURAT KETERANGAN</h3>
                <h3>NO. {{ $jadwalasesmen->dispensasi->nomor_surat }}</h3>
            </center>
            <br />
            <br />
            <p>Berdasarkan Peraturan:</p>
            <ol style="margin-left: 1.5em">
                <li>Undang-Undang No 35 Tahun 2014 Tentang perubahan atas Undang-Undang Nomor 23 Tahun 2002 Tentang
                    Perlindungan Anak.
                </li>
                <li>
                    Undang-Undang Nomor 16 Tahun 2019 Tentang Perubahan Atas Undang-Undang Nomor 1 Tahun 1974 Tentang
                    Perkawinan. Pada Pasal 7 yang menyatakan bahwa perkawinan hanya diizinkan apabila laki-laki dan
                    perempuan sudah mencapai umur 19 (Sembilan belas) Tahun.
                </li>
                <li>
                    Peraturan Daerah Kabupaten Blitar Nomor 3 Tahun 2020 Tentang Penyelenggaraan Perlindungan dan
                    Pemenuhan
                    Hak Anak.
                </li>
            </ol>
            <br />
            <p>&nbsp;&nbsp;&nbsp;&nbsp;Maka kami melaksanakan asesmen terhadap Calon Pengantin dan Wali
                pada hari
                @php
                    setLocale(LC_TIME, 'id');
                @endphp
                {{ \Carbon\Carbon::parse($jadwalasesmen->dispensasi->tanggal_surat)->formatLocalized('%A') }}
                tanggal {{ \Carbon\Carbon::parse($jadwalasesmen->dispensasi->tanggal_surat)->formatLocalized('%d %B') }}
                tahun {{ \Carbon\Carbon::parse($jadwalasesmen->dispensasi->tanggal_surat)->year }} dengan identitas
                pemohon sebagai berikut :</p>
        </div>
        <table class="table-borderless">
            <tbody>
                <tr class="tr-full">
                    <td>Nama Pemohon</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ $jadwalasesmen->dispensasi->register->nama }}
                    </td>
                </tr>
                <tr class="tr-full">
                    <td colspan="3">
                        <p style="text-align: left; margin-bottom: 0.1em;">Orang Tua/Wali dari</p>
                    </td>

                </tr>
            </tbody>
        </table>
        <table class="table-borderless">
            <tbody>
                <tr class="tr-full">
                    <td colspan="3">
                        <h4 style="text-align: left; margin-bottom: 0.1em;">CALON ISTRI</h4>
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>Nama</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ $jadwalasesmen->dispensasi->catin_wanita->nama_lengkap }}
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>Umur</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ \Carbon\Carbon::parse($jadwalasesmen->dispensasi->catin_wanita->tanggal_lahir)->age }}
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>Agama</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ $jadwalasesmen->dispensasi->catin_wanita->agama->agama }}
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ $jadwalasesmen->dispensasi->catin_wanita->pekerjaan }}
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>Alamat</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ $jadwalasesmen->dispensasi->catin_wanita->alamat }}, Kec.
                        {{ $jadwalasesmen->dispensasi->catin_wanita->kecamatan->nama_kecamatan }}, Kel.
                        {{ $jadwalasesmen->dispensasi->catin_wanita->kelurahan->nama_kelurahan }}
                    </td>
                </tr>
            </tbody>

        </table>
        <table class="table-borderless" style="margin-top: 1em">
            <tbody>
                <tr class="tr-full">
                    <td colspan="3">
                        <h4 style="text-align: left; margin-bottom: 0.1em;">CALON SUAMI</h4>
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>
                        Nama
                    </td>
                    <td>:</td>
                    <td colspan="2">
                        {{ $jadwalasesmen->dispensasi->catin_pria->nama_lengkap }}
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>Umur</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ \Carbon\Carbon::parse($jadwalasesmen->dispensasi->catin_pria->tanggal_lahir)->age }}
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>Agama</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ $jadwalasesmen->dispensasi->catin_pria->agama->agama }}
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ $jadwalasesmen->dispensasi->catin_pria->pekerjaan }}
                    </td>
                </tr>
                <tr class="tr-full">
                    <td>Alamat</td>
                    <td>:</td>
                    <td colspan="2">
                        {{ $jadwalasesmen->dispensasi->catin_pria->alamat }}, Kec.
                        {{ $jadwalasesmen->dispensasi->catin_pria->kecamatan->nama_kecamatan }}, Kel.
                        {{ $jadwalasesmen->dispensasi->catin_pria->kelurahan->nama_kelurahan }}
                    </td>
                </tr>
            </tbody>

        </table>
        <div class="container page-break" style="margin-top: 2em">
            <h4>Hasil Wawancara</h4>
            <ol style="margin-left: 1.5em">
                <li>Calon Pengantin
                </li>
                <li>
                    Calon Pengantin
                </li>
                <li>
                    Keinginan menikah adalah keinginan calon pengantin.

                </li>
                <li>Kedua orang tua calon pengantin sepakat menikahkan karena keadaan. </li>
            </ol>
            <br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan hasil asesmen maka keputusan kami serahkan sepenuhnya kepada majelis
                yang menangani perkara
                ini. Demikian hasil wawancara kami, semoga dijadikan bahan pertimbangan Majelis Hakim Pengadilan Agama
                Blitar yang menangani perkara ini dalam memberikan keputusan dan disampaikan terimakasih.
            </p>
            <br>
            <center>
                <p>Blitar, {{ \App\Helpers\Formatter::date(now()) }}</p>
            </center>
            <br>
            <table class="table-borderless" style="padding:0;width: 100%;text-align:center;">
                <tbody>

                    <tr>
                        <td>
                            Mengetahui, <br>
                            Pembina Utama Muda
                        </td>
                        <td>
                            <br>
                            Pembina
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <br>
                            <br>
                            ..........................
                        </td>
                        <td>
                            <br>
                            <br>
                            <br>
                            ..........................
                        </td>
                    </tr>
                    <tr class="tr-full">
                        <td>
                            {{ $jabatanFungsional->as_pembina_utama_muda->nama }} <br>
                            NIP: {{ $jabatanFungsional->as_pembina_utama_muda->nip }}
                        </td>
                        <td>
                            {{ $jabatanFungsional->as_pembina->nama }} <br>
                            NIP: {{ $jabatanFungsional->as_pembina->nip }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>
</body>

</html>
