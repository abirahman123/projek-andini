
<x-mollecules.modal id="edit-kecamatan-modal" action="/master/kecamatan/{id}" method="PUT" data-table-id="kecamatan-table"
    tableId="kecamatan-table" hasCloseBtn="true">
    @csrf
    <x-slot:title>Edit kecamatan</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="mb-6">
                <x-atoms.form-label required>Kode Kecamatan</x-atoms.form-label>
                <x-atoms.input id="kode_kecamatan" name="kode_kecamatan" type="text" class="form-control"
                    placeholder="Masukkan Kode Kecamatan" />
            </div>
            <div class="mb-6">
                <x-atoms.form-label required>Nama Kecamatan</x-atoms.form-label>
                <x-atoms.input id="nama_kecamatan" name="nama_kecamatan" type="text" class="form-control"
                    placeholder="Masukkan Nama Kecamatan" />
            </div>
            <div class="mb-6">
                <x-atoms.form-label required>Latitude</x-atoms.form-label>
                <x-atoms.input id="latitude" name="latitude" type="text" class="form-control"
                    placeholder="Masukkan Latitude Kecamatan" />
            </div>
            <div class="mb-6">
                <x-atoms.form-label required>Longitude</x-atoms.form-label>
                <x-atoms.input id="longitude" name="longitude" type="text" class="form-control"
                    placeholder="Masukkan Longitude Kecamatan" />
            </div>
            <div class="mb-6">
                <x-atoms.form-label required>Status Aktif</x-atoms.form-label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="radioAktif" value="1" checked>
                    <label class="form-check-label" for="radioAktif">
                        Aktif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="radioNonAktif" value="0">
                    <label class="form-check-label" for="radioNonAktif">
                        Tidak Aktif
                    </label>
                </div>

            </div>

        <div class="mb-6">
            <x-atoms.form-label>Keterangan</x-atoms.form-label>
            <x-atoms.textarea id="keterangan" name="keterangan" type="text" class="form-control"
                placeholder="Masukkan Nama Keterangan"></x-atoms.textarea>
        </div>
    </div>
</x-mollecules.modal>

<x-mollecules.modal id="add-kecamatan-modal" action="{{ route('master.kecamatan.store') }}" method="POST"
    data-table-id="kecamatan-table" tableId="kecamatan-table" hasCloseBtn="true">
    @csrf
    <x-slot:title>Tambah Kecamatan</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="mb-6">
            <div class="mb-6">
                <x-atoms.form-label required>Kode Kecamatan</x-atoms.form-label>
                <x-atoms.input id="kode_kecamatan" name="kode_kecamatan" type="text" class="form-control"
                    placeholder="Masukkan Kode Kecamatan" />
            </div>
            <div class="mb-6">
                <x-atoms.form-label required>Nama Kecamatan</x-atoms.form-label>
                <x-atoms.input id="nama_kecamatan" name="nama_kecamatan" type="text" class="form-control"
                    placeholder="Masukkan Nama Kecamatan" />
            </div>
            <div class="mb-6">
                <x-atoms.form-label required>Latitude</x-atoms.form-label>
                <x-atoms.input id="latitude" name="latitude" type="text" class="form-control"
                    placeholder="Masukkan Latitude Kecamatan" />
            </div>
            <div class="mb-6">
                <x-atoms.form-label required>Longitude</x-atoms.form-label>
                <x-atoms.input id="longitude" name="longitude" type="text" class="form-control"
                    placeholder="Masukkan Longitude Kecamatan" />
            </div>

        <div class="mb-6">
            <x-atoms.form-label>Keterangan</x-atoms.form-label>
            <x-atoms.textarea id="keterangan" name="keterangan" type="text" class="form-control"
                placeholder="Masukkan Nama Keterangan"></x-atoms.textarea>
        </div>

    </div>
</x-mollecules.modal>

