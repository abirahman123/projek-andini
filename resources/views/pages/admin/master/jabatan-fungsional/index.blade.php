@extends('layouts.app')
@section('title', 'Data Jabatan Fungsional')
@section('content')
    <div class="mt-2">
        <div class="my-2">
            <div class="py-3 d-flex flex-column">
                <h1 class="fs-5 fw-bolder m-0" style="color:#131523">Data Jabatan Fungsional Pegawai pada periode aktif {{ $periode->periode }}</h1>
                <p class="fs-3 m-0 mt-1" style="color:#5A607F">
                    
                </p>
            </div>
        </div>
        <form action="{{ $jabatan ? route('master.jabatan.update', $jabatan) : '#' }}" method="POST" id="edit-jabatan_form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="periode_id_field" required>Periode</x-atoms.form-label>
                    <x-atoms.select2 id="periode_id_field" name="periode_id" placeholder="Pilih Periode"
                        source="{{ route('reference.periode') }}" :value="[
                            'v' => $jabatan->periode->id,
                            't' => $jabatan->periode->periode,
                        ]">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="kepala_upt_field" required>Kepala UPT</x-atoms.form-label>
                    <x-atoms.select2 id="kepala_upt_field" name="kepala_upt" placeholder="Pilih Kepala UPT"
                        source="{{ route('reference.pegawai') }}" :value="[
                            'v' => $jabatan->as_kepala_upt->id,
                            't' => $jabatan->as_kepala_upt->nama,
                        ]">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="pembina_utama_muda_field" required>Pembina Utama Muda</x-atoms.form-label>
                    <x-atoms.select2 id="pembina_utama_muda_field" readonly name="pembina_utama_muda"
                        placeholder="Pilih Pembina Utama Muda" source="{{ route('reference.pegawai') }}?kepala_upt={{ $jabatan->kepala_upt }}"
                        :value="[
                            'v' => $jabatan->as_pembina_utama_muda?->id,
                            't' => $jabatan->as_pembina_utama_muda?->nama,
                        ]"
                        title="Pilih Kepala UPT terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="pembina_field" required>Pembina</x-atoms.form-label>
                    <x-atoms.select2 id="pembina_field" readonly name="pembina" placeholder="Pilih Pembina"
                        source="{{ route('reference.pegawai') }}?kepala_upt={{ $jabatan->kepala_upt }}&pembina_utama_muda={{ $jabatan->pembina_utama_muda }}"
                        :value="[
                            'v' => $jabatan->as_pembina?->id,
                            't' => $jabatan->as_pembina?->nama,
                        ]" 
                        title="Pilih Pembina Utama Muda terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="sekretaris_field" required>Sekretaris</x-atoms.form-label>
                    <x-atoms.select2 id="sekretaris_field" readonly name="sekretaris" placeholder="Pilih Sekretaris"
                        source="{{ route('reference.pegawai') }}?kepala_upt={{ $jabatan->kepala_upt }}&pembina_utama_muda={{ $jabatan->pembina_utama_muda }}&pembina={{ $jabatan->pembina }}"
                        :value="[
                            'v' => $jabatan->as_sekretaris?->id,
                            't' => $jabatan->as_sekretaris?->nama,
                        ]"
                        title="Pilih Pembina terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="bendahara_field" required>Bendahara</x-atoms.form-label>
                    <x-atoms.select2 id="bendahara_field" readonly name="bendahara" placeholder="Pilih Bendahara"
                        source="{{ route('reference.pegawai') }}?kepala_upt={{ $jabatan->kepala_upt }}&pembina_utama_muda={{ $jabatan->pembina_utama_muda }}&pembina={{ $jabatan->pembina }}&sekretaris={{ $jabatan->sekretaris }}"
                        :value="[
                            'v' => $jabatan->as_bendahara?->id,
                            't' => $jabatan->as_bendahara?->nama,
                        ]"
                        title="Pilih Sekretaris terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="pengawas_field" required>Pengawas</x-atoms.form-label>
                    <x-atoms.select2 id="pengawas_field" readonly name="pengawas" placeholder="Pilih Pengawas"
                        source="{{ route('reference.pegawai') }}?kepala_upt={{ $jabatan->kepala_upt }}&pembina_utama_muda={{ $jabatan->pembina_utama_muda }}&pembina={{ $jabatan->pembina }}&sekretaris={{ $jabatan->sekretaris }}&bendahara={{ $jabatan->bendahara }}"
                        :value="[
                            'v' => $jabatan->as_pengawas?->id,
                            't' => $jabatan->as_pengawas?->nama,
                        ]"
                        title="Pilih Bendahara terlebih dahulu">
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="pengadministrasi_umum_field" required>Pengadministrasi
                        Umum</x-atoms.form-label>
                    <x-atoms.select2 id="pengadministrasi_umum_field" readonly name="pengadministrasi_umum"
                        placeholder="Pilih Pengadministrasi Umum" source="{{ route('reference.pegawai') }}?kepala_upt={{ $jabatan->kepala_upt }}&pembina_utama_muda={{ $jabatan->pembina_utama_muda }}&pembina={{ $jabatan->pembina }}&sekretaris={{ $jabatan->sekretaris }}&bendahara={{ $jabatan->bendahara }}&pengawas={{ $jabatan->pengawas }}"
                        :value="[
                            'v' => $jabatan->as_pengadministrasi_umum?->id,
                            't' => $jabatan->as_pengadministrasi_umum?->nama,
                        ]"
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
                $(document).on(`form-submitted:edit-jabatan_form`, function() {
                    window.location.href = "{{ route('master.jabatan.index') }}"
                });

                $("#kepala_upt_field").on("change", function() {

                    $("#pembina_utama_muda_field").select2({
                        placeholder: "Pilih Pembina Utama Muda",
                        readonly: false,
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
                            readonly: false,
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
                            readonly: false,
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
                            readonly: false,
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
                            readonly: false,
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
                            readonly: false,
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
