
<x-mollecules.modal id="add-maping-modal" action="{{ route('asesmen.maping.store') }}" method="POST"
    data-table-id="maping-table" tableId="maping-table" hasCloseBtn="true">
    @csrf
    <x-slot:title>Tambah Data Maping</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="mb-6">
            <x-atoms.form-label required>Asesmen ID</x-atoms.form-label>
            <x-atoms.input id="asesmen" name="asesmen_id" type="number" class="form-control"
                placeholder="Masukkan ID Asesmen" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Asesor ID</x-atoms.form-label>
            <x-atoms.input id="asesor" name="asesor_id" type="number" class="form-control"
                placeholder="Masukkan ID Asessor Anda" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Penilaian</x-atoms.form-label>
            <x-atoms.textarea id="penilaian" name="penilaian" type="text" class="form-control"
                placeholder="Masukkan Penilaian Anda"></x-atoms.textarea>
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Catatan</x-atoms.form-label>
            <x-atoms.textarea id="catatan" name="catatan" type="text" class="form-control"
                placeholder="Masukkan Catatan Anda"></x-atoms.textarea>
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Status</x-atoms.form-label>
            <x-atoms.select id="status" name="status_rekomendasi" class="form-control">
                <option value="DIREKOMENDASIKAN">Direkomendasikan</option>
                <option value="TIDAK_DIREKOMENDASIKAN">Tidak Direkomendasikan</option>
            </x-atoms.select>
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Keterangan</x-atoms.form-label>
            <x-atoms.textarea id="keterangan" name="keterangan" type="text" class="form-control"
                placeholder="Berikan Keterangan"></x-atoms.textarea>
        </div>

    </div>
</x-mollecules.modal>

<x-mollecules.modal id="edit-maping-modal" action="/asesmen/asesor-maping/{id}" method="PUT"
    data-table-id="maping-table" tableId="maping-table" hasCloseBtn="true">
    @csrf
    <x-slot:title>Edit Data Maping</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="mb-6">
            <x-atoms.form-label required>Asesmen ID</x-atoms.form-label>
            <x-atoms.input id="asesmen" name="asesmen_id" type="number" class="form-control"
                placeholder="Masukkan ID Asesmen" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Asesor ID</x-atoms.form-label>
            <x-atoms.input id="asesor" name="asesor_id" type="number" class="form-control"
                placeholder="Masukkan ID Asessor Anda" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Penilaian</x-atoms.form-label>
            <x-atoms.textarea id="penilaian" name="penilaian" type="text" class="form-control"
                placeholder="Masukkan Penilaian Anda"></x-atoms.textarea>
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Catatan</x-atoms.form-label>
            <x-atoms.textarea id="catatan" name="catatan" type="text" class="form-control"
                placeholder="Masukkan Catatan Anda"></x-atoms.textarea>
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Status</x-atoms.form-label>
            <x-atoms.textarea id="status" name="status_rekomendasi" type="text" class="form-control"
                placeholder="Masukkan Status data"></x-atoms.textarea>
        </div>
        <div class="mb-6">
            <x-atoms.form-label>Keterangan</x-atoms.form-label>
            <x-atoms.textarea id="keterangan" name="keterangan" type="text" class="form-control"
                placeholder="Berikan Keterangan"></x-atoms.textarea>
        </div>
    </div>
</x-mollecules.modal>



