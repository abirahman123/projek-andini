@extends('layouts.app')

@section('content')
  <div>
    <div class="card">
      <div class="card-body d-flex flex-column">
        <div class="my-3 d-flex flex-column">
          <div class="d-flex flex-column gap-1">
            <h1 class="fs-5 fw-bolder m-0" style="color:#131523">Tambah Pembayaran</h1>
            <p class="fs-4 m-0" style="color:#5A607F">Pastikan data pendaftaran Anda benar dan Nama Peserta
              sudah sesuai. </p>
          </div>
          <div class="mt-3 ">
            <form method="POST" action="{{ route('histori-pembayaran.store') }}" id="create-data_form"
              class="d-flex flex-column gap-1 my-4">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-3">
                  <x-atoms.form-label required for="register_id_field" style="color: #5A607F">Nama Peserta
                  </x-atoms.form-label>
                  <x-atoms.select2 id="register_id_field" name="register_id" placeholder="Pilih Peserta"
                    style="width: 100%">
                    <option value="">Pilih Peserta</option>
                    @foreach ($registers as $register)
                      <option value="{{ $register->id }}">{{ $register->user->name }}</option>
                    @endforeach
                  </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                  <x-atoms.form-label for="kabupaten_kota_id_field">Nominal
                    Pembayaran</x-atoms.form-label>
                  <x-atoms.input type="text" id="nominal_pembayaran_field" name="nominal_pembayaran" readonly
                    placeholder="Pilih Peserta Terlebih Dahulu" />
                </div>
                <div class="col-md-6 mb-3">
                  <x-atoms.form-label for="keterangan_field" style="color: #5A607F">Keterangan
                  </x-atoms.form-label>
                  <x-atoms.textarea name="keterangan" id="keterangan_field" rows="3"
                    placeholder="Masukan Keterangan Pembayaran" />
                </div>
                <div class="col-md-6 mb-3">
                  <x-atoms.form-label required for="bukti_pembayaran_field" style="color: #5A607F">Bukti
                    Pembayaran
                  </x-atoms.form-label>
                  <x-atoms.dropzone name="bukti_pembayaran" id="bukti_pembayaran_field" />
                </div>
                <div class="d-flex gap-2 justify-content-end mt-4">
                  <a href="{{ route('histori-pembayaran.index') }}" class="btn btn-light rounded-2 fw-semibold">Batal</a>
                  <button type="submit" id="submitButton" class="btn btn-primary rounded-2 fw-semibold">Simpan
                    Data</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@push('scripts')
  <script>
    $(document).on("form-submitted:create-data_form", function() {
      window.location.href = "{{ route('histori-pembayaran.index') }}";
    })

    $('#register_id_field').on('change', function() {
      let register_id = $(this).val();
      $.ajax({
        url: "{{ route('histori-pembayaran.nominal', ['histori_pembayaran' => ':histori_pembayaran']) }}"
          .replace(':histori_pembayaran', register_id),
        type: "GET",
        success: function(data) {
          const result = data.data;
          result ? $('#nominal_pembayaran_field').val(result.biaya_pendaftaran) :
            $('#nominal_pembayaran_field').val(0);
        }
      });
    });
  </script>
@endpush
