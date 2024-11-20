<div class="d-flex justify-content-center align-items-center gap-2">
        <button data-action="edit" data-url="{{ route('master.kecamatan.edit', $kecamatan->id) }}"
            data-modal-id="edit-kecamatan-modal" data-title="kecamatan" data-target="#edit-kecamatan-modal"
            class="btn btn-warning">
            <i class="fas fa-pen fs-2"></i></button>
        </button>
        <button data-url="{{ route('master.kecamatan.destroy', $kecamatan->id) }}" data-action="delete"
            data-table-id="kecamatan-table" data-name="kecamatan {{ $kecamatan->nama_kecamatan }}" class="btn btn-danger">
            <i class="fas fa-trash fs-2"></i></button>
</div>
