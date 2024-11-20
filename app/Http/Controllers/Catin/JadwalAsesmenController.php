<?php

namespace App\Http\Controllers\Catin;

use App\DataTables\Catin\JadwalAsesmenDataTable;
use App\Http\Controllers\Controller;

class JadwalAsesmenController extends Controller
{
    protected $modules = ['catin.jadwal-asesmen'];

    public function index(JadwalAsesmenDataTable $dataTable)
    {
        return $dataTable->render('pages.catin.jadwal-asesmen.index');
    }
}
