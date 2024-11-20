@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card zoom-in">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 col-sm-12 mb-3">
                            <h4 class="card-title">Data Persyaratan Pengantin</h4>
                            <p>Data Pengantin
                                @if (count($persyaratan_catins) !== count($semua_persyaratan))
                                    Belum Lengkapi Semua, Silahkan hubungi pendaftar pengantin untuk melengkapi berkas
                                    persyaratan.
                                @else
                                    Sudah Lengkap, Silahkan cek berkas persyaratan dari pendaftar.
                                @endif
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-12 mb-3 text-end">
                            <a href="{{ route('catin.verifikasi-catin.show', $catin->dispensasi->id) }}"
                                class="btn btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Nama Persyaratan</th>
                                    <th scope="col">Wajib</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                                @foreach ($persyaratan_catins as $persyaratan_catin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <button type="button" class="btn btn-light verif-btn"
                                                data-id="{{ $persyaratan_catin->id }}">
                                                <i class="fas fa-pen fs-2"></i>
                                            </button>
                                        </td>
                                        <td>{{ $persyaratan_catin->persyaratan->nama_persyaratan }}</td>
                                        <td>
                                            @if ($persyaratan_catin->persyaratan->is_wajib)
                                                <span class="badge bg-primary">Wajib</span>
                                            @else
                                                <span class="badge bg-light text-dark">Opsional</span>
                                            @endif
                                        <td>
                                            @if ($persyaratan_catin->status == 'SUBMITTED')
                                                <span class="badge bg-warning">Menunggu Persetujuan</span>
                                            @elseif ($persyaratan_catin->status == 'APPROVED')
                                                <span class="badge bg-success">Disetujui</span>
                                            @elseif ($persyaratan_catin->status == 'REJECTED')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>{{ $persyaratan_catin->keterangan ?? '-' }}</td>
                                    </tr>
                                @endforeach

                                {{-- jika datanya kosong --}}
                                @if (count($persyaratan_catins) == 0)
                                    <tr>
                                        <td colspan="3" class="text-center">Pengantin Belum Melengkapi Data Persyaratan
                                        </td>
                                    </tr>
                                @endif
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="verifikasiModal" tabindex="-1" aria-labelledby="verifikasiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifikasiModalLabel">Verifikasi Persyaratan Catin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="verifikasiForm" custom-action>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="persyaratan" class="form-label">Persyaratan</label>
                            <embed id="persyaratan_pdf" src="" type="application/pdf" width="100%" height="300px"
                                style="display:none">
                            <img id="persyaratan_img" src="" alt="Persyaratan Catin" style="display:none"
                                width="100%">
                        </div>
                        <div class="mb-3">
                            <label for="status_verifikasi" class="form-label">Status Verifikasi</label>
                            <select class="form-control" id="status_verifikasi" name="status_verifikasi">
                                <option value="">Pilih Status Verifikasi</option>
                                <option value="SUBMITTED">Menunggu Persetujuan</option>
                                <option value="APPROVED">Disetujui</option>
                                <option value="REJECTED">Ditolak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="catin_keterangan" name="catin_keterangan" rows="3"></textarea>
                        </div>
                        <input type="hidden" id="persyaratan_catin_id" name="persyaratan_catin_id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Verifikasi Berkas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.verif-btn').click(function() {
                const catinId = $(this).data('id');
                $.ajax({
                    url: `/catin/verifikasi-catin/${catinId}/edit`,
                    method: 'GET',
                    success: function(response) {
                        let fileExtension = getFileExtension(response.file_path.preview);
                        if (fileExtension == 'pdf') {
                            $('#persyaratan_pdf').attr('src', response.file_path.preview);
                            $('#persyaratan_img').hide();
                            $('#persyaratan_pdf').show();
                        } else {
                            $('#persyaratan_img').attr('src', response.file_path.preview);
                            $('#persyaratan_pdf').hide();
                            $('#persyaratan_img').show();
                        }
                        $('#persyaratan_catin_id').val(catinId);
                        $('#persyaratan').attr('src', response.file_path.preview);
                        $('#catin_keterangan').val(response.keterangan);
                        $('#status_verifikasi').val(response.status);
                        $('#verifikasiModal').modal('show');
                    }
                });
            });

            $('#verifikasiForm').submit(function(e) {
                e.preventDefault();

                const catinId = $('#persyaratan_catin_id').val();
                const data = $(this).serialize();

                $.ajax({
                    url: `/catin/verifikasi-catin/${catinId}`,
                    method: 'PUT',
                    data: data,
                    success: function(response) {
                        $('#verifikasiModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }
                });
            });

            function getFileExtension(filePath) {
                return filePath.split('.').pop();
            }
        });
    </script>
@endpush
