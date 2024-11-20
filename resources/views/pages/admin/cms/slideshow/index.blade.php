@extends('layouts.app')
@section('title','Slideshow')

@section('content')
    @include('pages.admin.cms.slideshow.partials.modals')

    <div class="app-container">
        <div class="py-4">
            <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="slideshow-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari Slide Show" />
                </div>
                <div class="d-flex gap-2">
                    @if (request()->routeIs('cms.slideshow.histori'))
                        <a href="{{ route('cms.slideshow.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left fs-3"></i>
                            <span class="ms-2">
                                Kembali
                            </span>
                        </a>
                    @else
                        @can($globalModule['create'])
                            <button data-bs-toggle="modal" data-bs-target="#slideshow_modal" class="btn btn-primary">
                                <i class="fas fa-plus fs-3"></i>
                                <span class="ms-2">Tambah</span>
                            </button>
                        @endcan
                        <a href="{{ route('cms.slideshow.histori') }}" class="btn btn-warning">
                            <i class="fas fa-trash-restore fs-3"></i>
                            <span class="ms-2">
                                Restore
                            </span>
                        </a>
                    @endif
                </div>
            </div>

        </div>

        <div class="table-relative">
            {{ $dataTable->table() }}
        </div>

    </div>


    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
