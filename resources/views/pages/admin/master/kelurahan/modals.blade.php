<x-mollecules.modal id="edit-kelurahan-modal" action="/master/kelurahan/{id}" method="PUT" data-table-id="kelurahan-table"
    tableId="kelurahan-table" hasCloseBtn="true">
    @csrf
    <x-slot:title>Edit kelurahan</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="mb-6">
            <x-atoms.form-label required>Kecamatan</x-atoms.form-label>
            <x-atoms.select2 name="kecamatan_id" id="kecamatan_field" ref="{{ route('reference.kecamatan') }}"
                placeholder="Pilih Kecamatan" source="{{ route('reference.kecamatan') }}" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Kode Kelurahan</x-atoms.form-label>
            <x-atoms.input id="kode_kelurahan" name="kode_kelurahan" type="text" class="form-control"
                placeholder="Masukkan Kode Kelurahan" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Nama Kelurahan</x-atoms.form-label>
            <x-atoms.input id="nama_kelurahan" name="nama_kelurahan" type="text" class="form-control"
                placeholder="Masukkan Nama Kelurahan" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Latitude</x-atoms.form-label>
            <x-atoms.input id="latitude" name="latitude" type="text" class="form-control"
                placeholder="Masukkan Latitude Kelurahan" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Longitude</x-atoms.form-label>
            <x-atoms.input id="longitude" name="longitude" type="text" class="form-control"
                placeholder="Masukkan Longitude Kelurahan" />
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

<x-mollecules.modal id="add-kelurahan-modal" action="{{ route('master.kelurahan.store') }}" method="POST"
    data-table-id="kelurahan-table" tableId="kelurahan-table" hasCloseBtn="true">
    @csrf
    <x-slot:title>Tambah Kelurahan</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>

        <div class="mb-6">
            <x-atoms.form-label required>Kecamatan</x-atoms.form-label>
            <x-atoms.select2 name="kecamatan_id" id="kecamatan_id_field" ref="{{ route('reference.kecamatan') }}"
                placeholder="Pilih Kecamatan" source="{{ route('reference.kecamatan') }}" />
        </div>



        <div class="mb-6">
            <x-atoms.form-label required>Kode Kelurahan</x-atoms.form-label>
            <x-atoms.input id="kode_kelurahan" name="kode_kelurahan" type="text" class="form-control"
                placeholder="Masukkan Kode Kelurahan" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Nama Kelurahan</x-atoms.form-label>
            <x-atoms.input id="nama_kelurahan" name="nama_kelurahan" type="text" class="form-control"
                placeholder="Masukkan Nama Kelurahan" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Latitude</x-atoms.form-label>
            <x-atoms.input id="latitude" name="latitude" type="text" class="form-control"
                placeholder="Masukkan Latitude Kelurahan" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Longitude</x-atoms.form-label>
            <x-atoms.input id="longitude" name="longitude" type="text" class="form-control"
                placeholder="Masukkan Longitude Kelurahan" />
        </div>

        <div class="mb-6">
            <x-atoms.form-label>Keterangan</x-atoms.form-label>
            <x-atoms.textarea id="keterangan" name="keterangan" type="text" class="form-control"
                placeholder="Masukkan Nama Keterangan"></x-atoms.textarea>
        </div>

    </div>
</x-mollecules.modal>
@push('scripts')
    <script>
        $("#kecamatan_id_field").select2({
            placeholder: "Select Kecamatan",
            allowClear: true,
            ajax: {
                url: "{{ route('reference.kecamatan') }}",
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
        $("#kecamatan_field").select2({
            placeholder: "Select Kecamatan",
            allowClear: true,
            ajax: {
                url: "{{ route('reference.kecamatan') }}",
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
