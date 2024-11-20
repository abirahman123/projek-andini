<div class="d-flex justify-content-center align-items-center gap-2">

    {{-- @can($globalModule['update']) --}}
    <button data-action="edit" data-url="{{ route('master.periode.edit', $periode->id) }}"
        data-modal-id="edit-periode-modal" data-title="Periode" data-target="#edit-periode-modal" class="btn btn-warning">
        <i class="fas fa-pen fs-2"></i></button>
    </button>
    {{-- @endcan --}}
    {{-- @can($globalModule['delete']) --}}
    <button data-url="{{ route('master.periode.destroy', $periode->id) }}" data-action="delete"
        data-table-id="periode-table" data-name="Periode {{ $periode->periode }}" class="btn btn-danger"
        {{ $periode->is_active == '1' ? 'disabled' : '' }}>
        <i class="fas fa-trash fs-2"></i></button>
    {{-- @endcan --}}

    @if ($periode->is_active == '1')
        <button class="btn btn-primary" disabled> <i class="fas fa-check fs-2"></i>
        </button>
    @else
        <button data-url="{{ route('master.periode.activate', $periode->id) }}" class="btn btn-success btn-active"
            onclick="activatePeriode(event)"> <i class="fas fa-power-off fs-2"></i>
        </button>
    @endif
</div>
