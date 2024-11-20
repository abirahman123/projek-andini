<?php

namespace App\DataTables\Asesor;

use App\Models\Admin\Asesor;
use App\Models\AsesmenPenilaian;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CatinAsesmenDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('aksi', function ($query) {
                return view('pages.asesor.catin-asesmen.partials.actions', ['data' => $query]);
            })
            ->editColumn('tanggal_asesmen', function ($query) {
                return \Carbon\Carbon::parse($query->asesmen_jadwal->tanggal_asesmen)->locale('id')->translatedFormat('d F Y');
            })
            ->editColumn('calon_pengantin', function ($query) {
                return $query->asesmen_jadwal->dispensasi->catin_pria->nama_lengkap . ' & ' . $query->asesmen_jadwal->dispensasi->catin_wanita->nama_lengkap;
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(AsesmenPenilaian $model): QueryBuilder
    {
        $query = $model->newQuery();
        if (Auth::user()->hasRole('asesor')) {
            $asesor = Asesor::where('user_id', Auth::id())->first();
            if ($asesor !== null) {
                $query->where('asesor_id', $asesor->id)->with([
                    'asesmen_jadwal',
                    'asesmen_jadwal.dispensasi',
                    'asesmen_jadwal.dispensasi.register',
                    'asesmen_jadwal.dispensasi.catin_pria',
                    'asesmen_jadwal.dispensasi.catin_wanita',
                ]);
            }
        }
        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('catin-asesmen-table')
            ->responsive(true)
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                    data._token = '" . csrf_token() . "';
                    data._p = 'POST';
                ")

            ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
            ->orderBy(3)
            ->select(false)
            ->drawCallbackWithLivewire(file_get_contents(public_path('assets/js/dataTables/drawCallback.js')))
            ->buttons([]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('No.')
                ->width(30)
                ->searchable(false)
                ->orderable(false),
            Column::computed('aksi')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::computed('tanggal_asesmen'),
            Column::make('asesmen_jadwal.status')
                ->title('Status Asesmen')
                ->searchable(true),
            Column::make('asesmen_jadwal.dispensasi.register.nama')
                ->title('Pemohon')
                ->searchable(true),
            Column::computed('calon_pengantin'),
        ];
    }

    protected function filename(): string
    {
        return 'Catin-Asesmen_' . date('YmdHis');
    }
}
