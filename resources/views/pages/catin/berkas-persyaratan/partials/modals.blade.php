<x-mollecules.modal id="upload-file-pendukung-modal" action="{{ route('berkas-persyaratan.index') }}/detail/upload/{id}"
                    method="PUT" tableId="berkas-catin-wanita-table|berkas-catin-pria-table" hasCloseBtn="true">
    @csrf
    @method('PUT')
    <x-slot:title>Unggah Berkas Persyaratan</x-slot:title>
    <div class="desc-container">
        <p class="m-0 text-gray"><b>Instruksi:</b></p>
        <div class="description mb-3" style="font-weight: 300 !important;">

        </div>
    </div>
    <div class="mb-6">
        <x-atoms.form-label required for="file_path">Berkas Persyaratan</x-atoms.form-label>
        <x-atoms.dropzone id="file_path" name="file_path" />
    </div>
    <x-slot:footer>
        <button type="submit" class="btn btn-primary">Unggah Berkas</button>
    </x-slot:footer>
</x-mollecules.modal>

<x-mollecules.modal id="preview-modal" size="md" hasCloseBtn="true" action="#">
    <x-slot name="title">
        Lihat Berkas Persyaratan
    </x-slot>
    <x-slot name="footer">
    </x-slot>
    <div class="preview-container-modal" class="mb-3">
        <img src="{{ asset('assets/media/illustrations/img-preview.png') }}" alt="Default Image"
             class="img-fluid rounded mx-auto d-block" style="max-width: 400px; max-height: 300px;">
    </div>
</x-mollecules.modal>
