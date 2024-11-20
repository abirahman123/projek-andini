@extends('layouts.app')

@push('vendor-css')
    <link rel="stylesheet" href="{{ asset('assets/libs/viewer/viewer.min.css') }}">
@endpush

@push('css')
    <style>
        .aspect-1 {
            position: relative;
            width: 100%;
            padding-bottom: 100%;
            overflow: hidden;
        }

        .aspect-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #mising-image_container {
            display: block;
            text-align: center;
            padding: 6em 4em;
            background: rgb(241, 241, 241);
            border-radius: .3em;
            color: black;
        }
    </style>
@endpush

@section('content')
    <div class="app-container">
        <div class="py-4">
            <div class="d-flex flex-md-row flex-column gap-2 align-items-center w-100">
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="verifikasi-catin-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-300px ps-13" placeholder="Cari Pengantin Pria/Wanita" />
                </div>

                <div class="filter-box">
                    <x-atoms.select2 name="filter-status" id="filter-status" placeholder="Filter Status">
                        <option value="">Semua Status</option>
                        <option value="SUBMITTED">Menunggu Persetujuan</option>
                        <option value="APPROVED">Disetujui</option>
                        <option value="REJECTED">Ditolak</option>
                    </x-atoms.select2>
                </div>

            </div>

        </div>

        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>

    </div>

    @push('vendor-scripts')
        <script src="{{ asset('assets/libs/viewer/viewer.min.js') }}"></script>
    @endpush
    @push('scripts')
        {{ $dataTable->scripts() }}

        <script>
            $(function() {
                function checkFilter() {
                    let table = window.LaravelDataTables['verifikasi-catin-table'];
                    let url = "{{ route('catin.verifikasi-catin.index') }}?";
                    let status = $('#filter-status').val();

                    if (status) {
                        url += "status=" + status + "&";
                    }
                    table.ajax.url(url).load();
                }

                $('#filter-status').on('change', function() {
                    const filter = $(this).val();
                    checkFilter();
                });

                $('#searchBox').on('input', function() {
                    let table = window.LaravelDataTables['verifikasi-catin-table'];
                    table.search(this.value).draw();
                });
            });
        </script>
    @endpush
@endsection
