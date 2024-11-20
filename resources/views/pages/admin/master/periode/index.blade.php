@extends('layouts.app')

@section('content')
    <div class="card-body py-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="search-box">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="periode-table" id="searchBox" data-action="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Cari Periode" />
            </div>
            <div class="d-flex gap-1">

                {{-- @can($globalModule['create']) --}}
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-periode-modal" data-action="add"
                    data-url="">
                    <i class="fas fa-plus fs-3 me-2"></i>
                    <span class="ms-2">
                        Tambah
                    </span>
                </button>
                {{-- @endcan --}}


            </div>
        </div>
        {{ $dataTable->table() }}
    </div>
    @include('pages.admin.master.periode.modals')

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            const activatePeriode = (e) => {

                let url = $(e.target).data('url');
                let btn = $(e.target);
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan mengaktifkan periode ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aktifkan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            data: {
                                _token: '{{ csrf_token() }}',
                                method: 'PUT'
                            },
                            url: url,
                            type: 'PUT',
                            success: function(response) {
                                window.LaravelDataTables['periode-table'].draw();
                                Swal.fire({
                                    text: response.message?.body,
                                    title: response.message?.title,
                                    icon: "success",
                                    confirmButtonText: "Close",
                                });
                            },
                            error: function(response) {
                                handleAjaxError(response);
                            },
                        });
                    }
                });
            }
        </script>
    @endpush
@endsection
