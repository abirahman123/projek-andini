<x-mollecules.modal id="add-pegawai-modal" size="lg" action="{{ route('master.pegawai.store') }}" method="POST"
    data-table-id="pegawai-table" tableId="pegawai-table" hasCloseBtn="true">

    <x-slot:title>Tambah pegawai</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>NIP</x-atoms.form-label>
                <x-atoms.input id="nip" name="nip" type="text" class="form-control"
                    placeholder="Masukkan NIP" />
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Nama</x-atoms.form-label>
                <x-atoms.input id="nama" name="nama" type="text" class="form-control"
                    placeholder="Masukkan Nama" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Tempat Lahir</x-atoms.form-label>
                <x-atoms.input id="tempat_lahir" name="tempat_lahir" type="text" class="form-control"
                    placeholder="Masukkan Tempat Lahir" />
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Tanggal Lahir</x-atoms.form-label>
                <x-atoms.input id="tanggal_lahir" name="tanggal_lahir" type="date" class="form-control"
                    placeholder="Masukkan Tanggal Lahir" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Jenis Kelamin</x-atoms.form-label>
                <x-atoms.select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </x-atoms.select>
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Nomor HP</x-atoms.form-label>
                <x-atoms.input id="nomor_hp" name="nomor_hp" type="text" class="form-control"
                    placeholder="Masukkan Nomor HP" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Email</x-atoms.form-label>
                <x-atoms.input id="email" name="email" type="email" class="form-control"
                    placeholder="Masukkan Email" />
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label for="kecamatan_id_field" required>Kecamatan</x-atoms.form-label>
                <x-atoms.select2 id="kecamatan_id_field" name="kecamatan_id" placeholder="Pilih Kecamatan anda"
                    source="{{ route('reference.kecamatan') }}">
                </x-atoms.select2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label for="kelurahan_id_field" required>Kelurahan</x-atoms.form-label>
                <x-atoms.select2 id="kelurahan_id_field" name="kelurahan_id"
                    title="Pilih Kecamatan anda terlebih dahulu" disabled source="{{ route('reference.kelurahan') }}">
                </x-atoms.select2>
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Agama</x-atoms.form-label>
                <x-atoms.select id="agama_id" name="agama_id" type="text" class="form-control"
                    placeholder="Pilih Agama">
                    @foreach ($agama as $item)
                        <option value="{{ $item->id }}">{{ $item->agama }}</option>
                    @endforeach
                </x-atoms.select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-6">
                <x-atoms.form-label required>Alamat</x-atoms.form-label>
                <x-atoms.textarea name="alamat" id="alamat" placeholder="Alamat" rows="4" />
            </div>
        </div>
    </div>
</x-mollecules.modal>


<x-mollecules.modal id="edit-pegawai-modal" size="lg" action="/master/pegawai/{id}" method="PUT"
    data-table-id="pegawai-table" tableId="pegawai-table" hasCloseBtn="true">

    <x-slot:title>Edit Pegawai</x-slot:title>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>NIP</x-atoms.form-label>
                <x-atoms.input id="nip2" name="nip" type="text" class="form-control"
                    placeholder="Masukkan NIP" />
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Nama</x-atoms.form-label>
                <x-atoms.input id="nama2" name="nama" type="text" class="form-control"
                    placeholder="Masukkan Nama" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Tempat Lahir</x-atoms.form-label>
                <x-atoms.input id="tempat_lahir2" name="tempat_lahir" type="text" class="form-control"
                    placeholder="Masukkan Tempat Lahir" />
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Tanggal Lahir</x-atoms.form-label>
                <x-atoms.input id="tanggal_lahir2" name="tanggal_lahir" type="date" class="form-control"
                    placeholder="Masukkan Tanggal Lahir" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Jenis Kelamin</x-atoms.form-label>
                <x-atoms.select id="jenis_kelamin2" name="jenis_kelamin" class="form-control">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </x-atoms.select>
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Nomor HP</x-atoms.form-label>
                <x-atoms.input id="nomor_hp2" name="nomor_hp" type="text" class="form-control"
                    placeholder="Masukkan Nomor HP" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Email</x-atoms.form-label>
                <x-atoms.input id="email2" name="email" type="email" class="form-control"
                    placeholder="Masukkan Email" />
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label for="updated_kecamatan_id" required>Kecamatan</x-atoms.form-label>
                <x-atoms.select2 id="updated_kecamatan_id" name="kecamatan_id" placeholder="Pilih Kecamatan anda"
                    source="{{ route('reference.kecamatan') }}">
                </x-atoms.select2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label for="updated_kelurahan_id" required>Kelurahan</x-atoms.form-label>
                <x-atoms.select2 id="updated_kelurahan_id" name="kelurahan_id"
                    title="Pilih Kecamatan anda terlebih dahulu" readonly source="{{ route('reference.kelurahan') }}"
                    >
                </x-atoms.select2>
            </div>
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Agama</x-atoms.form-label>
                <x-atoms.select id="agama_id2" name="agama_id" type="text" class="form-control"
                    placeholder="Pilih Agama">
                    @foreach ($agama as $item)
                        <option value="{{ $item->id }}">{{ $item->agama }}</option>
                    @endforeach
                </x-atoms.select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-6">
                <x-atoms.form-label required>Alamat</x-atoms.form-label>
                <x-atoms.textarea id="alamat2" name="alamat" type="text" class="form-control"
                    placeholder="Masukkan Alamat" />
            </div>
        </div>


    </div>
