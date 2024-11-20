<?php

namespace App\Http\Controllers;

use App\DataTables\CatinPersyaratanDatatable;
use Illuminate\Http\Request;

class CatinPersyaratanController extends Controller
{
    protected $modules = ["berkascatin"];
    protected $actions = [];

    public function index(CatinPersyaratanDatatable $dataTable)
    {
        return $dataTable->render('pages.assesor.index');
    }
    public function catinPersyaratan(CatinPersyaratanDatatable $dataTable)
    {
        return $dataTable->render('pages.assesor.index');
    }
}
