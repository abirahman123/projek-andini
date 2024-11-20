@extends('layouts.app')
@section('content')
    @include('pages.admin.verifikasi-catin.partials.modals')
    <div class="row">
        <div class="col-12">
            <div class="card zoom-in">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h4 class="card-title">Detail Dipensasi</h4>
                        </div>
                        <div class="col-md-6 mb-3 text-end">
                            <a href="{{ route('catin.verifikasi-catin.index') }}" class="btn btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="p-1 mx-0 bg-light-subtle row">
                        <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                            <label class="col-form-label">Tanggal Pengajuan</label>
                        </div>
                        <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                            <p class="m-0">
                                {{ $verifikasi_catin->tanggal_pengajuan }}
                            </p>
                        </div>
                    </div>
                    <div class="p-1 mx-0 bg-light-subtle row">
                        <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                            <label class="col-form-label">Nama Pendaftar</label>
                        </div>
                        <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                            <p class="m-0">
                                {{ $verifikasi_catin->register->user->name }}
                            </p>
                        </div>
                    </div>
                    <div class="p-1 mx-0 bg-light-subtle row">
                        <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                            <label class="col-form-label">Nomor Telepon</label>
                        </div>
                        <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                            <p class="m-0">
                                {{ $verifikasi_catin->register->nomor_hp }}
                            </p>
                        </div>
                    </div>
                    <div class="p-1 mx-0 bg-light-subtle row">
                        <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                            <label class="col-form-label">Status Pengajuan</label>
                        </div>
                        <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                            <p class="m-0">
                                @if ($verifikasi_catin->status_persetujuan === 'SUBMITTED')
                                    <span class="badge bg-warning">Menunggu Persetujuan</span>
                                @elseif($verifikasi_catin->status_persetujuan === 'APPROVED')
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
                                {{ $verifikasi_catin->keterangan ?? '-' }}
                            </p>
                        </div>
                    </div>
                    <div class="p-1 mx-0 bg-light-subtle row">
                        <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                            <label class="col-form-label">Aksi</label>
                        </div>
                        <div class="col-7 col-sm-8 col-md-9 col-lg-10 d-flex align-items-center">
                            @if ($verifikasi_catin->status_persetujuan == 'SUBMITTED')
                                @if ($persyaratan_catin_pria == $semua_persyaratan && $persyaratan_catin_wanita == $semua_persyaratan)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#verifikasi-create-modal">
                                        <i class="fas fa-edit fs-3"></i>
                                        <span class="ms-2">Verifikasi</span>
                                    </button>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i
                                            class="fas fa-edit me-2"></i>Verifikasi</a>
                                @endif
                            @elseif ($verifikasi_catin->status_persetujuan === 'APPROVED')
                                <span class="badge bg-light text-dark">Sudah Diverifikasi</span>
                            @else
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#reset-create-modal">
                                    <i class="fas fa-edit fs-3"></i>
                                    <span class="ms-2">Reset Dispensasi</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="card-title">Data Pengantin Pria & Wanita</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tempat, Tgl. Lahir</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="{{ route('catin.persyaratan-catin', $verifikasi_catin->catin_pria->id) }}"
                                            class="btn btn-light"><i class="fas fa-pen fs-3 me-2"></i> Verifikasi
                                            Persyaratan</a>
                                    </td>
                                    <td>{{ $verifikasi_catin->catin_pria->nama_lengkap }}</td>
                                    <td>{{ $verifikasi_catin->catin_pria->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </td>
                                    <td>{{ $verifikasi_catin->catin_pria->tempat_lahir }},
                                        {{ $verifikasi_catin->catin_pria->tanggal_lahir }}</td>
                                    <td>
                                        @if ($persyaratan_catin_pria == $semua_persyaratan)
                                            <span class="badge bg-success">Sudah Verifikasi</span>
                                        @else
                                            <span class="badge bg-warning">Belum Verifikasi</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('catin.persyaratan-catin', $verifikasi_catin->catin_wanita->id) }}"
                                            class="btn btn-light"><i class="fas fa-pen fs-3 me-2"></i> Verifikasi
                                            Persyaratan</a>
                                    </td>
                                    <td>{{ $verifikasi_catin->catin_wanita->nama_lengkap }}</td>
                                    <td>{{ $verifikasi_catin->catin_wanita->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </td>
                                    <td>{{ $verifikasi_catin->catin_wanita->tempat_lahir }},
                                        {{ $verifikasi_catin->catin_wanita->tanggal_lahir }}</td>
                                    <td>
                                        @if ($persyaratan_catin_wanita == $semua_persyaratan)
                                            <span class="badge bg-success">Sudah Verifikasi</span>
                                        @else
                                            <span class="badge bg-warning">Belum Verifikasi</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('form-submitted:verifikasi-create-modal-form', function() {
            window.location.reload();
        });

        $(document).on('form-submitted:reset-create-modal-form', function() {
            window.location.reload();
        });
    </script>
@endpush
