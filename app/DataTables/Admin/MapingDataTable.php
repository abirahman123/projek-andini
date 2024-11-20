<?php

namespace App\DataTables\admin;

use App\Models\Admin\MapingAssesor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MapingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('aksi', 'asesment.action')
        ->addIndexColumn()
        ->addColumn('aksi', function (MapingAssesor $row) {
            return view('pages.admin.asesment.action', ['data' => $row]);
        })
        ->rawColumns(['aksi'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(MapingAssesor $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('maping-table')
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

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('aksi')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('asesmen_id')
            ->title("Asesmen ID")
            ->searchable(true),
            Column::make('asesor_id')
            ->title("Asesor ID")
            ->searchable(true),
            Column::make('penilaian')
            ->title("Penilaian")
            ->searchable(true),
            Column::make('catatan')
            ->title("Catatan")
            ->searchable(true),
            Column::make('status_rekomendasi')
            ->title("Status")
            ->searchable(true),
            Column::make('keterangan')
            ->title("Keterangan")
            ->searchable(true),
            Column::make('created_at')->title('Dibuat pada')->searchable(false),
            Column::make('updated_at')->title('Diubah pada')->searchable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Maping_' . date('YmdHis');
    }
}
