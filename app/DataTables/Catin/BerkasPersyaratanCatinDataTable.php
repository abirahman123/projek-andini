<?php

namespace App\DataTables\Catin;

use App\Helpers\Formatter;
use App\Models\Dispensasi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BerkasPersyaratanCatinDataTable extends DataTable
{
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
            ->addColumn('aksi', function (Dispensasi $val) {
                return view('pages.catin.berkas-persyaratan.partials.action', ['data' => $val]);
            })
            ->editColumn('catin_pria.nama_lengkap', function (Dispensasi $data) {
                return view('components.datatables.catin.catin', [
                    'data' => $data->catin_pria
                ]);
            })
            ->editColumn('catin_wanita.nama_lengkap', function (Dispensasi $data) {
                return view('components.datatables.catin.catin', [
                    'data' => $data->catin_wanita
                ]);
            })
            ->editColumn('tanggal_pengajuan', function (Dispensasi $data) {
                return Formatter::date($data->tanggal_pengajuan);
            })
            ->editColumn('status', function (Dispensasi $data) {
                return view('components.datatables.catin.status_kelengkapan', [
                    'data' => $data
                ]);
            })
            ->rawColumns(['aksi'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Dispensasi $model): QueryBuilder
    {
        return $model->newQuery()
            ->with('catin_pria')
            ->with('catin_wanita')
            ->where('register_id', auth()->user()->register?->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('berkas-catin-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                        data._token = '" . csrf_token() . "';
                        data._p = 'POST';
                    ")
            ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
            ->select(false)
            ->orderBy(2)
            ->drawCallbackWithLivewire(file_get_contents(public_path('/assets/js/dataTables/drawCallback.js')))
            ->buttons([]);
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
                ->addClass('text-center w-fit-td'),
            Column::make('catin_pria.nama_lengkap')
                ->title('Calon Pengantin Pria')
                ->orderable(false),
            Column::make('catin_wanita.nama_lengkap')
                ->title('Calon Pengantin Wanita')
                ->orderable(false),
            Column::computed('status')
                ->addClass('w-fit-td')
                ->title('Status Kelengkapan')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'RegistrasiCatin_' . date('YmdHis');
    }
}
