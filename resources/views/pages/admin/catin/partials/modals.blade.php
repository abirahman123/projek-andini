    <x-mollecules.modal id="verifikasi-pembayaran-modal" action="/payment/histori-pembayaran/{id}" :hasCloseBtn="false"
        method="PUT" tableId="histori-pembayaran-table">
        <x-slot:title>Verifikasi Pembayaran</x-slot:title>
        <div>
            <div>
                <x-atoms.form-label>Bukti Pembayaran</x-atoms.form-label>
                <div id="mising-image_container">
                    Bukti Pembayaran Belum Diupload
                </div>
                <div style="background: lightgray;" id="image-container" class="aspect-1" style="display: none;">
                    <img src="" class="aspect-content" style="cursor: zoom-in; object-fit: cover;">
                </div>
            </div>
            <div class="mt-2">
                <x-atoms.form-label>Keterangan</x-atoms.form-label>
                <x-atoms.textarea name="keterangan" id="keterangan" class="form-control" disabled></x-atoms.textarea>
            </div>
        </div>
        <x-slot:footer>
            <div class="d-flex w-100 justify-content-between">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <div class="d-flex gap-2">
                    <button id="deny_btn" class="btn btn-danger" type="button" action-need-confirm="true"
                        data-action-type="warn" data-action-method="PUT">Tolak</button>
                    <button type="button" class="btn btn-primary" id="approve_btn" action-need-confirm="true"
                        data-action-method="PUT" data-action-type="warn">Approve</button>
                </div>
            </div>

        </x-slot:footer>
    </x-mollecules.modal>

    @can($globalModule['read'])
        <x-mollecules.modal id="preview-modal" size="md" hasCloseBtn="true" action="#">
            <x-slot name="title">
                Pratinjau Bukti Pembayaran
            </x-slot>
            <x-slot name="footer">
            </x-slot>
            <div class="preview-container-modal" class="mb-3">
                <img src="{{ asset('assets/media/illustrations/img-preview.png') }}" alt="Default Image"
                    class="img-fluid rounded mx-auto d-block" style="max-width: 400px; max-height: 300px;">
            </div>
        </x-mollecules.modal>
    @endcan
