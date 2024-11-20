<?php

namespace App\DataTables;

use App\Models\Assesor\CatinPersyaratan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CatinPersyaratanDatatable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('DT_RowIndex', function () {
            static $index = 0;
            return ++$index;
        })
        ->editColumn('updated_at', function (CatinPersyaratan $val) {
            return view('components.table-timestamp', [
                'date' => formatDateFromDatabase($val->updated_at)
            ]);
        })
        ->editColumn('status', function ($row) {
            switch ($row->status) {
                case "SUBMITTED":
                    $color = 'blue';
                    break;
                case "APPROVED":
                    $color = 'green';
                    break;
                case "REVISED":
                    $color = 'yellow';
                    break;
                case "REJECTED":
                    $color = 'red';
                    break;
                default:
                    $color = 'black';
            }
            return '<div style="background-color:' . $color . '; color: white; padding: 5px; border-radius: 5px;">' . $row->status . '</div>';
        })
        ->rawColumns(['status']);
    }

    public function query(CatinPersyaratan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('catinpersyaratan-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('No.')
                ->width(30)
                ->searchable(false)
                ->orderable(false),
            Column::make('file_path')
                ->title('Jalur File'),
            Column::make('status'),
            Column::make('keterangan'),
            Column::make('updated_at')
                ->title('Terakhir Diubah')
        ];
    }
    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'CatinPersyaratan_' . date('YmdHis');
    }
}
