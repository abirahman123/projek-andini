<?php

namespace App\DataTables\Master;

use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use App\Models\Master\PersyaratanDispensasi;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PersyaratanDispensasiDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('aksi', 'persyaratan.action')
            ->addColumn('nama_periode', function (PersyaratanDispensasi $row) {
                return $row->periode->periode;
            })
            ->addIndexColumn()
            ->addColumn('aksi', function (PersyaratanDispensasi $row) {
                return view('pages.admin.master.persyaratan-dispensasi.action', ['persyaratandispensasi' => $row]);
            })
            ->editColumn('file_pendukung', function (PersyaratanDispensasi $row) {
                return <<<HTML
                    <div class="d-flex align-items-center">
                        <div class="d-flex flex-column">
                            <span>{$row->file_type}</span>
                        </div>
                    </div>
                HTML;
            })
            ->editColumn('is_wajib', function (PersyaratanDispensasi $row) {
                return '<span class="badge bg-' . ($row->is_wajib == '1' ? 'success' : 'danger') . '">' . ($row->is_wajib == '1' ? 'Wajib' : 'Tidak') . '</span>';
            })
            ->editColumn('is_active', function (PersyaratanDispensasi $row) {
                return '<span class="badge bg-' . ($row->is_active == '1' ? 'success' : 'danger') . '">' . ($row->is_active == '1' ? 'Active' : 'Inactive') . '</span>';
            })
            ->editColumn('created_by', function (PersyaratanDispensasi $PersyaratanDispensasi) {
                return $PersyaratanDispensasi->author?->name;
            })
            ->editColumn('updated_by', function (PersyaratanDispensasi $PersyaratanDispensasi) {
                return $PersyaratanDispensasi->mutator?->name;
            })
            ->editColumn('created_at', function (PersyaratanDispensasi $PersyaratanDispensasi) {
                return view('components.table-timestamp', [
                    'date' => formatDateFromDatabase($PersyaratanDispensasi->created_at),
                    'user' => $PersyaratanDispensasi->createdBy
                ]);
            })
            ->editColumn('updated_at', function (PersyaratanDispensasi $PersyaratanDispensasi) {
                return view('components.table-timestamp', [
                    'date' => formatDateFromDatabase($PersyaratanDispensasi->updated_at),
                    'user' => $PersyaratanDispensasi->updatedBy
                ]);
            })
            ->rawColumns(['aksi', 'file_pendukung', 'is_wajib', 'is_active'])
            ->setRowId('id');
    }

    public function query(PersyaratanDispensasi $model): QueryBuilder
    {
        $query = $model->newQuery();

        // Apply filters if necessary
        if ($this->request()->has('periodeId')) {
            $query->where('periode_id', $this->request()->get('periodeId'));
        }

        return $query;

        // return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('persyaratandispensasi-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                        data._token = '" . csrf_token() . "';
                        data._p = 'POST';
                    ")
            ->addTableClass('table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold  text-uppercase gs-0')
            ->drawCallbackWithLivewire(file_get_contents(public_path('assets/js/dataTables/drawCallback.js')))
            ->select(false)
            ->buttons([]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('aksi')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('nama_periode')->title('Periode')->searchable(true),
            Column::make('nama_persyaratan')->title('Nama Persyaratan')->searchable(false),
            Column::make('file_pendukung')->title('File')->searchable(false),
            Column::make('is_active')->title('Aktif')->searchable(false),
            Column::make('is_wajib')->title('Wajib')->searchable(false),
            Column::make('created_at')->title('Dibuat pada')->searchable(false),
            Column::make('created_by')->title('Dibuat oleh')->searchable(false),
            Column::make('updated_at')->title('Diedit pada')->searchable(false),
            Column::make('updated_by')->title('Diedit oleh')->searchable(false),
        ];
    }

    protected function filename(): string
    {
        return 'PersyaratanDispensasi_' . date('YmdHis');
    }
}
