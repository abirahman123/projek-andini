<?php

namespace App\Http\Controllers\PA;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.pa.dashboard.index');
    }
}
