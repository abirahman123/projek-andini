<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('asesmen.asesor.edit', $asesor->id) }}" title="" class="btn btn-warning">
        <i class="fas fa-pen fs-4"></i>
    </a>
    <button class="btn btn-danger" data-url="{{ route('asesmen.asesor.destroy', $asesor->id) }}" data-name="Asesor {{ $asesor->nama }}" data-action="delete" data-table-id="asesor-table">
        <i class="fas fa-trash fs-4"></i>
    </button>
</div>