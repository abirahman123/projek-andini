<?php

namespace App\Http\Controllers\Admin\Catin;

use App\DataTables\Catin\CatinDataTable;
use App\Http\Controllers\Controller;
use App\Models\Catin;
use App\Models\Dispensasi;

class CatinController extends Controller
{
    protected $modules = ["catin.catin"];
    protected $actions = [];

    public function index(CatinDataTable $datatable)
    {
        $filterStatus = request()->get('status');
        if ($filterStatus) {
            $dataTable = new CatinDataTable($filterStatus);
        }
        return $datatable->render('pages.admin.catin.index');
    }

    public function show(Dispensasi $catin)
    {
        return view('pages.admin.catin.show', compact('catin'));
    }
}
