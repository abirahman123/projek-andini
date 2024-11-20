@extends('layouts.app')

@section('title', 'Persyaratan Dispensasi')
@section('content')
    <div class="card-body py-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-group">
                <x-atoms.select class="form-control" placeholder="Pilih Periode" data-plugin="select" id="filter">
                    <option value="" id="reset-button">Reset</option>
                    @foreach ($periodes as $periode)
                        <option value="{{ $periode->id }}">{{ $periode->periode }}</option>
                    @endforeach
                </x-atoms.select>
            </div>
            @can($globalModule['create'])
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add-persyaratandispensasi_modal">
                    <i class="fal fa-plus fs-3"></i>
                    <span class="ms-2">
                        Tambah
                    </span>
                </button>
            @endcan
        </div>
        <div class="table-relative">
            {!! $dataTable->table([
                'id' => 'persyaratandispensasi-table',
                'class' => 'table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold',
            ]) !!}
        </div>
    </div>
<<<<<<<< HEAD:resources/views/pages/admin/master/persyaratan/index.blade.php
    @include('pages.admin.master.persyaratan.modal');
    @endsection
========
    @include('pages.admin.master.persyaratan-dispensasi.modal');
@endsection
>>>>>>>> 4fbccbe1c88f8a5a37e138806416bc2154b22b90:resources/views/pages/admin/master/persyaratan-dispensasi/index.blade.php


@push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        $(document).ready(function() {
            const table = $('#persyaratandispensasi-table').DataTable();
            $('#reset-button').hide();

            $('#filter').change(function() {
                const periodeId = $(this).val();
                if (periodeId === "") {
                    table.ajax.url("{{ route('master.persyaratan-dispensasi.index') }}").load();
                } else {
<<<<<<<< HEAD:resources/views/pages/admin/master/persyaratan/index.blade.php
                    table.ajax.url("{{ route('master.persyaratan.index') }}?periodeId=" + periodeId).load();
========
                    table.ajax.url("{{ route('master.persyaratan-dispensasi.index') }}?periodeId=" +
                        periodeId).load();
>>>>>>>> 4fbccbe1c88f8a5a37e138806416bc2154b22b90:resources/views/pages/admin/master/persyaratan-dispensasi/index.blade.php
                }
                $('#reset-button').show();
            });


            $('#reset-button').on('click', function() {
                $('#filter').val('').trigger('change');
                $('#reset-button').hide();
            });
        });
    </script>
@endpush
