<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

class  KecamatanController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    public function saya()
    {
        return view('pages.admin.kecamatan.index');
    }

}
