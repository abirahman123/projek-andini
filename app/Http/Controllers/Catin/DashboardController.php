<?php

namespace App\Http\Controllers\Catin;

use App\Http\Controllers\Controller;
use App\Models\News;

class DashboardController extends Controller
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
    public function index(){
        $news = News::all();
        return view('pages.catin.dashboard.index', [
            'news' => $news
        ]);
    }

}
