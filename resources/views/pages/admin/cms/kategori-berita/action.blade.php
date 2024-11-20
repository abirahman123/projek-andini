<div class="d-flex justify-content-center align-items-center gap-2">
    @if (request()->routeIs('cms.kategori-berita.histori'))
        <button data-action="restore" data-url="{{ route('cms.kategori-berita.restore', $kategori_berita->id) }}"
            data-table-id="kategori_berita-table" data-name="Kategori {{ $kategori_berita->name }}"
            class="btn btn-success">
            <i class="fas fa-recycle fs-3"></i>
        </button>
    @else
        @can($globalModule['update'])
            <button data-action="edit" data-url="{{ route('cms.kategori-berita.edit', $kategori_berita->id) }}"
                data-modal-id="edit-kategori_berita_modal" data-title="Kategori" data-target="#edit-kategori_berita_modal"
                class="btn btn-warning">
                <i class="fas fa-pen fs-2"></i></button>
            </button>
        @endcan
        @can($globalModule['delete'])
            <button data-url="{{ route('cms.kategori-berita.destroy', $kategori_berita->id) }}" data-action="delete"
                data-table-id="kategori_berita-table" data-name="{{ $kategori_berita->name }}" class="btn btn-danger">
                <i class="fas fa-trash fs-2"></i></button>
        @endcan
    @endif
</div>
