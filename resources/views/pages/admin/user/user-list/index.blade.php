@extends('layouts.app')
@section("title","User Management")

@section('content')
    <div class="app-container">
        @include('pages.admin.user.user-list.partials.modals')
        <div class="py-4">
            <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="userlist-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari User" />
                </div>
            </div>
            <div class="table-relative">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            $(document).on("click", "button[data-action='reset']", function(){
                $.ajax({
                    url: "/users/user-list/" + $(this).data("id")+"/edit",
                    method: "GET",
                    beforeSend: function(){
                        showPageOverlay();
                    },
                    complete: function(){
                        hidePageOverlay();
                    },
                    success: function(response){
                        fillForm($("#reset-user_modal form"), response)
                        $("#reset-user_modal").find("form").attr("action", "/users/user-list/reset-password/" + response.id);
                        $("#reset-user_modal").modal("show");
                    },
                    error: function(err){
                        handleAjaxError(err);
                    },
                })
            })
        </script>
    @endpush
@endsection
