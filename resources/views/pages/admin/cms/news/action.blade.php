<div class="d-flex justify-content-center align-items-center gap-1">
    @can($globalModule['create'])
        <button data-action="edit" title="edit" data-target="#edit-news_modal"
            data-url="{{ route('cms.news.edit', $news->id) }}" class="btn btn-warning ">
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
                <button data-url="{{ route('cms.news.destroy', $news->id) }}" data-action="delete"
                    data-table-id="news-table" data-name="{{ $news->title }}"
                    class="btn  w-100 text-start  ">
                    <i class="fas fa-trash fs-4 me-2"></i>
                    Delete
                </button>
            </li>
        @endcan
        @can($globalModule['read'])
            <li>
                <button data-action="preview"
                data-url="{{ getFileInfo($news->image_url)['preview'] }}"
                data-modal-id="preview-modal"
                    data-title="Preview File" class="btn w-100 text-start "><i
                        class="fas fa-eye fs-4 me-2"></i>
                    Preview
                </button>
            </li>
        @endcan
    </ul>
</div>
