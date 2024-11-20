<?php

namespace App\DataTables\Asesmen;

use App\Models\Asesmen\PenilaianAsesmen;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AsesorPenilaianDataTable extends DataTable
{

    protected $asesmen_id;

    public function __construct($asesmen_id)
    {
        $this->asesmen_id = $asesmen_id;
    }
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('status_rekomendasi', function (PenilaianAsesmen $penilaian) {
                return ucwords(str_replace('_', ' ', strtolower($penilaian->status_rekomendasi)));
            })
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PenilaianAsesmen $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('asesmen_id', $this->asesmen_id)
            ->with(['asesor']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('asesor-penilaian-table')
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
            Column::make('asesor.nama')
                ->title("Asesor")
                ->searchable(true),
            Column::make('penilaian')
                ->title("Penilaian")
                ->searchable(true),
            Column::make('status_rekomendasi')
                ->title("Status")
                ->searchable(true),
            Column::make('catatan')
                ->title("Catatan")
                ->searchable(true),

            Column::make('keterangan')
                ->title("Keterangan")
                ->searchable(true),

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
