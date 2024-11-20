<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Roboto, "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: 400;
            margin: 0;
        }

        table {
            border-collapse: collapse;
        }

        table td,
        table th {
            padding: .5em;
            border: 1px solid black;
        }

        table.table-borderless td {
            padding: .1em .2em .1em 0;
            border: 0;
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

        .table-borderless,
        .table-borderless td,
        .table-borderless th {}
    </style>
</head>

<body>
    <header>

    </header>
    <main>

        <center>
            <h3>Asesmen Rekomendasi Kawin</h3>
        </center>

        <table class="table-borderless" style="border:none;width:100%;margin-top:2em;">
            <thead>
                <tr>
                    <td>
                        Nama Catin Pria
                    </td>
                    <td>:</td>
                    <td> {{ $jadwalasesmen->dispensasi->catin_pria->nama_lengkap }}</td>
                    <td>
                        Nama Catin Wanita
                    </td>
                    <td>:</td>
                    <td>{{ $jadwalasesmen->dispensasi->catin_wanita->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td>
                        Alamat Catin Pria
                    </td>
                    <td>:</td>
                    <td>{{ $jadwalasesmen->dispensasi->catin_pria->alamat }},
                        Kel. {{ $jadwalasesmen->dispensasi->catin_pria->kelurahan->nama_kelurahan }} ,
                        Kec. {{ $jadwalasesmen->dispensasi->catin_pria->kecamatan->nama_kecamatan }}</td>
                    <td>
                        Alamat Catin Wanita
                    </td>
                    <td>:</td>
                    <td> {{ $jadwalasesmen->dispensasi->catin_wanita->alamat }},
                        Kel. {{ $jadwalasesmen->dispensasi->catin_wanita->kelurahan->nama_kelurahan }} ,
                        Kec. {{ $jadwalasesmen->dispensasi->catin_wanita->kecamatan->nama_kecamatan }}</td>
                </tr>
                <tr>
                    <td>
                        Umur Catin Pria
                    </td>
                    <td>:</td>
                    <td> {{ \Carbon\Carbon::parse($jadwalasesmen->dispensasi->catin_pria->tanggal_lahir)->age }}</td>
                    <td>
                        Umur Catin Wanita
                    </td>

                    <td>:</td>
                    <td>
                        {{ \Carbon\Carbon::parse($jadwalasesmen->dispensasi->catin_wanita->tanggal_lahir)->age }}
                    </td>
                </tr>
            </thead>
        </table>

        <table style="margin-top:1rem;">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Asesor</th>
                    <th>Lama Hubungan Terjalin</th>
                    <th>Alasan/Tujuan Menikah</th>
                    <th>Gaya Berpacaran Catin/Hamil</th>
                    <th>Pekerjaan dan Penghasilan Catin</th>
                    <th>Persetujuan Keluarga</th>
                    <th>Pola Hubungan Orang Tua dan Anak</th>
                    <th>Keterangan Tambahan
                    <th>Hasil</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwalasesmen->penilaian as $penilaian)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $penilaian->asesor->nama }}
                        </td>
                        <td>
                            {{ $penilaian->lama_hubungan }}
                        </td>
                        <td>
                            {{ $penilaian->alasan_menikah }}
                        </td>
                        <td>
                            {{ $penilaian->gaya_berpacaran }}
                        </td>
                        <td>
                            {{ $penilaian->pekerjaan_catin }} dengan penghasilan {{ $penilaian->penghasilan_catin }}
                        </td>
                        <td>
                            {{ $penilaian->persetujuan_keluarga }}
                        </td>
                        <td>
                            {{ $penilaian->pola_hubungan }}
                        </td>
                        <td>
                            {{ $penilaian->keterangan }}
                        </td>
                        <td>
                            {{ ucwords(str_replace('_', ' ', strtolower($penilaian->status_rekomendasi))) }} dengan
                            nilai
                            {{ $penilaian->penilaian }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </main>

    <footer style="margin-top:1rem">
        <table class="table-borderless" style="width:100%">
            <tbody>

                <tr>
                    <td style="text-align: center;">
                        <p>
                            Mengetahui,<br />
                            Kepala UPT PPA Kab. Blitar
                        </p>
                    </td>

                    <td style="text-align: center;">
                        Blitar, {{ \App\Helpers\Formatter::date(now()) }} <br>
                        Wali Calon Pengantin
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:4rem;text-align: center;">
                        ……………………………
                    </td>

                    <td style="padding-top:4rem;text-align: center;">
                        ……………………………
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        {{ $jabatanFungsional->as_kepala_upt->nama }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        NIP: {{ $jabatanFungsional->as_kepala_upt->nip }}
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </footer>
</body>
