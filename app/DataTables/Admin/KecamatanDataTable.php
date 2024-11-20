<?php

namespace App\DataTables\Admin;

use App\Models\Master\Kecamatan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KecamatanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'kecamatan.action')
            ->addColumn('action', function (Kecamatan $val) {
                return view('pages.admin.master.kecamatan.action', ['kecamatan' => $val]);
            })
            ->editColumn('is_active', function (Kecamatan $val) {
                return '<span class="badge bg-' . ($val->is_active == '1' ? 'success' : 'danger') . '">' . ($val->is_active == '1' ? 'Active' : 'Inactive') . '</span>';
            })
            ->editColumn('created_at', function (Kecamatan $kecamatan) {
                return view('components.table-timestamp', [
                    'date' => formatDateFromDatabase($kecamatan->created_at)
                ]);
            })
            ->editColumn('updated_at', function (Kecamatan $kecamatan) {
                return view('components.table-timestamp', [
                    'date' => formatDateFromDatabase($kecamatan->updated_at)
                ]);
            })
            ->rawColumns(['aksi','is_active'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Kecamatan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('Kecamatan-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                        data._token = '" . csrf_token() . "';
                        data._p = 'POST';
                    ")
            ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
            ->select(false)
            ->drawCallbackWithLivewire(file_get_contents(public_path('/assets/js/dataTables/drawCallback.js')))
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('kode_kecamatan'),
            Column::make('nama_kecamatan'), // Menambahkan field 'nama_kecamatan'
            Column::make('is_active')->title("Status"),
            Column::make('created_at')->title('Ditambah Pada'), // Menambahkan field 'created_at'
            Column::make('updated_at')->title('Diubah Pada'), // Menambahkan field 'updated_at'
        ];
    }


    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Kecamatan_' . date('YmdHis');
    }
}
