@extends('layouts.app')
@section('title', 'Catin Asesmen')

@section('content')
    @include('pages.asesor.catin-asesmen.partials.modals')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-4">
                            <i
                                class="fad fa-calendar-alt fs-13 {{ isset($data->catin_asesmen->dispensasi->asesmen_jadwal->tanggal_asesmen) && now()->gt($data->catin_asesmen->dispensasi->asesmen_jadwal->tanggal_asesmen) ? 'text-danger' : 'text-success' }}"></i>
                            <div class="d-flex flex-column">
                                <h3 class="text-muted">Batas Asesmen</h3>
                                <p class="m-0">
                                    {{ isset($data->catin_asesmen->dispensasi->asesmen_jadwal->tanggal_asesmen)? \Carbon\Carbon::parse($data->catin_asesmen->dispensasi->asesmen_jadwal->tanggal_asesmen)->locale('id')->translatedFormat('d F Y, H:i:s'): '-' }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-4">
                            @if ($data->asesmen)
                                <a role='button'
                                    href="{{ route('asesor.catin-asesmen.print.asesmen-penilaian', $data->catin_asesmen->dispensasi->asesmen_jadwal->asesmen_penilaian->id) }}"
                                    class="btn btn-success d-flex justify-content-center align-items-center {{ !$data->asesmen ? 'disabled' : '' }}"
                                    style="height: 5vh">
                                    CETAK ASESMEN
                                </a>
                            @endif
                            @if (isset($data->catin_asesmen->dispensasi->asesmen_jadwal->tanggal_asesmen) && now('Asia/Jakarta')->lt($data->catin_asesmen->dispensasi->asesmen_jadwal->tanggal_asesmen))
                                <button data-action="edit" title="asesmen"
                                    data-url="{{ route('asesor.catin-asesmen.edit', $data->catin_asesmen->dispensasi->asesmen_jadwal->asesmen_penilaian->id) }}"
                                    data-target="#asesmen-modal" data-title="Asesmen" class="btn btn-primary"
                                    style="height: 5vh">
                                    ASESMEN
                                </button>
                            @else
                                <button class="btn btn-primary w-100" style="height: 5vh" disabled>ASESMEN DITUTUP</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="pills-pengantin-pria-tab" data-bs-toggle="pill" data-bs-target="#data-pengantin-pria"
                                type="button" role="tab" aria-controls="data-pengantin-pria" aria-selected="true">
                                Calon Pengantin Pria
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="pills-pengantin-wanita-tab" data-bs-toggle="pill"
                                data-bs-target="#data-pengantin-wanita" type="button" role="tab"
                                aria-controls="data-pengantin-wanita" aria-selected="false">
                                Calon Pengantin Wanita
                            </button>
                        </li>
                        @if ($data->asesmen)
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                    id="pills-asesmen-penilaian-tab" data-bs-toggle="pill"
                                    data-bs-target="#data-asesmen-penilaian" type="button" role="tab"
                                    aria-controls="data-asesmen-penilaian" aria-selected="false">
                                    Asesmen Penilaian
                                </button>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="tab-content pt-4" id="pills-tabContent">
            <div class="tab-pane fade show active" id="data-pengantin-pria" role="tabpanel"
                aria-labelledby="pills-pengantin-pria-tab">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center text-muted">Calon
                                Pengantin Pria
                            </h3>
                            <div class="row mt-5">
                                <div class="col-md-12 d-flex justify-content-center mb-5">
                                    <img src="{{ isset($data->catin_asesmen->dispensasi->catin_pria->pas_foto) ? $data->catin_asesmen->dispensasi->catin_pria->pas_foto : 'default.jpg' }}"
                                        alt="Pas Foto" class="img-fluid img-thumbnail"
                                        style="object-fit: cover; width: 200px; height: 250px; object-position: top;">
                                </div>
                                <div class="col-6 mb-5">
                                    <h5>NIK</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->nik) ? $data->catin_asesmen->dispensasi->catin_pria->nik : '-' }}
                                    </p>
                                    <h5>Nama Lengkap</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->nama_lengkap) ? $data->catin_asesmen->dispensasi->catin_pria->nama_lengkap : '-' }}
                                    </p>
                                    <h5>Jenis Kelamin</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->jenis_kelamin) ? ($data->catin_asesmen->dispensasi->catin_pria->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan') : '-' }}
                                    </p>
                                    <h5>Tempat Lahir</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->tempat_lahir) ? $data->catin_asesmen->dispensasi->catin_pria->tempat_lahir : '-' }}
                                    </p>
                                    <h5>Tanggal Lahir</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->tanggal_lahir)? \Carbon\Carbon::parse($data->catin_asesmen->dispensasi->catin_pria->tanggal_lahir)->locale('id')->translatedFormat('d F Y'): '-' }}
                                    </p>
                                    <h5>Nomor HP</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->nomor_hp) ? $data->catin_asesmen->dispensasi->catin_pria->nomor_hp : '-' }}
                                    </p>
                                    <h5>Pekerjaan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->pekerjaan) ? $data->catin_asesmen->dispensasi->catin_pria->pekerjaan : '-' }}
                                    </p>
                                    <h5>Kecamatan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->kecamatan->nama_kecamatan) ? $data->catin_asesmen->dispensasi->catin_pria->kecamatan->nama_kecamatan : '-' }}
                                    </p>
                                </div>
                                <div class="col-6 mb-5">
                                    <h5>Kelurahan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->kelurahan->nama_kelurahan) ? $data->catin_asesmen->dispensasi->catin_pria->kelurahan->nama_kelurahan : '-' }}
                                    </p>
                                    <h5>Alamat</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->alamat) ? $data->catin_asesmen->dispensasi->catin_pria->alamat : '-' }}
                                    </p>
                                    <h5>Agama</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->agama->agama) ? $data->catin_asesmen->dispensasi->catin_pria->agama->agama : '-' }}
                                    </p>
                                    <h5>Pendidikan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->pendidikan->pendidikan) ? $data->catin_asesmen->dispensasi->catin_pria->pendidikan->pendidikan : '-' }}
                                    </p>
                                    <h5>Nama Ayah</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->nama_ayah) ? $data->catin_asesmen->dispensasi->catin_pria->nama_ayah : '-' }}
                                    </p>
                                    <h5>Nama Ibu</h5 <p class="mb-4">
                                    {{ isset($data->catin_asesmen->dispensasi->catin_pria->nama_ibu) ? $data->catin_asesmen->dispensasi->catin_pria->nama_ibu : '-' }}
                                    </p>
                                    <h5>Nama Wali</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->nama_wali) ? $data->catin_asesmen->dispensasi->catin_pria->nama_wali : '-' }}
                                    </p>
                                    <h5>Status Verifikasi</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_pria->status_verifikasi) ? $data->catin_asesmen->dispensasi->catin_pria->status_verifikasi : '-' }}
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 5%">PRATINJAU</th>
                                                <th style="width: 30%">PERSYARATAN</th>
                                                <th class="text-center" style="width: 10%">STATUS</th>
                                                <th style="width: 55%">KETERANGAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data->persyaratan->pria as $pria)
                                                <tr>
                                                    <td class="text-center" style="width: 5%">
                                                        @if (!empty($pria->file_path['preview']) && Storage::exists($pria->file_path['path']))
                                                            <button data-action="preview"
                                                                data-url="{{ $pria->file_path['preview'] }}"
                                                                data-modal-id="preview-modal" data-title="Pratinjau File"
                                                                class="btn btn-sm btn-light">
                                                                <i class="fad fa-eye"></i>
                                                            </button>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td style="width: 30%">
                                                        {{ isset($pria->persyaratan->nama_persyaratan) ? $pria->persyaratan->nama_persyaratan : '-' }}
                                                    </td>
                                                    <td class="text-center" style="width: 10%">
                                                        {{ isset($pria->status) ? $pria->status : '-' }}</td>
                                                    <td style="width: 55%">
                                                        {{ isset($pria->keterangan) ? $pria->keterangan : '-' }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="4">Tidak Ada Persyaratan</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="data-pengantin-wanita" role="tabpanel"
                aria-labelledby="pills-pengantin-wanita-tab">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center text-muted">Calon
                                Pengantin Wanita</h3>
                            <div class="row mt-5">
                                <div class="col-md-12 d-flex justify-content-center mb-5">
                                    <img src="{{ isset($data->catin_asesmen->dispensasi->catin_wanita->pas_foto) ? $data->catin_asesmen->dispensasi->catin_wanita->pas_foto : 'default.jpg' }}"
                                        alt="Pas Foto" class="img-fluid img-thumbnail"
                                        style="object-fit: cover; width: 200px; height: 250px; object-position: top;">
                                </div>
                                <div class="col-6">
                                    <h5>NIK</h5 <p class="mb-4">
                                    {{ isset($data->catin_asesmen->dispensasi->catin_wanita->nik) ? $data->catin_asesmen->dispensasi->catin_wanita->nik : '-' }}
                                    </p>
                                    <h5>Nama Lengkap</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->nama_lengkap) ? $data->catin_asesmen->dispensasi->catin_wanita->nama_lengkap : '-' }}
                                    </p>
                                    <h5>Jenis Kelamin</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->jenis_kelamin) ? ($data->catin_asesmen->dispensasi->catin_wanita->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan') : '-' }}
                                    </p>
                                    <h5>Tempat Lahir</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->tempat_lahir) ? $data->catin_asesmen->dispensasi->catin_wanita->tempat_lahir : '-' }}
                                    </p>
                                    <h5>Tanggal Lahir</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->tanggal_lahir)? \Carbon\Carbon::parse($data->catin_asesmen->dispensasi->catin_wanita->tanggal_lahir)->locale('id')->translatedFormat('d F Y'): '-' }}
                                    </p>
                                    <h5>Nomor HP</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->nomor_hp) ? $data->catin_asesmen->dispensasi->catin_wanita->nomor_hp : '-' }}
                                    </p>
                                    <h5>Pekerjaan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->pekerjaan) ? $data->catin_asesmen->dispensasi->catin_wanita->pekerjaan : '-' }}
                                    </p>
                                    <h5>Kecamatan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->kecamatan->nama_kecamatan) ? $data->catin_asesmen->dispensasi->catin_wanita->kecamatan->nama_kecamatan : '-' }}
                                    </p>
                                </div>
                                <div class="col-6 mb-5">
                                    <h5>Kelurahan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->kelurahan->nama_kelurahan) ? $data->catin_asesmen->dispensasi->catin_wanita->kelurahan->nama_kelurahan : '-' }}
                                    </p>
                                    <h5>Alamat</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->alamat) ? $data->catin_asesmen->dispensasi->catin_wanita->alamat : '-' }}
                                    </p>
                                    <h5>Agama</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->agama->agama) ? $data->catin_asesmen->dispensasi->catin_wanita->agama->agama : '-' }}
                                    </p>
                                    <h5>Pendidikan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->pendidikan->pendidikan) ? $data->catin_asesmen->dispensasi->catin_wanita->pendidikan->pendidikan : '-' }}
                                    </p>
                                    <h5>Nama Ayah</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->nama_ayah) ? $data->catin_asesmen->dispensasi->catin_wanita->nama_ayah : '-' }}
                                    </p>
                                    <h5>Nama Ibu</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->nama_ibu) ? $data->catin_asesmen->dispensasi->catin_wanita->nama_ibu : '-' }}
                                    </p>
                                    <h5>Nama Wali</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->nama_wali) ? $data->catin_asesmen->dispensasi->catin_wanita->nama_wali : '-' }}
                                    </p>
                                    <h5>Status Verifikasi</h5>
                                    <p class="mb-4">
                                        {{ isset($data->catin_asesmen->dispensasi->catin_wanita->status_verifikasi) ? $data->catin_asesmen->dispensasi->catin_wanita->status_verifikasi : '-' }}
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 5%">PRATINJAU</th>
                                                <th style="width: 30%">PERSYARATAN</th>
                                                <th class="text-center" style="width: 10%">STATUS</th>
                                                <th style="width: 55%">KETERANGAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data->persyaratan->wanita as $wanita)
                                                <tr>
                                                    <td class="text-center" style="width: 5%">
                                                        @if (!empty($wanita->file_path['preview']) && Storage::exists($wanita->file_path['path']))
                                                            <button data-action="preview"
                                                                data-url="{{ $wanita->file_path['preview'] }}"
                                                                data-modal-id="preview-modal" data-title="Pratinjau File"
                                                                class="btn btn-sm btn-light">
                                                                <i class="fad fa-eye"></i>
                                                            </button>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td style="width: 30%">
                                                        {{ isset($wanita->persyaratan->nama_persyaratan) ? $wanita->persyaratan->nama_persyaratan : '-' }}
                                                    </td>
                                                    <td class="text-center" style="width: 10%">
                                                        {{ isset($wanita->status) ? $wanita->status : '-' }}
                                                    </td>
                                                    <td style="width: 55%">
                                                        {{ isset($wanita->keterangan) ? $wanita->keterangan : '-' }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="4">Tidak Ada Persyaratan</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="data-asesmen-penilaian" role="tabpanel"
                aria-labelledby="pills-pengantin-wanita-tab">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center text-muted">Asesmen Penilaian</h3>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <h5>Lama Hubungan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->lama_hubungan) ? $data->asesmen_penilaian->lama_hubungan : '-' }}
                                    </p>
                                    <h5>Alasan Menikah</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->alasan_menikah) ? $data->asesmen_penilaian->alasan_menikah : '-' }}
                                    </p>
                                    <h5>Gaya Berpacaran</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->gaya_berpacaran) ? $data->asesmen_penilaian->gaya_berpacaran : '-' }}
                                    </p>
                                    <h5>Pekerjaan Catin</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->pekerjaan_catin) ? $data->asesmen_penilaian->pekerjaan_catin : '-' }}
                                    </p>
                                    <h5>Penghasilan Catin</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->penghasilan_catin) ? $data->asesmen_penilaian->penghasilan_catin : '-' }}
                                    </p>
                                    <h5>Keterangan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->keterangan) ? $data->asesmen_penilaian->keterangan : '-' }}
                                    </p>
                                </div>
                                <div class="col-6 mb-5">
                                    <h5>Persetujuan Keluarga</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->persetujuan_keluarga) ? $data->asesmen_penilaian->persetujuan_keluarga : '-' }}
                                    </p>
                                    <h5>Pola Hubungan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->pola_hubungan) ? $data->asesmen_penilaian->pola_hubungan : '-' }}
                                    </p>
                                    <h5>Penilaian</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->penilaian) ? $data->asesmen_penilaian->penilaian : '-' }}
                                    </p>
                                    <h5>Catatan</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->catatan) ? $data->asesmen_penilaian->catatan : '-' }}
                                    </p>
                                    <h5>Status Rekomendasi</h5>
                                    <p class="mb-4">
                                        {{ isset($data->asesmen_penilaian->status_rekomendasi) ? $data->asesmen_penilaian->status_rekomendasi : '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body d-flex justify-content-end">
        <a href="{{ route('asesor.catin-asesmen.index') }}" class="btn btn-outline-primary">Kembali</a>
    </div>

    @push('scripts')
        <script>
            $('button[data-action="edit"]').on("click", function(ev) {
                ev.preventDefault();
                const {
                    url,
                    target
                } = $(this).data();
                showPageOverlay();
                $.ajax({
                    url: url,
                    method: "GET",
                    dataType: "json",
                    timeout: 2000,
                    success: function(data) {
                        const form = $(`${target} form`);
                        const exceptFields = {};
                        const formAction = form.attr("action");

                        form.find('select[data-plugin="select-2"][data-source]').each(
                            function() {
                                const name = $(this).attr("name");
                                exceptFields[name] = {
                                    value: data[name].value,
                                    label: data[name].label,
                                };
                            }
                        );

                        fillForm(form, data, exceptFields);
                        form.attr("action", formAction.replace(/\{id\}/, data.id));

                        $(target).modal("show");
                    },
                    error: function(jqXhr) {
                        handleAjaxError(jqXhr);
                    },
                    complete: hidePageOverlay,
                });
            });
            $(document).on('form-submitted:asesmen-modal-form', function() {
                window.location.reload();
            });
        </script>
    @endpush
@endsection
