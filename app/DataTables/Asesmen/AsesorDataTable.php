<?php

namespace App\DataTables\Asesmen;

use App\Models\Asesmen\Asesor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AsesorDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = (new EloquentDataTable($query))
        ->addColumn('aksi', 'asesor.action')
        ->addIndexColumn()
        ->addColumn('aksi', function (Asesor $val) {
            return view('pages.admin.asesmen.asesor.action', ['asesor' => $val]);
        })
        ->editColumn('jenis_kelamin', function (Asesor $asesor) {
            return $asesor->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan';
        })
        ->editColumn('status', function (Asesor $asesor) {
            $status = $asesor->status == '1' ? 'Aktif' : 'Tidak Aktif';
            $badgeClass = $asesor->status == '1' ? 'success' : 'danger';
            return '<span class="badge bg-' . $badgeClass . '">' . $status . '</span>';
        })
        ->addColumn('ref_kecamatan', function (Asesor $asesor) {
            return $asesor->kecamatan->nama_kecamatan;
        })
        ->addColumn('ref_kelurahan', function (Asesor $asesor) {
            return $asesor->kelurahan->nama_kelurahan;
        })
        ->addColumn('user_id', function (Asesor $asesor) {
            return $asesor->user->name;
        })
        ->rawColumns(['aksi', 'status'])
        ->setRowId('id');

        return $dataTable;
    }

    public function query(Asesor $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('asesor-table')
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
            Column::make('nama'),
            Column::make('email'),
            Column::make('nomor_hp')
                  ->title('telepon'),
            Column::make('jenis_kelamin'),
            Column::make('ref_kecamatan')
                  ->title('kecamatan'),
            Column::make('ref_kelurahan')
                  ->title('kelurahan'),
            Column::make('alamat'),
            Column::make('user_id')
                  ->title('akun'),
            Column::make('status'),
        ];
    }
}