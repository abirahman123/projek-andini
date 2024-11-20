@extends('layouts.app')
@section('content')
<h2>Data Kecamatan</h2>
<div class="mb-2 mt-3">
        <div class="d-flex align-items-center justify-content-between position-relative mb-3n">
            <div class="search-box">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="kecamatan-table" id="searchBox" data-action="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Cari Kecamatan" />
            </div>
            <div class="d-flex gap-1">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-kecamatan-modal" data-action="add"
    data-url="{{ route('master.kecamatan.store') }}">
    <i class="fas fa-plus fs-3 me-2"></i>
    <span class="ms-2">
        Tambah
    </span>
</button>

            </div>
        </div>
    </div>
<div class="card-body py-4">
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>
    @include('pages.admin.master.kecamatan.modals')
@push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
