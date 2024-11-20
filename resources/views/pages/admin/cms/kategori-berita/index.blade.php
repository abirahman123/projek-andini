@extends('layouts.app')
@section('title','Kategori Berita')

@section('content')
    <div class="card-body py-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="search-box">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="kategori_berita-table" id="searchBox" data-action="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Cari Kategori" />
            </div>
            <div class="d-flex gap-1">
                @if (request()->routeIs('cms.kategori-berita.histori'))
                    <a href="{{ route('cms.kategori-berita.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left fs-3"></i>
                        <span class="ms-2">
                            Kembali
                        </span>
                    </a>
                @else
                    @can($globalModule['create'])
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-kategori_berita_modal"
                            data-action="add" data-url="">
                            <i class="fas fa-plus fs-3 me-2"></i>
                            <span class="ms-2">
                                Tambah
                            </span>
                        </button>
                    @endcan
                    <a href="{{ route('cms.kategori-berita.histori') }}" class="btn btn-warning">
                        <i class="fas fa-trash-restore fs-3 me-2"></i>
                        <span class="ms-2">
                            Riwayat Terhapus
                        </span>
                    </a>
                @endif
            </div>
        </div>
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>


    @include('pages.admin.cms.kategori-berita.partials.modals')

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            const tableId = 'kategori_berita-table';

            $(document).ready(function() {
                $('[data-kt-user-table-filter="search"]').on('input', function() {
                    window.LaravelDataTables[`${tableId}`].search($(this).val()).draw();
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            });
        </script>
    @endpush
@endsection
