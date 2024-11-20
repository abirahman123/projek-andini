@can($globalModule['create'])
    <x-mollecules.modal id="slideshow_modal" action="{{ route('cms.slideshow.store') }}" tableId="slideshow-table">
        <x-slot:title>Tambah Slide Show</x-slot:title>
        <div class="mb-3">
            <x-atoms.form-label required>Nama</x-atoms.form-label>
            <x-atoms.input id="name" name="name" type="text" class="form-control" placeholder="Masukkan Nama" />
        </div>
        <div class="mb-3">
            <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
            <x-atoms.textarea name="description" rows="3" id="description"
                placeholder="Masukkan Deskripsi"></x-atoms.textarea>
        </div>
        <div class="mb-3">
            <x-atoms.form-label required>Status</x-atoms.form-label>
            <x-mollecules.radio-group name="is_active" value="0" :lists="[
                '0' => 'Non-Active',
                '1' => 'Active',
            ]"></x-mollecules.radio-group>
        </div>
        <x-slot:footer>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </x-slot:footer>
    </x-mollecules.modal>
@endcan

@can($globalModule['update'])
    <x-mollecules.modal id="edit-slideshow_modal" action="/cms/slideshow/{id}" method="PUT" tableId="slideshow-table">
        <x-slot:title>Edit Slide Show</x-slot:title>
        <div class="mb-3">
            <x-atoms.form-label required>Nama</x-atoms.form-label>
            <x-atoms.input id="name" name="name" type="text" class="form-control" placeholder="Masukkan Nama" />
        </div>
        <div class="mb-3">
            <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
            <x-atoms.textarea name="description" rows="3" id="description"
                placeholder="Masukkan Deskripsi"></x-atoms.textarea>
        </div>
        <div class="mb-3">
            <x-atoms.form-label required>Status</x-atoms.form-label>
            <x-mollecules.radio-group name="is_active" id="is_active2" value=""
                :lists="[
                    '0' => 'Non-Active',
                    '1' => 'Active',
                ]"></x-mollecules.radio-group>
        </div>
        <x-slot:footer>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </x-slot:footer>
    </x-mollecules.modal>
@endcan