</x-mollecules.modal>

<x-mollecules.modal id="detail-pegawai_modal" action="" tableId="pegawai-table" hasCloseBtn="true">

    <x-slot:title>Detail Pegawai</x-slot:title>
    <x-slot:footer>
    </x-slot:footer>
    <div>
        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>NIP</x-atoms.form-label>
                <x-atoms.input id="nip_show" name="nip" type="text" class="form-control"
                    placeholder="Masukkan NIP" disabled />
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Nama</x-atoms.form-label>
                <x-atoms.input id="nama_show" name="nama" type="text" class="form-control"
                    placeholder="Masukkan Nama" disabled />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Tempat Lahir</x-atoms.form-label>
                <x-atoms.input id="tempat_lahir_show" name="tempat_lahir" type="text" class="form-control"
                    placeholder="Masukkan Tempat Lahir" disabled />
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Tanggal Lahir</x-atoms.form-label>
                <x-atoms.input id="tanggal_lahir_show" name="tanggal_lahir" type="date" class="form-control"
                    placeholder="Masukkan Tanggal Lahir" disabled />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Jenis Kelamin</x-atoms.form-label>
                <x-atoms.select id="jenis_kelamin_show" name="jenis_kelamin" class="form-control" disabled>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </x-atoms.select>
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Nomor HP</x-atoms.form-label>
                <x-atoms.input id="nomor_hp_show" name="nomor_hp" type="text" class="form-control"
                    placeholder="Masukkan Nomor HP" disabled />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Email</x-atoms.form-label>
                <x-atoms.input id="email_show" name="email" type="email" class="form-control"
                    placeholder="Masukkan Email" disabled />
            </div>

            <div class="col-md-6 mb-6">
                <x-atoms.form-label for="read_kecamatan_id" required>Kecamatan</x-atoms.form-label>
                <x-atoms.select2 id="read_kecamatan_id" name="kecamatan_id" placeholder="Pilih Kecamatan anda"
                    disabled source="{{ route('reference.kecamatan') }}">
                </x-atoms.select2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <x-atoms.form-label for="read_kelurahan_id" required>Kelurahan</x-atoms.form-label>
                <x-atoms.select2 id="read_kelurahan_id" name="kelurahan_id"
                    title="Pilih Kecamatan anda terlebih dahulu" disabled
                    source="{{ route('reference.kelurahan') }}">
                </x-atoms.select2>
            </div>
            <div class="col-md-6 mb-6">
                <x-atoms.form-label required>Agama</x-atoms.form-label>
                <x-atoms.select id="agama_id_show" name="agama_id" type="text" class="form-control"
                    placeholder="Pilih Agama" disabled>
                    @foreach ($agama as $item)
                        <option value="{{ $item->id }}">{{ $item->agama }}</option>
                    @endforeach
                </x-atoms.select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-6">
                <x-atoms.form-label required>Alamat</x-atoms.form-label>
                <x-atoms.textarea id="alamat_show" name="alamat" type="text" class="form-control"
                    placeholder="Masukkan Alamat" disabled />
            </div>
        </div>

    </div>
</x-mollecules.modal>
@push('scripts')
@endpush
