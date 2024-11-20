
<x-mollecules.modal id="edit-periode-modal" action="/master/periode/{id}" method="PUT" data-table-id="periode-table"
    tableId="periode-table" hasCloseBtn="true">
    @csrf
    <x-slot:title>Edit Periode</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="mb-6">
            <x-atoms.form-label required>Periode</x-atoms.form-label>
            <x-atoms.input id="periode" name="periode" type="text" class="form-control"
                placeholder="Masukkan Periode" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Tahun</x-atoms.form-label>
            {{-- <x-atoms.input type="number" id="tahun" name="tahun" min="1900"
                max="{{ date('Y') }}" placeholder="Masukkan Tahun"> --}}
            <x-atoms.input id="tahun" name="tahun" type="number" class="form-control"  placeholder="Masukkan Tahun" />
        </div>
          
        <div class="mb-6">
            <x-atoms.form-label>Keterangan</x-atoms.form-label>
            <x-atoms.textarea id="keterangan" name="keterangan" type="text" class="form-control"
                placeholder="Masukkan Nama Keterangan"></x-atoms.textarea>
        </div>
    </div>
</x-mollecules.modal>

<x-mollecules.modal id="add-periode-modal" action="{{ route('master.periode.store') }}" method="POST"
    data-table-id="periode-table" tableId="periode-table" hasCloseBtn="true">
    @csrf
    <x-slot:title>Tambah Periode</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="mb-6">
            <div class="mb-6">
                <x-atoms.form-label required>Periode</x-atoms.form-label>
                <x-atoms.input id="periode" name="periode" type="text" class="form-control"
                    placeholder="Masukkan Periode" />
            </div>
            <div class="mb-6">
                <x-atoms.form-label required>Tahun</x-atoms.form-label>
                <x-atoms.input id="tahun" name="tahun" type="number" class="form-control" placeholder="Masukkan Tahun" />
            </div>
        <div class="mb-6">
            <x-atoms.form-label>Keterangan</x-atoms.form-label>
            <x-atoms.textarea id="keterangan" name="keterangan" type="text" class="form-control"
                placeholder="Masukkan Nama Keterangan"></x-atoms.textarea>
        </div>

    </div>
</x-mollecules.modal>

