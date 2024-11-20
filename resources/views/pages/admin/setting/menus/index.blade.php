@extends('layouts.app')
@section("title","Menu Management")

@section('content')
    <div class="mb-2 mt-3">
        <div class="d-flex align-items-center justify-content-between position-relative mb-3n">
            <div class="search-box">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="menus-table" id="searchBox" data-action="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Cari Menu" />
            </div>
            <div class="d-flex">
                <form action="{{ route('setting.menus.exportjson') }}" method="post" custom-action>
                    @csrf
                    <button type="submit" class="btn btn-success me-3">
                        <i class="fal fa-file"></i>
                        <span class="ms-2">Export Menus as json</span>
                    </button>
                </form>

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
