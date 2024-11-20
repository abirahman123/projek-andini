@extends('layouts.app')
@section('title', 'Lengkapi Berkas Persyaratan')

@section('content')
    @include('pages.catin.berkas-persyaratan.partials.modals')

    <div class="py-2">
        <a href="{{ route('berkas-persyaratan.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left fs-3"></i>
            <span class="ms-2">
                Kembali
            </span>
        </a>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-primary-subtle">
            <div class="d-flex">
                <i class="far fa-mars fs-7 me-4 text-info"></i>
                <div>
                    <h5 class="fw-bolder m-0 mb-1">
                        Berkas Persyaratan Calon Pengantin Pria
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card shadow-none border-1">
                <div class="d-flex align-items-center p-3">
                    <div class="avatar avatar-circle avatar-sm me-3">
                        <img class="avatar-img" width="50px" src="{{ $berkas_persyaratan->catin_pria->pas_foto }}"
                            alt="Foto">
                    </div>
                    <div class="d-flex flex-column">
                        <p class="m-0 text-gray-800 text-hover-primary fw-bolder">
                            {{ $berkas_persyaratan->catin_pria->nama_lengkap }}</p>
                        <small class="text-muted">NIK. {{ $berkas_persyaratan->catin_pria->nik }}</small>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                {{ $persyaratanPria->table() }}
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-danger-subtle">
            <div class="d-flex">
                <i class="far fa-venus fs-7 me-4 text-danger"></i>
                <div>
                    <h5 class="fw-bolder m-0 mb-1">
                        Berkas Persyaratan Calon Pengantin Wanita
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card shadow-none border-1">
                <div class="d-flex align-items-center p-3">
                    <div class="avatar avatar-circle avatar-sm me-3">
                        <img class="avatar-img" width="50px" src="{{ $berkas_persyaratan->catin_wanita->pas_foto }}"
                            alt="Foto">
                    </div>
                    <div class="d-flex flex-column">
                        <p class="m-0 text-gray-800 text-hover-primary fw-bolder">
                            {{ $berkas_persyaratan->catin_wanita->nama_lengkap }}</p>
                        <small class="text-muted">NIK. {{ $berkas_persyaratan->catin_wanita->nik }}</small>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                {{ $persyaratanWanita->table() }}
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $persyaratanPria->scripts() }}
        {{ $persyaratanWanita->scripts() }}
    @endpush

@endsection
