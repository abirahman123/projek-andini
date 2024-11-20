@extends('layouts.app')
@section("title","System Setting")

@section('content')
    @include('pages.admin.setting.system-setting.modal')

    <div class="d-flex justify-content-between mt-4 mb-2">
        <div class="search-box">
            <label class="position-absolute " for="searchBox">
                <i class="fal fa-search fs-3"></i>
            </label>
            <input type="text" data-table-id="filemanagement-table" id="searchBox" data-action="search"
                class="form-control form-control-solid w-250px ps-13" placeholder="Cari Setting" />
        </div>
        <div>
            @can($globalModule['create'])
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-setting_modal">
                    <i class="fas fa-plus fs-3"></i>
                    <span class="ms-2">Tambah</span>
                </button>
            @endcan
            <a href="{{ route('setting.system-setting.history') }}" class="btn btn-warning">
                <i class="fas fa-trash-restore fs-3"></i>
                <span class="ms-2">Restore</span>
            </a>
        </div>
    </div>
    <div class="table-responsive">
        {{ $dataTable->table() }}
    </div>
@endsection



@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
