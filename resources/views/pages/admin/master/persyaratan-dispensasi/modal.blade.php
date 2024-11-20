@can($globalModule['create'])
    <x-mollecules.modal id="add-persyaratandispensasi_modal" action="{{ route('master.persyaratan-dispensasi.store') }}"
        tableId="persyaratandispensasi-table">
        <x-slot:title>Tambah Persyaratan Dispensasi</x-slot:title>
        <div class="mb-6">
            <x-atoms.form-label required>Nama Persyaratan</x-atoms.form-label>
            <x-atoms.input name="nama_persyaratan" id="nama_persyaratan_field_add" placeholder="Masukkan Nama Persyaratan" />
        </div>

        <div class="mb-3">
            <x-atoms.form-label>Dokumen</x-atoms.form-label>
            <x-atoms.dropzone id="tes_tambah_file_pendukung" name="file_pendukung" />
        </div>
        <div class="mb-3">
            <x-atoms.form-label required>Wajib</x-atoms.form-label>
            <x-atoms.select id="is_wajib_field" name="is_wajib" placeholder="Pilih Wajib" value=""
                :lists="[1 => 'Ya', 0 => 'Tidak']"></x-atoms.select>
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Keterangan</x-atoms.form-label>
            <x-atoms.summernote id="keterangan_field_add" name="keterangan" placeholder="Masukkan Keterangan File Pendukung"
                tabsize="2" height="300" />
        </div>

        <x-slot:footer>
            <button class="btn-primary btn" type="submit">Tambah</button>
        </x-slot:footer>
    </x-mollecules.modal>
@endcan
@can($globalModule['update'])
    <x-mollecules.modal id="edit-persyaratandispensasi_modal" action="/master/persyaratan-dispensasi/{id}"
        tableId="persyaratandispensasi-table" method="PUT">
        <x-slot:title>Edit Persyaratan Dispensasi </x-slot:title>
        <div class="mb-6">
            <x-atoms.form-label required>Nama Persyaratan</x-atoms.form-label>
            <x-atoms.input name="nama_persyaratan" id="nama_persyaratan_field" placeholder="Masukkan Nama Persyaratan" />
        </div>

        <div class="mb-3">
            <x-atoms.form-label>Dokumen</x-atoms.form-label>
            <x-atoms.dropzone id="tes_edit_file_pendukung" name="file_pendukung" />
        </div>
        <div class="mb-3">
            <x-atoms.form-label required>Wajib</x-atoms.form-label>
            <x-atoms.select id="is_wajib_field" name="is_wajib" placeholder="Pilih Wajib"
                :lists="[1 => 'Ya', 0 => 'Tidak']"></x-atoms.select>
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Keterangan</x-atoms.form-label>
            <x-atoms.summernote id="keterangan_field_edit" name="keterangan"
                placeholder="Masukkan Keterangan File Pendukung" tabsize="2" height="300" />
        </div>

        <x-slot:footer>
            <button class="btn-primary btn" type="submit">Edit</button>
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
