<div class="d-flex justify-content-center align-items-center gap-2">
    <input type="hidden" name="id" value="{{ $pegawai->id }}">

    {{-- @can($globalModule['update']) --}}
    <button data-action="edit" data-url="{{ route('master.pegawai.edit', $pegawai->id) }}"
        data-modal-id="edit-pegawai-modal" data-title="pegawai" data-target="#edit-pegawai-modal" class="btn btn-warning">
        <i class="fas fa-pen fs-2"></i></button>
    {{-- @endcan --}}

    <button type="button" class="btn btn-light dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown"
        aria-expanded="false" title="more-actions">
        <i class="fas fa-ellipsis-v me-2 "></i>
    </button>
    <ul class="dropdown-menu">
        <li>
            {{-- @can($globalModule['read']) --}}
                <button data-action="edit" data-target="#detail-pegawai_modal"
                    data-url="{{ route('master.pegawai.show', $pegawai->id) }}" title="detail" class="btn w-100 text-start">
                    <i class="fas fa-eye fs-4"></i>
                    <span class="ms-2">Detail</span>
                </button>
            {{-- @endcan --}}
        </li>
        <li>
            {{-- @can($globalModule['delete']) --}}
                <button data-url="{{ route('master.pegawai.destroy', $pegawai->id) }}" data-action="delete"
                    data-table-id="pegawai-table" data-name="Pegawai {{ $pegawai->nama }}" class="btn w-100 text-start">
                    <i class="fas fa-trash fs-4"></i>
                    <span class="ms-2">Hapus</span>
                </button>
            {{-- @endcan --}}
        </li>
    </ul>
</div>
