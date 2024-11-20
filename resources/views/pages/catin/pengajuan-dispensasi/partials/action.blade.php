<div class="d-flex justify-content-center align-items-center gap-1">
    @can($globalModule['update'])
        <a href="{{ route('pengajuan-dispensasi.edit', $data->id) }}" class="btn btn-warning">
            <i class="fas fa-pen fs-3"></i>
        </a>
    @endcan
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-boundary="viewport"
            data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-ellipsis-v me-2"></i>
    </button>
    <ul class="dropdown-menu">
        @can($globalModule['read'])
            <li>
                <a class="btn w-100 text-start {{ $data->status_persetujuan != 'APPROVED' ? 'disabled' : '' }}" href="{{ route('pengajuan-dispensasi.print', $data->id) }}">
                    <i class="fas fa-print fs-2 me-2"></i>
                    Unduh Surat Dispensasi
                </a>
            </li>
        @endcan
        @can($globalModule['delete'])
            <li>
                <button {{ $data->status_persetujuan != 'SUBMITTED' ? 'disabled' : '' }} data-url="{{ route('pengajuan-dispensasi.destroy', $data->id) }}" data-action="delete"
                        data-table-id="pengajuan-dispensasi-table" data-name="{{ $data->catin_pria->nama_lengkap }} & {{ $data->catin_wanita->nama_lengkap }}" class="btn w-100 text-start">
                    <i class="fas fa-trash fs-2 me-2"></i>
                    Hapus
                </button>
            </li>
        @endcan
    </ul>
</div>
