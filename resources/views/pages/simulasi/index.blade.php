@extends('layouts.app')
@section("title","Jabatan Fungsional")

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
                @can($globalModule['create'])
                        <button type="button" id="tombol-tambah" class="btn btn-primary">
                            <i class="fal fa-plus fs-2"></i>
                            <span class="ms-2">Tambah</span>
                        </button>
                @endcan
            </div>
        </div>

    </div>

    <div class="card-body py-4">
        <div class="table-responsive">
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#tombol-tambah').click(function (e){
                    e.preventDefault();
                    Swal.fire('Sukses', 'Sukses', 'success');
                })
            })
        </script>
    @endpush
@endsection
