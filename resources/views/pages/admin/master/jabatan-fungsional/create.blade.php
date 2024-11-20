@extends('layouts.app')
@section('title', 'Data Jabatan Fungsional')
@section('content')
    <div class="mt-2">
        <div class="my-2" style="background: #F5F6FA">
            <div class="p-2 d-flex flex-column">
                <h1 class="fs-5 fw-bolder m-0" style="color:#131523">Mohon untuk menambahkan data Jabatan Fungsional pada periode aktif {{ $periode->periode }}</h1>
                <p class="fs-3 m-0 mt-1" style="color:#5A607F">
                    Data Jabatan Fungsional pada periode aktif {{ $periode->periode }} belum tersedia, silahkan tambahkan data
                </p>
            </div>
        </div>
        <form action="{{ route('master.jabatan.store') }}" method="POST" id="create-jabatan_form">
            @csrf
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="periode_id_field" required>Periode</x-atoms.form-label>
                    <x-atoms.select2 id="periode_id_field" name="periode_id" placeholder="Pilih Periode" :value="[
                        'v' => $periode->id,
                        't' => $periode->periode,
                    ]"
                        source="{{ route('reference.periode') }}">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="kepala_upt_field" required>Kepala UPT</x-atoms.form-label>
                    <x-atoms.select2 id="kepala_upt_field" name="kepala_upt" placeholder="Pilih Kepala UPT"
                        source="{{ route('reference.pegawai') }}">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="pembina_utama_muda_field">Pembina Utama Muda</x-atoms.form-label>
                    <x-atoms.select2 id="pembina_utama_muda_field" disabled name="pembina_utama_muda"
                        placeholder="Pilih Pembina Utama Muda" source="{{ route('reference.pegawai') }}"
                        title="Pilih Kepala UPT terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="pembina_field">Pembina</x-atoms.form-label>
                    <x-atoms.select2 id="pembina_field" disabled name="pembina" placeholder="Pilih Pembina"
                        source="{{ route('reference.pegawai') }}" title="Pilih Pembina Utama Muda terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="sekretaris_field">Sekretaris</x-atoms.form-label>
                    <x-atoms.select2 id="sekretaris_field" disabled name="sekretaris" placeholder="Pilih Sekretaris"
                        source="{{ route('reference.pegawai') }}" title="Pilih Pembina terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="bendahara_field">Bendahara</x-atoms.form-label>
                    <x-atoms.select2 id="bendahara_field" disabled name="bendahara" placeholder="Pilih Bendahara"
                        source="{{ route('reference.pegawai') }}" title="Pilih Sekretaris terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="pengawas_field">Pengawas</x-atoms.form-label>
                    <x-atoms.select2 id="pengawas_field" disabled name="pengawas" placeholder="Pilih Pengawas"
                        source="{{ route('reference.pegawai') }}" title="Pilih Bendahara terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="pengadministrasi_umum_field">Pengadministrasi
                        Umum</x-atoms.form-label>
                    <x-atoms.select2 id="pengadministrasi_umum_field" disabled name="pengadministrasi_umum"
                        placeholder="Pilih Pengadministrasi Umum" source="{{ route('reference.pegawai') }}"
                        title="Pilih Pengawas terlebih dahulu">
                    </x-atoms.select2>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $(document).on(`form-submitted:create-jabatan_form`, function(ev) {
                    window.location.href = "{{ route('master.jabatan.index') }}"
                });

                $("#kepala_upt_field").on("change", function() {

                    $("#pembina_utama_muda_field").select2({
                        placeholder: "Pilih Pembina Utama Muda",
                        disabled: false,
                        ajax: {
                            url: `{{ route('reference.pegawai') }}?kepala_upt=${$(this).val()}`,
                            dataType: 'json',
                            processResults: function(data) {
                                return {
                                    results: data.data,
                                };
                            },
                        }
                    });

                    $("#pembina_utama_muda_field").on("change", function() {
                        $("#pembina_field").select2({
                            placeholder: "Pilih Pembina",
                            disabled: false,
                            ajax: {
                                url: `{{ route('reference.pegawai') }}?kepala_upt=${$("#kepala_upt_field").val()}&pembina_utama_muda=${$(this).val()}`,
                                dataType: 'json',
                                processResults: function(data) {
                                    return {
                                        results: data.data,
                                    };
                                },
                            }
                        });
                    });

                    $("#pembina_field").on("change", function() {
                        $("#sekretaris_field").select2({
                            placeholder: "Pilih Sekretaris",
                            disabled: false,
                            ajax: {
                                url: `{{ route('reference.pegawai') }}?kepala_upt=${$("#kepala_upt_field").val()}&pembina_utama_muda=${$("#pembina_utama_muda_field").val()}&pembina=${$(this).val()}`,
                                dataType: 'json',
                                processResults: function(data) {
                                    return {
                                        results: data.data,
                                    };
                                },
                            }
                        });
                    });

                    $("#sekretaris_field").on("change", function() {
                        $("#bendahara_field").select2({
                            placeholder: "Pilih Bendahara",
                            disabled: false,
                            ajax: {
                                url: `{{ route('reference.pegawai') }}?kepala_upt=${$("#kepala_upt_field").val()}&pembina_utama_muda=${$("#pembina_utama_muda_field").val()}&pembina=${$("#pembina_field").val()}&sekretaris=${$(this).val()}`,
                                dataType: 'json',
                                processResults: function(data) {
                                    return {
                                        results: data.data,
                                    };
                                },
                            }
                        });
                    });

                    $("#bendahara_field").on("change", function() {
                        $("#pengawas_field").select2({
                            placeholder: "Pilih Pengawas",
                            disabled: false,
                            ajax: {
                                url: `{{ route('reference.pegawai') }}?kepala_upt=${$("#kepala_upt_field").val()}&pembina_utama_muda=${$("#pembina_utama_muda_field").val()}&pembina=${$("#pembina_field").val()}&sekretaris=${$("#sekretaris_field").val()}&bendahara=${$(this).val()}`,
                                dataType: 'json',
                                processResults: function(data) {
                                    return {
                                        results: data.data,
                                    };
                                },
                            }
                        });
                    });

                    $("#pengawas_field").on("change", function() {
                        $("#pengadministrasi_umum_field").select2({
                            placeholder: "Pilih Pengadministrasi Umum",
                            disabled: false,
                            ajax: {
                                url: `{{ route('reference.pegawai') }}?kepala_upt=${$("#kepala_upt_field").val()}&pembina_utama_muda=${$("#pembina_utama_muda_field").val()}&pembina=${$("#pembina_field").val()}&sekretaris=${$("#sekretaris_field").val()}&bendahara=${$("#bendahara_field").val()}&pengawas=${$(this).val()}`,
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
            });
        </script>
    @endpush
@endsection
