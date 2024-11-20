@extends('layouts.app')
@section('title', 'Jadwal Asesmen')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-semibold fs-5">Detail Asesmen</h3>
                {!! $status !!}
            </div>
            <div class="d-flex flex-row gap-2">


                <a role='button'
                    href="{{ route('asesmen.jadwal-asesmen.print.surat-dispensasi-nikah', ['jadwalasesmen' => $jadwalasesmen->id]) }}"
                    class="btn btn-success">
                    <i class="ti ti-printer fs-4 me-2"></i>Cetak Surat Dispensasi Nikah
                </a>
            </div>
        </div>
        <div class="my-4">
            <form action="#" method="POST" id="detail-jadwal-asesmen">
                <div class="row py-2">
                    <div class="row col-md-6">
                        <div class="d-flex mb-3 align-items-center">
                            <i class="far fa-mars fs-7 me-2 text-info"></i>
                            <h5 class="fw-bolder m-0 mb-1">
                                Identitas Calon Pengantin Pria
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($catinPria->pas->foto ?? 'assets/images/profile/user-1.jpg') }}"
                                alt="catin pria" class="img-fluid rounded" />
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>Nama</dt>
                                <dd>{{ $catinPria->nama_lengkap }}</dd>
                                <dt>NIK</dt>
                                <dd>{{ $catinPria->nik }}</dd>
                                <dt>Tempat & Tanggal Lahir</dt>
                                <dd>{{ $catinPria->tempat_lahir }},
                                    {{ \App\Helpers\Formatter::date($catinPria->tanggal_lahir) }}</dd>
                                <dt>Jenis Kelamin</dt>
                                <dd>{{ $catinPria->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6 pt-3">
                            <dl>
                                <dt>Nama Ayah</dt>
                                <dd>{{ $catinPria->nama_ayah }}</dd>
                                <dt>Nama Wali</dt>
                                <dd>{{ $catinPria->nama_wali }}</dd>
                                <dt>Pekerjaan</dt>
                                <dd>{{ $catinPria->pekerjaan }}</dd>
                                <dt>Kecamatan</dt>
                                <dd>{{ $catinPria->kecamatan->nama_kecamatan }}</dd>
                                <dt>Alamat</dt>
                                <dd>{{ $catinPria->alamat }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6 mb-6  pt-3">
                            <dl>
                                <dt>Nama Ibu</dt>
                                <dd>{{ $catinWanita->nama_ibu }}</dd>
                                <dt>Agama</dt>
                                <dd>{{ $catinPria->agama->agama }}</dd>
                                <dt>Pendidikan</dt>
                                <dd>{{ $catinWanita->pendidikan->pendidikan }}</dd>
                                <dt>Kelurahan</dt>
                                <dd>{{ $catinWanita->kelurahan->nama_kelurahan }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <div class="d-flex mb-3 align-items-center">
                            <i class="far fa-venus fs-7 me-2 text-danger"></i>
                            <h5 class="fw-bolder m-0 mb-1">
                                Identitas Calon Pengantin Wanita
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($catinWanita->pas->foto ?? 'assets/images/profile/user-3.jpg') }}"
                                alt="catin wanita" class="img-fluid rounded" />
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>Nama</dt>
                                <dd>{{ $catinWanita->nama_lengkap }}</dd>
                                <dt>NIK</dt>
                                <dd>{{ $catinWanita->nik }}</dd>
                                <dt>Tempat & Tanggal Lahir</dt>
                                <dd>{{ $catinWanita->tempat_lahir }},
                                    {{ \App\Helpers\Formatter::date($catinWanita->tanggal_lahir) }}</dd>
                                <dt>Jenis Kelamin</dt>
                                <dd>{{ $catinWanita->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>

                            </dl>
                        </div>
                        <div class="col-md-6  pt-3">
                            <dl>
                                <dt>Nama Ayah</dt>
                                <dd>{{ $catinWanita->nama_ayah }}</dd>
                                <dt>Nama Wali</dt>
                                <dd>{{ $catinWanita->nama_wali }}</dd>
                                <dt>Pekerjaan</dt>
                                <dd>{{ $catinWanita->pekerjaan }}</dd>
                                <dt>Kecamatan</dt>
                                <dd>{{ $catinWanita->kecamatan->nama_kecamatan }}</dd>
                                <dt>Alamat</dt>
                                <dd>{{ $catinWanita->alamat }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6 mb-6  pt-3">
                            <dl>
                                <dt>Nama Ibu</dt>
                                <dd>{{ $catinWanita->nama_ibu }}</dd>
                                <dt>Agama</dt>
                                <dd>{{ $catinWanita->agama->agama }}</dd>
                                <dt>Pendidikan</dt>
                                <dd>{{ $catinWanita->pendidikan->pendidikan }}</dd>
                                <dt>Kelurahan</dt>
                                <dd>{{ $catinWanita->kelurahan->nama_kelurahan }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <h5 class="fw-bolder my-3">
                    Jadwal Asesmen
                </h5>
                <div class="row">
                    <div class="col-md-12 mb-6">
                        <x-atoms.form-label>Nama Pemohon</x-atoms.form-label>
                        <x-atoms.input id="nama_pemohon" name="nama_pemohon" type="text" class="form-control"
                            value="{{ $jadwalasesmen->dispensasi->register->nama }}" disabled />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-6">
                        <x-atoms.form-label>Periode</x-atoms.form-label>
                        <x-atoms.input id="periode" name="periode" type="text" class="form-control"
                            value="{{ $jadwalasesmen->periode->periode }}" disabled />
                    </div>
                    <div class="col-md-6 mb-6">
                        <x-atoms.form-label>Tanggal & Jam</x-atoms.form-label>
                        <x-atoms.input id="tanggal_asesmen" name="tanggal_asesmen" type="text" class="form-control"
                            value="{{ \App\Helpers\Formatter::date($jadwalasesmen->tanggal_asesmen, 'd F Y H:i') }}"
                            disabled />
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6 mb-6">
                        <x-atoms.form-label>Catatan</x-atoms.form-label>
                        <x-atoms.textarea id="catatan" name="catatan"
                            disabled>{{ $jadwalasesmen->catatan }}</x-atoms.textarea>
                    </div>
                    <div class="col-md-6 mb-6">
                        <x-atoms.form-label>Keterangan</x-atoms.form-label>
                        <x-atoms.textarea id="keterangan" name="keterangan"
                            disabled>{{ $jadwalasesmen->keterangan }}</x-atoms.textarea>
                    </div>
                </div>



        </div>
    </div>
    </form>
    <hr class="my-2">
    <div class="d-flex flex-row justify-content-between align-items-center">
        <h5 class="fw-bolder my-3">
            Hasil Asesmen
        </h5>
        <div>
            <a role='button'
                href="{{ route('asesmen.jadwal-asesmen.print.hasil-asesmen', ['jadwalasesmen' => $jadwalasesmen->id]) }}"
                class="btn btn-primary">
                <i class="ti ti-printer fs-4 me-2"></i>Cetak Hasil Asesmen
            </a>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive mt-4">
            {{ $dataTable->table() }}
        </div>
    </div>

    </div>
    <div class="row text-end">
        <div class="col-md-12 mb-3">
            <a href="{{ route('asesmen.jadwal-asesmen.index') }}" class="btn btn-outline-primary">Kembali</a>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
