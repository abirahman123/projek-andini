@extends('layouts.app')
{{-- @can($globalModule['read']) --}}
    @section('content')
        @if (!$data_instansi)
            <div class="alert alert-warning" role="alert">
                Data instansi belum diatur. Silahkan atur data instansi terlebih dahulu.
            </div>
        @endif
        <div class="pt-6">
            <form id="form" action="{{ route('master.instansi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4><b>Data Umum</b></h4>
                <div class="row mt-3 mb-4">
                    <div class="col-md-5 mb-3">
                        <x-atoms.form-label required>Logo</x-atoms.form-label>
                        <x-atoms.dropzone-image id="logo_field" name="logo" :maxSize="1" :values="$logo" />
                    </div>

                    <div class="col-md-7 mb-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <x-atoms.form-label required>Nama Instansi</x-atoms.form-label>
                                <x-atoms.input name="nama_instansi" placeholder="Masukkan Nama Instansi"
                                    value="{{ old('nama_instansi', $data_instansi->nama_instansi ?? '') }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-atoms.form-label required>Nama Pendek</x-atoms.form-label>
                                <x-atoms.input name="nama_pendek" placeholder="Masukkan Nama Pendek Instansi"
                                    value="{{ old('nama_pendek', $data_instansi->nama_pendek ?? '') }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-atoms.form-label required>Website</x-atoms.form-label>
                                <x-atoms.input name="website" placeholder="Masukkan Website"
                                    value="{{ old('website', $data_instansi->website ?? '') }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <h4><b>Data Kontak</b></h4>
                <div class="row mt-3 mb-4">
                    <div class="col-md-12 mb-3">
                        <x-atoms.form-label required>Email</x-atoms.form-label>
                        <x-atoms.input name="email" placeholder="Masukkan Email"
                            value="{{ old('email', $data_instansi->email ?? '') }}" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <x-atoms.form-label required>Telepon</x-atoms.form-label>
                        <x-atoms.input name="telepon" placeholder="Masukkan Telepon"
                            value="{{ old('telepon', $data_instansi->telepon ?? '') }}" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <x-atoms.form-label required>Fax</x-atoms.form-label>
                        <x-atoms.input name="fax" placeholder="Masukkan Fax"
                            value="{{ old('fax', $data_instansi->fax ?? '') }}" />
                    </div>
                </div>

                <h4><b>Data Alamat</b></h4>
                <div class="row mt-3 mb-4">

                    <div class="col-md-12 mb-3">
                        <x-atoms.form-label required>Alamat</x-atoms.form-label>
                        <x-atoms.textarea name="alamat" placeholder="Masukkan Alamat"
                            rows="3">{{ old('alamat', $data_instansi->alamat ?? '') }}</x-atoms.textarea>
                    </div>

                {{-- @can($globalModule['create']) --}}
                    <hr>
                    <div class="text-end mb-5">
                        <button type="submit" class="btn btn-primary">Simpan Data Instansi</button>
                    </div>
                {{-- @endcan --}}
            </form>
        </div>
    @endsection
{{-- @endcan --}}

@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('form-submitted:form', function() {
                location.reload();
            });
        });
    </script>
@endpush
