@extends('layouts.app')
@section('title', 'Berkas Persyaratan')

@section('content')
    <div class="mb-2 mt-3">
        <div class="d-flex align-items-center justify-content-between position-relative mb-3n">
            <div class="search-box">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="berkas-catin-table" id="searchBox" data-action="search"
                       class="form-control form-control-solid w-250px ps-13" placeholder="Cari Data Pengajuan" />
            </div>
        </div>
    </div>

    <div class="card-body py-4">
        <div class="table-relative">
            {{ $dataTable->table() }}
        </div>
    </div>


    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
