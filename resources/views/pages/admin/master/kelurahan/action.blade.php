<div class="d-flex justify-content-center align-items-center gap-2">
        <button data-action="edit" data-url="{{ route('master.kelurahan.edit', $kelurahan->id) }}"
            data-modal-id="edit-kelurahan-modal" data-title="kelurahan" data-target="#edit-kelurahan-modal"
            class="btn btn-warning">
            <i class="fas fa-pen fs-2"></i></button>
        </button>
        <button data-url="{{ route('master.kelurahan.destroy', $kelurahan->id) }}" data-action="delete"
            data-table-id="kelurahan-table" data-name="kelurahan {{ $kelurahan->nama_kelurahan }}" class="btn btn-danger">
            <i class="fas fa-trash fs-2"></i></button>
</div>