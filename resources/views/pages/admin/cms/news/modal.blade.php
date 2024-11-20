@can($globalModule['create'])
    <x-mollecules.modal id="add-news_modal" action="{{ route('cms.news.store') }}" tableId="news-table">
        <x-slot:title>Tambah Berita</x-slot:title>

        <div class="mb-6">
            <x-atoms.form-label required>Judul Berita</x-atoms.form-label>
            <x-atoms.input name="title" id="title_field" placeholder="Masukkan Judul Berita" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Kategori</x-atoms.form-label>
            <x-atoms.select2 name="kategori_berita_id" id="kategori_berita_field_add" ref="{{ route('reference.kategori_berita') }}"
                placeholder="Pilih Kategori" source="{{ route('reference.kategori_berita') }}" />
        </div>
        <div class="mb-3">
            <x-atoms.form-label required>Gambar</x-atoms.form-label>
            <x-atoms.dropzone-image id="tes_tambah" name="image_url" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
            <x-atoms.summernote id="description_field_add" name="description" placeholder="Masukkan Deskripsi Berita"
                tabsize="2" height="300" />
        </div>

        <x-slot:footer>
            <button class="btn-primary btn" type="submit">Add News</button>
        </x-slot:footer>
    </x-mollecules.modal>
@endcan
@can($globalModule['update'])
    <x-mollecules.modal id="edit-news_modal" action="/cms/news/{id}" tableId="news-table" method="PUT">
        <x-slot:title>Edit Berita </x-slot:title>
        <div class="mb-6">
            <x-atoms.form-label required>Judul Berita</x-atoms.form-label>
            <x-atoms.input name="title" id="title_field" placeholder="Masukkan Judul Berita" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Kategori</x-atoms.form-label>
            <x-atoms.select2 name="kategori_berita_id" id="kategori_berita_field" ref="{{ route('reference.kategori_berita') }}"
                placeholder="Pilih Kategori" source="{{ route('reference.kategori_berita') }}" />
        </div>
        <div class="mb-3">
            <x-atoms.form-label required>Gambar</x-atoms.form-label>
            <x-atoms.dropzone-image id="tes_edit" name="image_url" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
            <x-atoms.summernote id="description_field_edit" name="description" placeholder="Masukkan Deskripsi Berita"
                tabsize="2" height="300" />
        </div>
        <x-slot:footer>
            <button class="btn-primary btn" type="submit">Save News</button>
        </x-slot:footer>
    </x-mollecules.modal>
@endcan
@can($globalModule['read'])
    <x-mollecules.modal id="preview-modal" size="md" hasCloseBtn="true" action="#">
        <x-slot name="title">
            Preview File
        </x-slot>
        <x-slot name="footer">
        </x-slot>
        <div class="preview-container-modal" class="mb-3">
            <img src="https://www.lotus-qa.com/wp-content/uploads/2020/02/testing.jpg" alt="Default Image"
                class="img-fluid rounded mx-auto d-block" style="max-width: 400px; max-height: 300px;">
        </div>
    </x-mollecules.modal>
@endcan
@push('scripts')
    <script>
        $("#kategori_berita_field_add").select2({
            placeholder: "Select Kategori Berita",
            allowClear: true,
            ajax: {
                url: "{{ route('reference.kategori_berita') }}",
                dataType: 'json',
                delay: 250,

                processResults: function(data) {
                    return {
                        results: data.data
                    };
                },
                cache: true
            }
        });
        $("#kategori_berita_field").select2({
            placeholder: "Select Kategori Berita",
            allowClear: true,
            ajax: {
                url: "{{ route('reference.kategori_berita') }}",
                dataType: 'json',
                delay: 250,

                processResults: function(data) {
                    return {
                        results: data.data
                    };
                },
                cache: true
            }
        });
    </script>
@endpush
