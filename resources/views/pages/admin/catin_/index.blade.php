@extends('layouts.app')

@section('content')

    <div class="app-container">
        <div class="py-4">
            <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="filemanagement-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari File" />
                </div>
                    <a class="btn btn-primary" href="/catin/upload/persyaratan">
                        <i class="fas fa-plus fs-3"></i>
                        <span class="ms-2">Tambah</span>
                    </a>
            </div>
            <div class="table-relative">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    </div>

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
