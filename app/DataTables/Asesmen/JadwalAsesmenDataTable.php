<?php

namespace App\DataTables\Asesmen;

use App\Helpers\StatusHelper;
use App\Models\Asesmen\JadwalAsesmen;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class JadwalAsesmenDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = (new EloquentDataTable($query))
            ->addColumn('aksi', 'jadwal-asesmen.action')
            ->addIndexColumn()
            ->addColumn('aksi', function (JadwalAsesmen $val) {
                return view('pages.admin.asesmen.jadwal-asesmen.action', ['jadwalasesmen' => $val]);
            })
            ->editColumn('status', function (JadwalAsesmen $jadwalasesmen) {
                return StatusHelper::formatStatus($jadwalasesmen->status);
            })
            ->addColumn('register', function (JadwalAsesmen $jadwalasesmen) {
                return $jadwalasesmen->dispensasi->register->nama;
            })
            ->addColumn('periode', function (JadwalAsesmen $jadwalasesmen) {
                return $jadwalasesmen->periode->periode;
            })
            ->editColumn('tanggal_asesmen', function (JadwalAsesmen $jadwalasesmen) {
                return \App\Helpers\Formatter::date($jadwalasesmen->tanggal_asesmen, 'd F Y H:i');
            })
            ->rawColumns(['aksi', 'status', 'tanggal_asesmen'])
            ->setRowId('id');

        return $dataTable;
    }

    public function query(JadwalAsesmen $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jadwalasesmen-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                        data._token = '" . csrf_token() . "';
                        data._p = 'POST';
                    ")

            ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
            ->select(false)
            ->drawCallbackWithLivewire(file_get_contents(public_path('assets/js/dataTables/drawCallback.js')))
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
            Column::make('register')
                ->title('nama'),
            Column::make('periode'),
            Column::make('tanggal_asesmen')
                ->title('tanggal & jam'),
            Column::make('catatan'),
            Column::make('status'),
            Column::make('keterangan'),
        ];
    }
}
