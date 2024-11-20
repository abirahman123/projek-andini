<div class="d-flex justify-content-center align-items-center gap-2">

    {{-- @can($globalModule['update']) --}}
        <button data-action="edit" data-url="{{ route('asesmen.maping.edit', $data->id) }}"
            data-modal-id="edit-maping-modal" data-title="maping" data-target="#edit-maping-modal"
            class="btn btn-warning">
            <i class="fas fa-pen fs-2"></i></button>
        </button>
    {{-- @endcan
    @can($globalModule['delete']) --}}
        <button data-url="{{ route('asesmen.maping.destroy', $data->id) }}" data-action="delete"
            data-table-id="maping-table" data-name="maping {{ $data->asesmen_id }}" class="btn btn-danger">
            <i class="fas fa-trash fs-2"></i></button>
    {{-- @endcan --}}
</div>
