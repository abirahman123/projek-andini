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
            padding: .8em .7em 0 0;
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

        .w-full {
            width: 210mm !important;
        }

        .w-signature {
            width: 170mm !important;
        }

        .tr-full {
            width: calc(210mm - 4em);
        }

        .td-1 {
            width: calc((210mm - 4em) / 100);
        }

        .td-2 {
            width: calc((210mm - 4em) / 50);
        }

        .td-3 {
            width: calc((210mm - 4em) / 33.333);
        }

        .td-4 {
            width: calc((210mm - 4em) / 25);
        }

        .td-5 {
            width: calc((210mm - 4em) / 20);
        }

        .td-6 {
            width: calc((210mm - 4em) / 16.666);
        }

        .td-7 {
            width: calc((210mm - 4em) / 14.285);
        }

        .td-8 {
            width: calc((210mm - 4em) / 12.5);
        }

        .td-9 {
            width: calc((210mm - 4em) / 11.111);
        }

        .td-10 {
            width: calc((210mm - 4em) / 10);
        }

        .td-10 {
            width: calc((210mm - 4em) / 10);
        }

        .td-15 {
            width: calc((210mm - 4em) / 6.666);
        }

        .td-20 {
            width: calc((210mm - 4em) / 5);
        }

        .td-22 {
            width: calc((210mm - 4em) / 4.545);
        }

        .td-25 {
            width: calc((210mm - 4em) / 4);
        }

        .td-30 {
            width: calc((210mm - 4em) / 3.333);
        }

        .td-40 {
            width: calc((210mm - 4em) / 2.5);
        }

        .td-50 {
            width: calc((210mm - 4em) / 2);
        }

        .td-60 {
            width: calc((210mm - 4em) / 1.666);
        }

        .td-70 {
            width: calc((210mm - 4em) / 1.428);
        }

        .td-73 {
            width: calc((210mm - 4em) / 1.369);
        }

        .td-75 {
            width: calc((210mm - 4em) / 1.4);
        }

        .td-80 {
            width: calc((210mm - 4em) / 1.25);
        }

        .td-90 {
            width: calc((210mm - 4em) / 1.111);
        }

        .content-text {
            width: 85%;
        }
    </style>
</head>

<body>
    <header>
        <table class="header-table" style="width: 100%">
            <tr>
                @if ($logo)
                    <td rowspan="5">
                        <img src="{{ $logo }}" style="width: 90px; height:90px; margin-top: 20px;"
                            alt="logo">
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
                    <hr style="margin-top: -2em;">
                </td>
            </tr>
        </table>
    </header>
    <main>
        <table class="table-borderless w-full" style="margin-left: 2em; margin-right: 2em; margin-top: -2em;">
            <tr class="tr-full">
                <td colspan="5" class="tr-full">
                    <table class="table-borderless w-full">
                        <tr class="tr-full">
                            <td class="td-15">No. Registrasi</td>
                            <td class="td-1">:</td>
                            <td class="td-30">{{ $reg->nomor_surat ?? '' }}</td>
                            <td class="td-4"></td>
                            <td class="td-50">
                                Tanggal Laporan : {{ \App\Helpers\Formatter::date($reg->tanggal_pengajuan) }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="tr-full">
                <td class="td-15">Perihal</td>
                <td class="td-1">:</td>
                <td class="td-50">
                    <p><b>Dispensasi Kawin</b></p>
                </td>
                <td class="2"></td>
                <td class="2"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-15">Pelayanan</td>
                <td class="td-1">:</td>
                <td class="td-80">
                    <p>
                        1. Penanganan Pengaduan<br>
                        2. Penegakan dan Bantuan Hukum
                    </p>
                </td>
                <td class="2"></td>
                <td class="2"></td>
            </tr>
        </table>
        <h4 style="text-align: center; margin-top: 1.5em;">DATA PRIBADI</h4>
        <table class="table-borderless w-full" style="margin-left: 2em; margin-right: 2em;">
            <tr class="tr-full">
                <td class="td-22">
                    <h4 style="text-align: left; margin-bottom: 0.1em;">DATA CALON SUAMI</h4>
                </td>
                <td class="td-1"></td>
                <td class="td-75">

                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Nama Lengkap</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    <div class="content-text">
                        {{ $reg->catin_pria->nama_lengkap }}
                    </div>
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Alamat Lengkap</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    <div class="content-text">
                        {{ $reg->catin_pria->alamat }}<br>
                        Kec. {{ $reg->catin_pria->kecamatan->nama_kecamatan }}
                        Kel. {{ $reg->catin_pria->kelurahan->nama_kelurahan }}
                    </div>
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">No. Telepon/HP</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_pria->nomor_hp }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Jenis Kelamin</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_pria->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Tempat/Tanggal Lahir</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_pria->tempat_lahir . ', ' . \App\Helpers\Formatter::date($reg->catin_pria->tanggal_lahir) }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Agama</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_pria->agama->agama }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Pendidikan</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_pria->pendidikan->pendidikan }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Pekerjaan</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_pria->pekerjaan }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Status Perkawinan</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    -
                </td>
                <td class="4"></td>
            </tr>
        </table>
        <table class="table-borderless w-full" style="margin-top: 0.2em; margin-left: 2em; margin-right: 2em;">
            <tr class="tr-full">
                <td class="td-22">
                    <h4 style="text-align: left; margin-bottom: 0.1em;">DATA CALON ISTRI</h4>
                </td>
                <td class="td-1"></td>
                <td class="td-75">

                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Nama Lengkap</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    <div class="content-text">
                        {{ $reg->catin_wanita->nama_lengkap }}
                    </div>
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Alamat Lengkap</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    <div class="content-text">
                        {{ $reg->catin_pria->alamat }}<br>
                        Kec. {{ $reg->catin_pria->kecamatan->nama_kecamatan }}
                        Kel. {{ $reg->catin_pria->kelurahan->nama_kelurahan }}
                    </div>
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">No. Telepon/HP</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_wanita->nomor_hp }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Jenis Kelamin</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_wanita->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Tempat/Tanggal Lahir</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_wanita->tempat_lahir . ', ' . \App\Helpers\Formatter::date($reg->catin_wanita->tanggal_lahir) }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Agama</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_wanita->agama->agama }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Pendidikan</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_wanita->pendidikan->pendidikan }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Pekerjaan</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    {{ $reg->catin_wanita->pekerjaan }}
                </td>
                <td class="4"></td>
            </tr>
            <tr class="tr-full">
                <td class="td-22">Status Perkawinan</td>
                <td class="td-1">:</td>
                <td class="td-73">
                    -
                </td>
                <td class="4"></td>
            </tr>
        </table>

        <table class="table-borderless w-signature" style="margin-top: 1em; margin-left: 2em; margin-right: 2em;">
            <tr class="td-50">
                <td class="td-10" style="text-align: center;">
                    <p>CALON ISTRI</p>
                    <br><br><br><br>
                    <p>(..........................)</p>
                </td>
                <td class="td-10" style="text-align: center;">
                    <p>CALON SUAMI</p>
                    <br><br><br><br>
                    <p>(..........................)</p>
                </td>
                <td class="td-10" style="text-align: center;">
                    <p>WALI CALON ISTRI</p>
                    <br><br><br><br>
                    <p>(..........................)</p>
                </td>
                <td class="td-10" style="text-align: center;">
                    <p>WALI CALON SUAMI</p>
                    <br><br><br><br>
                    <p>(..........................)</p>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>
