<x-mollecules.modal id="preview-modal" size="md" hasCloseBtn="true" action="#">
    <x-slot name="title">
        Preview File
    </x-slot>
    <x-slot name="footer">
    </x-slot>
    <div class="preview-container-modal" class="mb-3">
        <img src="{{ asset('assets/media/illustrations/img-preview.png') }}" alt="Default Image"
            class="img-fluid rounded mx-auto d-block" style="max-width: 400px; max-height: 300px;">
    </div>
</x-mollecules.modal>

<x-mollecules.modal id="asesmen-modal" action="/asesor/catin-asesmen/{id}" method="PUT" size="xl">
    <x-slot:title>Asesmen</x-slot:title>
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <x-atoms.form-label for="lama-hubungan_field">Lama
                    Hubungan</x-atoms.form-label>
                <x-atoms.input name="lama_hubungan" id="lama-hubungan_field" placeholder="Masukkan Lama Hubungan"
                    :value="$data->asesmen_penilaian->lama_hubungan" />
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="alasan-menikah_field">Alasan
                    Menikah</x-atoms.form-label>
                <x-atoms.input name="alasan_menikah" id="alasan-menikah_field" placeholder="Masukkan Alasan Menikah"
                    :value="$data->asesmen_penilaian->alasan_menikah" />
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="gaya-berpacaran_field">Gaya
                    Berpacaran</x-atoms.form-label>
                <x-atoms.input name="gaya_berpacaran" id="gaya-berpacaran_field" placeholder="Masukkan Gaya Berpacaran"
                    :value="$data->asesmen_penilaian->gaya_berpacaran" />
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="pekerjaan-catin_field">Pekerjaan
                    Catin</x-atoms.form-label>
                <x-atoms.input name="pekerjaan_catin" id="pekerjaan-catin_field" placeholder="Masukkan Pekerjaan Catin"
                    :value="$data->asesmen_penilaian->pekerjaan_catin" />
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="penghasilan-catin_field">Penghasilan
                    Catin</x-atoms.form-label>
                <x-atoms.input name="penghasilan_catin" id="penghasilan-catin_field"
                    placeholder="Masukkan Penghasilan Catin" :value="$data->asesmen_penilaian->penghasilan_catin" />
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <x-atoms.form-label for="keterangan_field">Keterangan</x-atoms.form-label>
                <x-atoms.input name="keterangan" id="keterangan_field" placeholder="Masukkan Keterangan"
                    :value="$data->asesmen_penilaian->keterangan" />
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="persetujuan-keluarga_field">Persetujuan
                    Keluarga</x-atoms.form-label>
                <x-atoms.input name="persetujuan_keluarga" id="persetujuan-keluarga_field"
                    placeholder="Masukkan Persetujuan Keluarga" :value="$data->asesmen_penilaian->persetujuan_keluarga" />
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="pola-hubungan_field">Pola
                    Hubungan</x-atoms.form-label>
                <x-atoms.input name="pola_hubungan" id="pola-hubungan_field" placeholder="Masukkan Pola Hubungan"
                    :value="$data->asesmen_penilaian->pola_hubungan" />
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="catatan_field">Catatan</x-atoms.form-label>
                <x-atoms.input name="catatan" id="catatan_field" placeholder="Masukkan Catatan" :value="$data->asesmen_penilaian->catatan" />
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="status-rekomendasi_field">Status
                    Rekomendasi</x-atoms.form-label>
                <x-mollecules.radio-group name="status_rekomendasi" id="status-rekomendasi_field" :value="$data->asesmen_penilaian->status_rekomendasi"
                    :lists="[
                        'DIREKOMENDASIKAN' => 'Direkomendasikan',
                        'TIDAK_DIREKOMENDASIKAN' => 'Tidak Direkomendasikan',
                    ]" />
            </div>
        </div>
    </div>
    <x-slot:footer>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </x-slot:footer>
</x-mollecules.modal>
