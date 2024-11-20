@extends('layouts.app')
@section('title', 'Asesor')


@section('content')
    <div class="mt-2">
        <form action="{{ route('asesmen.asesor.store') }}" method="POST" id="create-asesor_form">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="nama_field" required>Nama Asesor</x-atoms.form-label>
                    <x-atoms.input name="nama" id="nama_field" placeholder="Masukkan Nama Asesor" />
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="kecamatan_id_field" required>Kecamatan</x-atoms.form-label>
                    <x-atoms.select2 id="kecamatan_id_field" name="kecamatan_id" placeholder="Pilih Kecamatan"
                        source="{{ route('reference.kecamatan') }}">
                    </x-atoms.select2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="email_field" required>Email</x-atoms.form-label>
                    <x-atoms.input name="email" id="email_field" placeholder="Masukkan Email" />
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="kelurahan_id_field" required>Kelurahan</x-atoms.form-label>
                    <x-atoms.select2 id="kelurahan_id_field" name="kelurahan_id" placeholder="Pilih Kelurahan"
                        title="Pilih Kecamatan anda terlebih dahulu" disabled source="{{ route('reference.kelurahan') }}">
                    </x-atoms.select2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="nomor_hp_field">Telepon</x-atoms.form-label>
                    <x-atoms.input name="nomor_hp" id="nomor_hp_field" placeholder="Masukkan Telepon/Nomor HP" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="jenis_kelamin_field" required>Jenis Kelamin</x-atoms.form-label>
                    <x-mollecules.radio-group name="jenis_kelamin" id="jenis_kelamin_field" :lists="[
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]">
                    </x-mollecules.radio-group>
                </div>
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="alamat_field" required>Alamat</x-atoms.form-label>
                <x-atoms.textarea name="alamat" id="alamat_field" placeholder="Masukkan Alamat"></x-atoms.textarea>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('asesmen.asesor.index') }}" class="btn btn-light me-3">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah Asesor</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $(document).on(`form-submitted:create-asesor_form`, function(ev) {
                    window.location.href = "{{ route('asesmen.asesor.index') }}"
                });

                $("#kecamatan_id_field").on("change", function() {

                    $("#kelurahan_id_field").select2({
                        placeholder: "Pilih Kelurahan anda",
                        disabled: false,
                        ajax: {
                            url: `{{ route('reference.kelurahan') }}?kecamatan_id=${$(this).val()}`,
                            dataType: 'json',
                            processResults: function(data) {
                                return {
                                    results: data.data,
                                };
                            },
                        }
                    });

                });
            });
        </script>
    @endpush
@endsection
