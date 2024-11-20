<div class="d-flex justify-content-center align-items-center">
    @if ($row->cp_id ?? null)
        <button data-action="edit" data-title='Ubah Berkas {{ $row->ref_nama_persyaratan }}'
                data-target="#upload-file-pendukung-modal"
                data-description="{{ base64_encode($row->ref_keterangan)  }}"
                data-url="{{ route('berkas-persyaratan.edit_detail', $row->cp_id) }}?&catin_persyaratan_id={{$row->cp_id}}&persyaratan_id={{ $row->ref_persyaratan_id }}&catin_id={{ $row->catin->id }}"
                class="btn btn-warning" @if ($row->cp_status == 'APPROVED') disabled @endif>
            <i class="fas fa-pen fs-2"></i>
        </button>
    @else
        <button data-action="upload" data-modal-id="upload-file-pendukung-modal"
                data-title='Unggah Berkas {{ $row->ref_nama_persyaratan }}'
                data-description="{{ base64_encode($row->ref_keterangan) }}"
                data-url="{{ route('berkas-persyaratan.upload') }}?&persyaratan_id={{ $row->ref_persyaratan_id }}&catin_id={{ $row->catin->id }}"
                class="btn btn-primary ">
            <i class="fas fa-upload fs-2"></i>
        </button>
    @endif
</div>
