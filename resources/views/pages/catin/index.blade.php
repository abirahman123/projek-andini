@extends('layouts.app')
@section("title","catin")

@section('content')
<div class="mb-2 mt-3">
    <div class="d-flex align-items-center justify-content-between position-relative mb-3">
        <div class="search-box">
            <label class="position-absolute" for="searchBox">
                <i class="fal fa-search fs-3"></i>
            </label>
            <input type="text" data-table-id="menus-table" id="searchBox" data-action="search"
         class="form-control form-control-solid" style="width: 250px;" placeholder="Cari Menu" />
        </div>
            @can($globalModule['create'])
            <a href="{{ route('setting.menus.create') }}" class="ms-2">
                <button type="button" class="btn btn-primary">
                    <i class="fal fa-plus fs-2"></i>
                    <span class="ms-2">Tambah</span>
                </button>
            </a>
            @endcan
        </div>
    </div>
</div>

<div class="card-body py-4">
    <div class="table-responsive">
        {{ $dataTable->table() }}
    </div>
</div>

@push('scripts')
{{ $dataTable->scripts() }}
@endpush
@endsection
