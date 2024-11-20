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
            <h3>Asesmen Penilaian</h3>
        </center>

        <table class="table-borderless" style="border:none;width:100%;margin-top:2em;">
            <thead>
                <tr>
                    <td>
                        Nama Catin Pria
                    </td>
                    <td>:</td>
                    <td> {{ $data->catin->pria->nama }}</td>
                    <td>
                        Nama Catin Wanita
                    </td>
                    <td>:</td>
                    <td>{{ $data->catin->wanita->nama }}</td>
                </tr>
                <tr>
                    <td>
                        Alamat Catin Pria
                    </td>
                    <td>:</td>
                    <td>{{ $data->catin->pria->alamat }},
                        Kel. {{ $data->catin->pria->kelurahan }} ,
                        Kec. {{ $data->catin->pria->kecamatan }}</td>
                    <td>
                        Alamat Catin Wanita
                    </td>
                    <td>:</td>
                    <td>{{ $data->catin->wanita->alamat }},
                        Kel. {{ $data->catin->wanita->kelurahan }} ,
                        Kec. {{ $data->catin->wanita->kecamatan }}</td>
                </tr>
                <tr>
                    <td>
                        Umur Catin Pria
                    </td>
                    <td>:</td>
                    <td> {{ $data->catin->pria->umur }} Tahun</td>
                    <td>
                        Umur Catin Wanita
                    </td>

                    <td>:</td>
                    <td>
                        {{ $data->catin->wanita->umur }} Tahun
                    </td>
                </tr>
            </thead>
        </table>

        <table style="margin-top:1rem;">
            <thead>
                <tr>
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
                    <tr>
                        <td>
                            {{ $data->penilaian->lama_hubungan }}
                        </td>
                        <td>
                            {{ $data->penilaian->alasan_menikah }}
                        </td>
                        <td>
                            {{ $data->penilaian->gaya_berpacaran }}
                        </td>
                        <td>
                            {{ $data->penilaian->pekerjaan_catin }} dengan penghasilan {{ $data->penilaian->penghasilan_catin }}
                        </td>
                        <td>
                            {{ $data->penilaian->persetujuan_keluarga }}
                        </td>
                        <td>
                            {{ $data->penilaian->pola_hubungan }}
                        </td>
                        <td>
                            {{ $data->penilaian->keterangan }}
                        </td>
                        <td>
                            {{ ucwords(str_replace('_', ' ', strtolower($data->penilaian->status_rekomendasi))) }}
                        </td>
                    </tr>
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
                        <p>
                            Asesor
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

                    <td style="padding-top:4rem;text-align: center;">
                        ……………………………
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        {{ $data->kepala_upt->nama }}
                    </td>
                    <td style="text-align: center;">
                        {{ $data->asesor }}
                    </td>
                    <td style="text-align: center;">
                        {{ $data->wali }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        NIP: {{ $data->kepala_upt->nip }}
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>
</body>
