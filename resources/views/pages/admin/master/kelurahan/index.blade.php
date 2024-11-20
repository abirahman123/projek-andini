@extends('layouts.app')
@section('content')
    <h2>Data Kelurahan</h2>
    <div class="mb-2 mt-3">
        <div class="d-flex align-items-center justify-content-between position-relative mb-3n">
            <div class="d-flex gap-3">
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="kelurahan-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari Kelurahan" />
                </div>
                {{-- <form action="#" class="d-flex flex-row gap-2">
                    <x-atoms.select2 name="filter-kecamatan" id="filter-kecamatan"
                        source="{{ route('reference.kecamatan') }}" placeholder="Semua Kecamatan" />
                </form> --}}

            </div>


            <div class="d-flex gap-1">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-kelurahan-modal"
                    data-action="add" data-url="{{ route('master.kelurahan.store') }}">
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
    @include('pages.admin.master.kelurahan.modals')
    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
