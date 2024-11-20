<?php

namespace App\Http\Controllers\Asesor;

use App\DataTables\Asesor\AsesmenJadwalDataTable;
use App\Http\Controllers\Controller;
use App\Models\AsesmenJadwal;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.asesor.dashboard.index');
    }
}
