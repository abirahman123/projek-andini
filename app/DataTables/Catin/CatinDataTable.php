<?php

namespace App\DataTables\Catin;

use App\Models\Catin;
use App\Models\Dispensasi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CatinDataTable extends DataTable
{
    public function __construct(protected $status = null)
    {
        $this->status = $status;
    }
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('aksi', function (Dispensasi $val) {
                return view('pages.admin.catin.partials.action', ['catin' => $val]);
            })
            ->editColumn('status_persetujuan', function (Dispensasi $val) {
                $color = match ($val->status_persetujuan) {
                    "SUBMITTED" => "warning",
                    "APPROVED" => "success",
                    "REJECTED" => "danger",
                };
                return '<span class="badge bg-' . $color . '">' . $val->status_persetujuan . '</span>';
            })
            ->rawColumns(['aksi', 'status_persetujuan'])
            ->setRowId('id');
    }

    public function query(Dispensasi $model): QueryBuilder
    {
        $params = request()->only(['status']);
        $query = $model->newQuery()->with('register', 'catin_pria', 'catin_wanita')->when(isset($params['status']), function ($query) use ($params) {
            $query->where('status_persetujuan', $params['status']);
        });
        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('catin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle();
    }

    public function getColumns(): array
    {
        return [
            Column::computed('aksi')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('register_id')->title('Nama Pendaftar')->data('register.nama'),
            Column::make('register.nomor_hp')->title('No. Telepon')->data('register.nomor_hp'),
            Column::make('catin_pria.nama_lengkap')->title('Pengantin Pria')->data('catin_pria.nama_lengkap'),
            Column::make('catin_wanita.nama_lengkap')->title('Pengantin Wanita')->data('catin_wanita.nama_lengkap'),
            Column::make('status_persetujuan')->title('Status'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    protected function filename(): string
    {
        return 'catin_' . date('YmdHis');
    }
}
