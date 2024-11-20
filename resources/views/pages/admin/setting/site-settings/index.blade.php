@extends('layouts.app')
@section("title","Site Setting")

@section('content')
    @include('pages.admin.setting.site-settings.modal')
    <div class="mb-3 mt-4">
        <div class="d-flex align-items-center justify-content-between position-relative mb-3">
            <div class="search-box">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="sitesetting-table" id="searchBox" data-action="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Cari Site Setting" />
            </div>
            <div>
                @can($globalModule['create'])
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add-site-setting_modal">
                        <i class="fas fa-plus fs-3"></i>
                        <span class="ms-2">Tambah</span>
                    </button>
                @endcan
                <a href="{{ route('setting.site-settings.history') }}" class="btn btn-warning">
                    <i class="fas fa-trash-restore fs-3"></i>
                    <span class="ms-2">Restore</span>
                </a>
            </div>
        </div>
        <div>
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
