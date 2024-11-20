@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card zoom-in">
                <div class="card-body">
                    <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#data-dispensasi"
                                type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                                Data Dispensasi
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#data-pengantin-pria"
                                type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">
                                Data Pengantin Pria
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#data-pengantin-wanita"
                                type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">
                                Data Pengantin Wanita
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content pt-4" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="data-dispensasi" role="tabpanel">
                            <div class="p-1 mx-0 bg-light-subtle row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Tanggal Pengajuan</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->tanggal_pengajuan }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 bg-light-subtle row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nama Pendaftar</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->register->user->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 bg-light-subtle row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nomor Telepon</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->register->nomor_hp }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 bg-light-subtle row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Status Pengajuan</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        @if ($catin->status_persetujuan === 'SUBMITTED')
                                            <span class="badge bg-warning">Menunggu Persetujuan</span>
                                        @elseif($catin->status_persetujuan === 'APPROVED')
                                            <span class="badge bg-success">Disetujui</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 bg-light-subtle row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Keterangan</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->keterangan ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data-pengantin-pria" role="tabpanel">
                            <div class="p-1 mx-0 row">
                                <div class="col-12">
                                    <img src="{{ asset($catin->catin_pria->pas_foto) }}" alt="Foto Pengantin Pria"
                                        class="img-fluid mx-auto d-block" style="max-width: 100%; max-height: 300px;" />
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">NIK</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->nik }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nama Pengantin</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->nama_lengkap }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Tempat, Tgl. Lahir</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->tempat_lahir }}, {{ $catin->catin_pria->tanggal_lahir }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nomor HP</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->nomor_hp }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Pekerjaan</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->pekerjaan }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->alamat }},
                                        {{ $catin->catin_pria->kelurahan->nama_kelurahan }},
                                        {{ $catin->catin_pria->kecamatan->nama_kecamatan }},
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Agama</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->agama->agama }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Pendidikan</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->pendidikan->pendidikan }}
                                    </p>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nama Ayah</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->nama_ayah }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nama Ibu</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->nama_ibu }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nama Wali</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_pria->nama_wali }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data-pengantin-wanita" role="tabpanel">
                            <div class="p-1 mx-0 row">
                                <div class="col-12">
                                    <img src="{{ asset($catin->catin_wanita->pas_foto) }}" alt="Foto Pengantin Pria"
                                        class="img-fluid mx-auto d-block" style="max-width: 100%; max-height: 300px;" />
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">NIK</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->nik }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nama Pengantin</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->nama_lengkap }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Tempat, Tgl. Lahir</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->tempat_lahir }},
                                        {{ $catin->catin_wanita->tanggal_lahir }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nomor HP</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->nomor_hp }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Pekerjaan</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->pekerjaan }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->alamat }},
                                        {{ $catin->catin_wanita->kelurahan->nama_kelurahan }},
                                        {{ $catin->catin_wanita->kecamatan->nama_kecamatan }},
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Agama</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->agama->agama }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Pendidikan</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->pendidikan->pendidikan }}
                                    </p>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nama Ayah</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->nama_ayah }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nama Ibu</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->nama_ibu }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-1 mx-0 row">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <label class="col-form-label">Nama Wali</label>
                                </div>
                                <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                                    <p class="m-0">
                                        {{ $catin->catin_wanita->nama_wali }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row text-end">
                        <div class="col-md-12 mb-3">
                            <a href="{{ route('catin.catin.index') }}" class="btn btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
