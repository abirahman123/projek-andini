@extends('layouts.app')
@section('title', 'Data Pegawai')
@section('content')
    <div class="card-body py-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="search-box">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="pegawai-table" id="searchBox" data-action="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Cari Pegawai" />
            </div>
            <div class="d-flex gap-1">

                {{-- @can($globalModule['create']) --}}
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-pegawai-modal" data-action="add"
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

    @include('pages.admin.master.pegawai.modals')
    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            $(function() {
    
                $("#kecamatan_id_field").on("change", function() {
    
                    $("#kelurahan_id_field").select2({
                        placeholder: "Pilih Kelurahan anda",
                        disabled: false,
                        dropdownParent: $("#kelurahan_id_field").parents('form'),
                        ajax: {
                            url: `{{ route('reference.kelurahan') }}?kecamatan_id=${$(this).val()}`,
                            dataType: 'json',
                            processResults: function(data) {
                                return {
                                    results: data.data,
                                };
                            },
                        }
                    });
    
                });
                
                $("#updated_kecamatan_id").on("change", function() {
    
                    $("#updated_kelurahan_id").select2({
                        placeholder: "Pilih Kelurahan anda",
                        readonly: false,
                        dropdownParent: $("#updated_kelurahan_id").parents('form'),
                        ajax: {
                            url: `{{ route('reference.kelurahan') }}?kecamatan_id=${$(this).val()}`,
                            dataType: 'json',
                            processResults: function(data) {
                                return {
                                    results: data.data,
                                };
                            },
                        }
                    });
    
                });
    
            });
        </script>
    @endpush
@endsection
