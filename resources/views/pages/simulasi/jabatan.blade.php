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
            {{ $dataTable->table() }}
        </div>
    </div>

    <div class="modal fade" id="modal-tambah">
        <div class="modal-content">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data jabatan</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close" id="btn-close">
                    <i class="fal fa-times fs-4"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit">
        <div class="modal-content">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-header">
                    <h5 class="modal-title">Edit data jabatan</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close" id="btn-close">
                    <i class="fal fa-times fs-4"></i>
                </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            $(document).ready(function () {
                $('#tombol-tambah').click(function (e){
                    e.preventDefault();
                    $('#modal-tambah').modal('show');
                })
                $('#tombol-close').click(function (e){
                    e.preventDefault();
                    $('#modal-tambah').modal('hide');
                })
                /* $('#tombol-tambah').click(function (e){
                    e.preventDefault();
                    Swal.fire('Sukses', 'Sukses', 'success').then(()=>{
                        location.href = `{{ route('dashboard') }}`;
                    })
                }) */
            })
        </script>
    @endpush
@endsection
