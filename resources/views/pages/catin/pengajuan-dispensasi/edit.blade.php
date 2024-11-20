@extends('layouts.app')
@section('title', 'Ubah Data Pengajuan Dispensasi Nikah')
@section('content')
    <div class="py-2">
        <a href="{{ route('pengajuan-dispensasi.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left fs-3"></i>
            <span class="ms-2">
                Kembali
            </span>
        </a>
    </div>
    <div class="mt-3">
        <form id="catin-form" action="{{ route('pengajuan-dispensasi.update', ['pengajuan_dispensasi' => $dispensasi]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="far fa-mars fs-7 me-4 text-info"></i>
                                <div>
                                    <h5 class="fw-bolder m-0 mb-1">
                                        Identitas Calon Pengantin Pria
                                    </h5>
                                    <p class="m-0">
                                        Isi data calon pengantin pria dengan benar dan lengkap.
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <x-atoms.form-label required>Pas Foto</x-atoms.form-label>
                                <x-atoms.dropzone-image id="pria_pas_foto" name="pria_pas_foto" :maxSize="1" :values="$dispensasi->catin_pria->getPasFotoFile()" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_nama_lengkap" required>Nama Lengkap</x-atoms.form-label>
                                <x-atoms.input name="pria_nama_lengkap" id="pria_nama_lengkap"
                                               placeholder="Masukkan Nama Lengkap Calon Pengantin Pria"
                                               value="{{ $dispensasi->catin_pria->nama_lengkap }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_nik" required>Nomor Induk Kependudukan</x-atoms.form-label>
                                <x-atoms.input name="pria_nik" id="pria_nik"
                                               placeholder="Masukkan NIK Calon Pengantin Pria"
                                               value="{{ $dispensasi->catin_pria->nik }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_tempat_lahir" required>Tempat Lahir</x-atoms.form-label>
                                <x-atoms.input name="pria_tempat_lahir" id="pria_tempat_lahir"
                                               placeholder="Masukkan Tempat Lahir Calon Pengantin Pria"
                                               value="{{ $dispensasi->catin_pria->tempat_lahir }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_tanggal_lahir" required>Tanggal Lahir</x-atoms.form-label>
                                <x-atoms.input type="date" name="pria_tanggal_lahir" id="pria_tanggal_lahir"
                                               value="{{ $dispensasi->catin_pria->tanggal_lahir }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_nomor_hp" required>Nomor HP</x-atoms.form-label>
                                <x-atoms.input name="pria_nomor_hp" id="pria_nomor_hp"
                                               placeholder="Masukkan Nomor HP Calon Pengantin Pria"
                                               value="{{ $dispensasi->catin_pria->nomor_hp }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_pekerjaan" required>Pekerjaan</x-atoms.form-label>
                                <x-atoms.input name="pria_pekerjaan" id="pria_pekerjaan"
                                               placeholder="Masukkan Pekerjaan Calon Pengantin Pria"
                                               value="{{ $dispensasi->catin_pria->pekerjaan }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_kecamatan_id" required>Kecamatan</x-atoms.form-label>
                                <x-atoms.select2 placeholder="Kecamatan" name="pria_kecamatan_id" id="pria_kecamatan_id"
                                                 class="form-select w-150px" label="Kecamatan" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_kelurahan_id" required>Desa / Kelurahan</x-atoms.form-label>
                                <x-atoms.select2 placeholder="Kelurahan" name="pria_kelurahan_id" id="pria_kelurahan_id"
                                                 class="form-select w-150px" label="Kelurahan"></x-atoms.select2>
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_alamat" required>Alamat</x-atoms.form-label>
                                <x-atoms.textarea
                                    id="pria_alamat"
                                    name="pria_alamat">{{ $dispensasi->catin_pria->alamat }}</x-atoms.textarea>
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_agama_id" required>Agama</x-atoms.form-label>
                                <x-atoms.select2 placeholder="Agama" name="pria_agama_id" id="pria_agama_id"
                                                 class="form-select w-150px"
                                                 label="Agama"
                                                 :lists="c_option($religions, 'agama')"
                                                 :value="c_value($dispensasi->catin_pria->agama_id, \App\Models\Master\Agama::class, 'agama')">
                                </x-atoms.select2>
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_pendidikan_id" required>Pendidikan</x-atoms.form-label>
                                <x-atoms.select2 placeholder="Pendidikan"
                                                 name="pria_pendidikan_id"
                                                 id="pria_pendidikan_id"
                                                 class="form-select w-150px"
                                                 label="Pendidikan"
                                                 :lists="c_option($educations, 'pendidikan')"
                                                 :value="c_value($dispensasi->catin_pria->pendidikan_id, \App\Models\Master\Pendidikan::class, 'pendidikan')">
                                </x-atoms.select2>
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_nama_ayah">Nama Ayah</x-atoms.form-label>
                                <x-atoms.input name="pria_nama_ayah"
                                               id="pria_nama_ayah"
                                               placeholder="Masukkan Nama Ayah Calon Pengantin Pria"
                                               value="{{ $dispensasi->catin_pria->nama_ayah }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_nama_ibu">Nama Ibu</x-atoms.form-label>
                                <x-atoms.input name="pria_nama_ibu"
                                               id="pria_nama_ibu"
                                               placeholder="Masukkan Nama Ibu Calon Pengantin Pria"
                                               value="{{ $dispensasi->catin_pria->nama_ibu }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="pria_nama_wali">Nama Wali</x-atoms.form-label>
                                <x-atoms.input name="pria_nama_wali"
                                               id="pria_nama_wali"
                                               placeholder="Masukkan Nama Wali Calon Pengantin Pria"
                                               value="{{ $dispensasi->catin_pria->nama_wali }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="far fa-venus fs-7 me-4 text-danger"></i>
                                <div>
                                    <h5 class="fw-bolder m-0 mb-1">
                                        Identitas Calon Pengantin Wanita
                                    </h5>
                                    <p class="m-0">
                                        Isi data calon pengantin wanita dengan benar dan lengkap.
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <x-atoms.form-label required>Pas Foto</x-atoms.form-label>
                                <x-atoms.dropzone-image id="wanita_pas_foto" name="wanita_pas_foto" :maxSize="1" :values="$dispensasi->catin_wanita->getPasFotoFile()" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_nama_lengkap" required>Nama Lengkap</x-atoms.form-label>
                                <x-atoms.input name="wanita_nama_lengkap"
                                               id="wanita_nama_lengkap"
                                               placeholder="Masukkan Nama Lengkap Calon Pengantin Wanita"
                                               value="{{ $dispensasi->catin_wanita->nama_lengkap }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_nik" required>Nomor Induk Kependudukan</x-atoms.form-label>
                                <x-atoms.input name="wanita_nik"
                                               id="wanita_nik"
                                               placeholder="Masukkan NIK Calon Pengantin Wanita"
                                               value="{{ $dispensasi->catin_wanita->nik }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_tempat_lahir" required>Tempat Lahir</x-atoms.form-label>
                                <x-atoms.input name="wanita_tempat_lahir"
                                               id="wanita_tempat_lahir"
                                               placeholder="Masukkan Tempat Lahir Calon Pengantin Wanita"
                                               value="{{ $dispensasi->catin_wanita->tempat_lahir }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_tanggal_lahir" required>Tanggal Lahir</x-atoms.form-label>
                                <x-atoms.input type="date"
                                               name="wanita_tanggal_lahir"
                                               id="wanita_tanggal_lahir"
                                               value="{{ $dispensasi->catin_wanita->tanggal_lahir }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_nomor_hp" required>Nomor HP</x-atoms.form-label>
                                <x-atoms.input name="wanita_nomor_hp"
                                               id="wanita_nomor_hp"
                                               placeholder="Masukkan Nomor HP Calon Pengantin Wanita"
                                               value="{{ $dispensasi->catin_wanita->nomor_hp }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_pekerjaan" required>Pekerjaan</x-atoms.form-label>
                                <x-atoms.input name="wanita_pekerjaan"
                                               id="wanita_pekerjaan"
                                               placeholder="Masukkan Pekerjaan Calon Pengantin Wanita"
                                               value="{{ $dispensasi->catin_wanita->pekerjaan }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_kecamatan_id" required>Kecamatan</x-atoms.form-label>
                                <x-atoms.select2 placeholder="Kecamatan"
                                                 name="wanita_kecamatan_id"
                                                 id="wanita_kecamatan_id"
                                                 class="form-select w-150px"
                                                 label="Kecamatan" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_kelurahan_id" required>Desa / Kelurahan</x-atoms.form-label>
                                <x-atoms.select2 placeholder="Kelurahan"
                                                 name="wanita_kelurahan_id"
                                                 id="wanita_kelurahan_id"
                                                 class="form-select w-150px"
                                                 label="Kelurahan">
                                </x-atoms.select2>
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_alamat" required>Alamat</x-atoms.form-label>
                                <x-atoms.textarea
                                    id="wanita_alamat"
                                    name="wanita_alamat">{{ $dispensasi->catin_wanita->alamat }}</x-atoms.textarea>
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_agama" required>Agama</x-atoms.form-label>
                                <x-atoms.select2 placeholder="Agama" name="wanita_agama_id" id="wanita_agama_id"
                                                 class="form-select w-150px"
                                                 label="Agama"
                                                 :lists="c_option($religions, 'agama')"
                                                 :value="c_value($dispensasi->catin_pria->agama_id, \App\Models\Master\Agama::class, 'agama')">
                                </x-atoms.select2>
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_pendidikan_id" required>Pendidikan</x-atoms.form-label>
                                <x-atoms.select2 placeholder="Pendidikan" name="wanita_pendidikan_id" id="wanita_pendidikan_id"
                                                 class="form-select w-150px"
                                                 label="Pendidikan"
                                                 :lists="c_option($educations, 'pendidikan')"
                                                 :value="c_value($dispensasi->catin_pria->pendidikan_id, \App\Models\Master\Pendidikan::class, 'pendidikan')">
                                </x-atoms.select2>
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_nama_ayah">Nama Ayah</x-atoms.form-label>
                                <x-atoms.input name="wanita_nama_ayah"
                                               id="wanita_nama_ayah"
                                               placeholder="Masukkan Nama Ayah Calon Pengantin Wanita"
                                               value="{{ $dispensasi->catin_wanita->nama_ayah }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_nama_ibu">Nama Ibu</x-atoms.form-label>
                                <x-atoms.input name="wanita_nama_ibu"
                                               id="wanita_nama_ibu"
                                               placeholder="Masukkan Nama Ibu Calon Pengantin Wanita"
                                               value="{{ $dispensasi->catin_wanita->nama_ibu }}" />
                            </div>
                            <div class="mb-3">
                                <x-atoms.form-label for="wanita_nama_wali" required>Nama Wali</x-atoms.form-label>
                                <x-atoms.input name="wanita_nama_wali"
                                               id="wanita_nama_wali"
                                               placeholder="Masukkan Nama Wali Calon Pengantin Wanita"
                                               value="{{ $dispensasi->catin_wanita->nama_wali }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="fw-bolder">Pernyataan</h6>
                        </div>
                        <div class="card-body">
                            <x-atoms.checkbox name="is_pasangan_hamil" id="is_pasangan_hamil" class="checkbox" checked="{{ $dispensasi->is_pasangan_hamil }}">Centang jika pasangan hamil sebelum menikah</x-atoms.checkbox>
                            <p class="mb-4 mt-3">
                                Dengan ini saya menyatakan bahwa data yang saya isikan pada formulir ini adalah benar dan
                                saya bersedia untuk menanggung segala akibat yang timbul apabila data yang saya isikan
                                terbukti tidak benar.
                            </p>
                            <div class="d-flex justify-content-end border-top pt-4">
                                <button type="submit" class="btn btn-primary fw-semibold w-20">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function loadLocationData(target, url, placeholder, value = null, callback = null) {
            let initials;
            let val;
            if (value) {
                val = JSON.parse(value);
                initials = [{
                    id: val.v,
                    text: val.t
                }];
            }
            target.select2({
                data: initials,
                placeholder: placeholder,
                allowClear: true,
                ajax: {
                    url: url,
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
            if (value) {
                target.val(val.v).trigger('change');
            } else {
                target.val(null).trigger('change');
            }
            if (callback) {
                callback();
            }
        }

        function initializeLocation() {
            loadLocationData($('#pria_kecamatan_id'),
                "{{ route('reference.kecamatan') }}",
                'Kecamatan',
                '{!! json_encode(c_value($dispensasi->catin_pria->kecamatan_id, \App\Models\Master\Kecamatan::class, 'nama_kecamatan')) !!}',
                function () {
                    let kecamatan_id = $('#pria_kecamatan_id').val();
                    loadLocationData($('#pria_kelurahan_id'),
                        "{{ route('reference.kelurahan') }}?kecamatan_id=" + kecamatan_id,
                        'Kelurahan',
                        '{!! json_encode(c_value($dispensasi->catin_pria->kelurahan_id, \App\Models\Master\Kelurahan::class, 'nama_kelurahan')) !!}'
                    );
                }
            );

            loadLocationData($('#wanita_kecamatan_id'),
                "{{ route('reference.kecamatan') }}",
                'Kecamatan',
                '{!! json_encode(c_value($dispensasi->catin_wanita->kecamatan_id, \App\Models\Master\Kecamatan::class, 'nama_kecamatan')) !!}',
                function () {
                    let kecamatan_id = $('#wanita_kecamatan_id').val();
                    loadLocationData($('#wanita_kelurahan_id'),
                        "{{ route('reference.kelurahan') }}?kecamatan_id=" + kecamatan_id,
                        'Kelurahan',
                        '{!! json_encode(c_value($dispensasi->catin_wanita->kelurahan_id, \App\Models\Master\Kelurahan::class, 'nama_kelurahan')) !!}'
                    );
                }
            );
        }

        $(document).ready(function() {
            initializeLocation();
            $(document).on(`select2-data:pria_kecamatan_id`, function() {
                alert('id');
            });
            $(document).on(`form-submitted:catin-form`, function() {
                window.location.href = "{{ route('pengajuan-dispensasi.index') }}";
            });
            $('#pria_kecamatan_id').on('change', function() {
                console.log("ABC");
                const url = "{{ route('reference.kelurahan') }}?kecamatan_id=" + $(this).val();
                loadLocationData($('#pria_kelurahan_id'), url, 'Kelurahan');
            });
            $('#wanita_kecamatan_id').on('change', function() {
                const url = "{{ route('reference.kelurahan') }}?kecamatan_id=" + $(this).val();
                loadLocationData($('#wanita_kelurahan_id'), url, 'Kelurahan');
            });
        })
    </script>
@endpush
