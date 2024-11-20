@extends('layouts.app')
@section('title','News Management')

@section('content')
    <div class="card-body py-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="search-box mb-3">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="news-table" id="searchBox" data-action="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Cari Berita" />
            </div>
            @can($globalModule['create'])
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-news_modal">
                    <i class="fal fa-plus fs-3"></i>
                    <span class="ms-2">
                        Tambah
                    </span>
                </button>
            @endcan
        </div>
        <div class="table-relative">
            {{ $dataTable->table() }}
        </div>
    </div>
    @include('pages.admin.cms.news.modal')
    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            function previewFile(event, previewContainerId) {
                var input = event.target;
                var file = input.files[0];
                var reader = new FileReader();

                reader.onload = function() {
                    var output = document.getElementById(previewContainerId);
                    var fileType = file.type.split('/')[0]; // Get the file type (image/document)
                    if (fileType === 'image') {
                        output.innerHTML = '<img src="' + reader.result +
                            '" class="img-fluid" style="max-width: 50px; " />';
                    } else if (fileType === 'application') {
                        if (file.type === 'application/pdf') {
                            output.innerHTML = '<a href="' + reader.result +
                                '"   />';
                        } else if (file.type === 'application/word' || file.type ===
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                            output.innerHTML =
                                '<img src="assets/media/icons/msword.png" class="img-fluid mx-auto d-block" style="max-width: 100%; max-height: 300px;" />';
                        } else if (file.type === 'application/excel' || file.type ===
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                            output.innerHTML =
                                '<img src="assets/media/icons/excel.png" class="img-fluid mx-auto d-block" style="max-width: 100%; max-height: 300px;" />';
                        } else if (file.type === 'application/powerpoint' || file.type ===
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation') {
                            output.innerHTML =
                                '<img src="assets/media/icons/powerpoint" class="img-fluid mx-auto d-block" style="max-width: 100%; max-height: 300px;" />';
                        } else {
                            output.innerHTML = '<p>File type not supported for preview.</p>';
                        }
                    } else {
                        output.innerHTML = '<p>File type not supported for preview.</p>';
                    }
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
            // $("#add-file_modal")
        </script>

    @endpush
    @endsection
