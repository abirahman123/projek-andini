<?php

namespace App\DataTables\Catin;

use App\Models\Catin;
use App\Models\Dispensasi;
use App\Models\Master\Periode;
use App\Models\Master\PersyaratanDispensasi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BerkasPersyaratanDetailDataTable extends DataTable
{

    protected Catin $catin;

    public function __construct(Catin $catin)
    {
        $this->catin = $catin;
        parent::__construct();
    }

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('aksi', 'berkas-catin-table.action')
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $row = $row->toArray();
                $row['catin'] = $this->catin;
                $row = (object) $row;
                return view('pages.catin.berkas-persyaratan.partials.action-detail', compact('row'));
            })
            ->editColumn('ref_file_pendukung', function ($row) {
                if ($row->ref_file_pendukung) {
                    return '<a href="' . asset('storage/' . $row->ref_file_pendukung) . '" download class="text-center">
                    <i class="fas fa-download fs-2 me-2"></i>Unduh</a>';
                }
                return <<<HTML
                    <span class="badge bg-light text-dark">Tidak ada file</span>
                HTML;
            })
            ->editColumn('cp_keterangan', function ($row) {
                if ($row->cp_keterangan) {
                    return <<<HTML
                        <span class="badge text-black fw-regular">
                            <small>{$row->cp_keterangan}</small>
                        </span>
                    HTML;
                } else {
                    return <<<HTML
                        <span class="badge text-muted fw-regular">
                            <small><i>Tidak ada catatan.</i></small>
                        </span>
                    HTML;
                }
            })
            ->editColumn('ref_is_wajib', function ($row) {
                if ($row->ref_is_wajib == '1') {
                    return <<<HTML
                        <span class="badge bg-primary">Wajib</span>
                    HTML;
                } else {
                    return <<<HTML
                        <span class="badge bg-light text-dark">Opsional</span>
                    HTML;
                }
            })
            ->editColumn('ref_nama_persyaratan', function ($row) {
                if ($row->cp_file_path) {
                    try {
                        $url = getFileInfo($row->cp_file_path)['preview'];
                    } catch (\Throwable $e) {
                        return <<<HTML
                            <div class="d-flex">
                                <p class="m-0">{$row->ref_nama_persyaratan}</p>
                            </div>
                        HTML;
                    }
                    return <<<HTML
                        <div class="d-flex">
                            <p class="m-0">{$row->ref_nama_persyaratan}</p>
                            <a href="#" class="text-center ms-3" data-action="preview" data-url="{$url}" data-modal-id="preview-modal" data-title="Pratinjau Dokumen">
                                <i class="fas fa-eye fs-2 me-1"></i> Lihat
                            </a>
                        </div>
                    HTML;
                } else {
                    return <<<HTML
                        <div class="d-flex">
                            <p class="m-0">{$row->ref_nama_persyaratan}</p>
                        </div>
                    HTML;
                }
            })
            ->editColumn('cp_status', function ($row) {
                $data = $row->cp_status;
                return view('components.datatables.catin.status_berkas', compact('data'));
            })
            ->rawColumns(['ref_file_pendukung', 'cp_keterangan', 'ref_nama_persyaratan', 'ref_is_wajib'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PersyaratanDispensasi $model): QueryBuilder
    {
        $query = $model->newQuery();
        $activePeriod = Periode::getCurrent();
        $catinId = $this->catin->id;
        $persyaratan = $query->newQuery()
            ->leftJoin('catin_persyaratan as cp', function($join) use ($catinId) {
                $join->on('ref_persyaratan.id', '=', 'cp.persyaratan_id')
                    ->where('cp.catin_id', '=', $catinId);
            })
            ->where('ref_persyaratan.periode_id', '=', $activePeriod->id)
            ->where('is_active', '=', '1')
            ->select(
                'ref_persyaratan.id as ref_persyaratan_id',
                'ref_persyaratan.nama_persyaratan as ref_nama_persyaratan',
                'ref_persyaratan.keterangan as ref_keterangan',
                'ref_persyaratan.file_pendukung as ref_file_pendukung',
                'ref_persyaratan.is_wajib as ref_is_wajib',
                'cp.id as cp_id',
                'cp.file_path as cp_file_path',
                'cp.status as cp_status',
                'cp.keterangan as cp_keterangan',
            );
        return $persyaratan;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {

        $tableId = 'berkas-catin-pria-table';
        if ($this->catin->jenis_kelamin == 'P') {
            $tableId = 'berkas-catin-wanita-table';
        }

        return $this->builder()
                    ->setTableId($tableId)
                    ->columns($this->getColumns())
                    ->minifiedAjax(url: route('berkas-persyaratan.detail', $this->catin), script: "
                                data._token = '" . csrf_token() . "';
                                data._p = 'POST';
                            ")
                    ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
                    ->orderBy(3, 'asc')
                    ->drawCallbackWithLivewire(file_get_contents(public_path('/assets/js/dataTables/drawCallback.js')));
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->width(20)
                ->orderable(false),
            Column::computed('aksi')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('ref_nama_persyaratan')
                ->addClass('w-full')
                ->title('Berkas Persyaratan'),
            Column::make('ref_is_wajib')
                ->addClass('w-fit-td')
                ->title('Wajib'),
            Column::make('ref_file_pendukung')
                ->addClass('w-fit-td')
                ->title('File Pendukung'),
            Column::make('cp_keterangan')
                ->addClass('w-fit-td-max-30')
                ->title('Catatan'),
            Column::make('cp_status')
                ->addClass('w-fit-td')
                ->title('Status'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BerkasPersyaratanDetail_' . date('YmdHis');
    }
}
