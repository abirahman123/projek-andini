<div class="d-flex justify-content-center align-items-center gap-1">
    @can($globalModule['create'])
    <button data-action="edit" title="edit" data-target="#edit-persyaratandispensasi_modal"
        data-url="{{ route('master.persyaratan.edit',$persyaratandispensasi->id) }}"
        class="btn btn-warning">
        <i class="fas fa-pen fs-4"></i>
    </button>
    @endcan
    <button type="button" title="delete" class="btn btn-light dropdown-toggle" data-bs-boundary="viewport"
    data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fas fa-ellipsis-v me-2"></i>
    </button>
    <ul class="dropdown-menu">
        @can($globalModule['delete'])
            <li>
                <button data-url="{{ route('master.persyaratan.destroy', $persyaratandispensasi->id) }}" data-action="delete"
                    data-table-id="persyaratandispensasi-table" data-name="{{ $persyaratandispensasi->nama_persyaratan }}"
                    class="btn  w-100 text-start  ">
                    <i class="fas fa-trash fs-4 me-2"></i>
                    Delete
                </button>
            </li>
        @endcan


        @can($globalModule['read'])
            <li>
                <button data-action="preview"
                data-url="{{ getFileInfo($persyaratandispensasi->file_pendukung)['preview'] }}"
                data-modal-id="preview-modal"
                    data-title="Preview File" class="btn w-100 text-start "><i
                        class="fas fa-eye fs-4 me-2"></i>
                    Preview
                </button>
            </li>
        @endcan
        <li>
            <a href="{{ route('master.persyaratan.download', $persyaratandispensasi->id) }}" class="btn  w-100  text-start me-2 ">
                <i class="fas fa-download fs-4 me-2"></i>
                Download
            </a>
        </li>
    </ul>
</div>


