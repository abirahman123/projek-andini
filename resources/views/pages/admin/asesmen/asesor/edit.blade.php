@extends('layouts.app')
@section('title', 'Asesor')


@section('content')
    <div class="mt-2">
        <form action="{{ $asesor ? route('asesmen.asesor.update', $asesor) : '#' }}" method="POST" id="edit-asesor_form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="nama_field" required>Nama Asesor</x-atoms.form-label>
                    <x-atoms.input name="nama" id="nama_field" placeholder="Masukkan Nama Asesor" :value="$asesor->nama" />
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="kecamatan_id_field" required>Kecamatan</x-atoms.form-label>
                    <x-atoms.select2 id="kecamatan_id_field" name="kecamatan_id" source="{{ route('reference.kecamatan') }}"
                        :value="[
                            'v' => $asesor->kecamatan->id,
                            't' => $asesor->kecamatan->nama_kecamatan,
                        ]">
                    </x-atoms.select2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="email_field" required>Email</x-atoms.form-label>
                    <x-atoms.input name="email" id="email_field" placeholder="Masukkan Email" :value="$asesor->email" />
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="kelurahan_id_field" required>Kelurahan</x-atoms.form-label>
                    <x-atoms.select2 id="kelurahan_id_field" name="kelurahan_id"
                        source="{{ route('reference.kelurahan') }}?kecamatan_id={{ $asesor->kecamatan->id }}"
                        :value="[
                            'v' => $asesor->kelurahan->id,
                            't' => $asesor->kelurahan->nama_kelurahan,
                        ]">
                    </x-atoms.select2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="nomor_hp_field">Telepon</x-atoms.form-label>
                    <x-atoms.input name="nomor_hp" id="nomor_hp_field" placeholder="Masukkan Telepon/Nomor HP"
                        :value="$asesor->nomor_hp" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="jenis_kelamin_field" required>Jenis Kelamin</x-atoms.form-label>
                    <x-mollecules.radio-group name="jenis_kelamin" id="jenis_kelamin_field" :value="$asesor->jenis_kelamin"
                        :lists="[
                            'L' => 'Laki-Laki',
                            'P' => 'Perempuan',
                        ]">
                    </x-mollecules.radio-group>
                </div>
            </div>
            <div class="mb-3">
                <x-atoms.form-label for="alamat_field" required>Alamat</x-atoms.form-label>
                <x-atoms.textarea name="alamat" id="alamat_field"
                    placeholder="Masukkan Alamat">{{ old('alamat', $asesor->alamat) }}</x-atoms.textarea>
            </div>
            <div class="d-flex justify-content-end mt-3 flex-reverse">
                <a href="{{ route('asesmen.asesor.index') }}" class="btn btn-light me-3" cancel-btn>Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah Asesor</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $(document).on(`form-submitted:edit-asesor_form`, function() {
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
