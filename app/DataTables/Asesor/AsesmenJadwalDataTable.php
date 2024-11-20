<?php

namespace App\DataTables\Asesor;

use App\Models\AsesmenJadwal;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AsesmenJadwalDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'asesmenjadwal.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(AsesmenJadwal $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('system-setting-table')
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


    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('tanggal_asesmen'),
            Column::make('catatan'),
            Column::make('status'),
            Column::make('keterangan'),
        ];
    }

    
    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AsesmenJadwal_' . date('YmdHis');
    }
}
