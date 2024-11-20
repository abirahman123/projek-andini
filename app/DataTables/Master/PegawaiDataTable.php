<?php

namespace App\DataTables\Master;

use App\Models\Master\Pegawai;
use App\Models\Master\Periode;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PegawaiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('aksi', 'pegawai.action')
            ->addIndexColumn()
            ->addColumn('aksi', function (Pegawai $row) {
                return view('pages.admin.master.pegawai.action', ['pegawai' => $row]);
            })
            ->editColumn('jenis_kelamin', function (Pegawai $pegawai) {
                if ($pegawai->jenis_kelamin == 'L') {
                    return 'Laki-laki';
                }
                return 'Perempuan';
            })
            ->editColumn('jabatan', function (Pegawai $pegawai) {
                return $pegawai->getCurrentJabatan();
            })
            ->editColumn('kecamatan_id', function (Pegawai $pegawai) {
                return $pegawai->kecamatan->nama_kecamatan;
            })
            ->editColumn('kelurahan_id', function (Pegawai $pegawai) {
                return $pegawai->kelurahan->nama_kelurahan;
            })
            ->rawColumns(['aksi'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pegawai $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pegawai-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                    data._token = '" . csrf_token() . "';
                    data._p = 'POST';
                ")
            ->addTableClass('table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold  text-uppercase gs-0')
            ->drawCallbackWithLivewire(file_get_contents(public_path('/assets/js/dataTables/drawCallback.js')))
            ->select(false)
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
                ->width(20),
            Column::computed('aksi')
                ->exportable(false)
                ->printable(false)
                ->width(60),
            // Column::make('jabatan_fungsional_id')->title('Jabatan')->searchable(true),
            Column::make('nip')->title('NIP'),
            Column::make('nama'),
            Column::make('tempat_lahir')->title('Tempat Lahir')->searchable(true),
            Column::make('tanggal_lahir')->title('tanggal Lahir'),
            Column::make('jenis_kelamin')->title('Jenis Kelamin'),
            Column::make('kecamatan_id')->title('kecamatan'),
            Column::make('kelurahan_id')->title('kelurahan'),
            Column::computed('jabatan')->title('Jabatan')->searchable(true)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pegawai_' . date('YmdHis');
    }
}
