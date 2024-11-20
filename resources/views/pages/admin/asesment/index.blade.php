@extends('layouts.app')

@section('content')
@include('pages.admin.asesment.modals')

    <div class="card-body py-4">
        <div class="d-flex align-items-center justify-content-between">
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="periode-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari Periode" />
                </div>
                <div class="d-flex gap-1">

                    {{-- @can($globalModule['create']) --}}
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-maping-modal" data-action="add"
                        data-url="">
                        <i class="fas fa-plus fs-3 me-2"></i>
                        <span class="ms-2">
                            Tambah
                        </span>
                    </button>
                    {{-- @endcan --}}


                </div>
            </div>
        <div class="table-relative">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection
@push('scripts')
        {{ $dataTable->scripts() }}
@endpush
