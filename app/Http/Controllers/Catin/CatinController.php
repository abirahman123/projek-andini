<?php

namespace App\Http\Controllers\Catin;

use App\Http\Controllers\Controller;

class   CatinController extends Controller
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

    // Method untuk menampilkan semua data dari tabel examples
    public function index()
    {
        $examples = Example::all();
        return view('example.index', compact('examples'));
    }

    // Method untuk menambahkan data baru ke dalam tabel examples
    public function store(Request $request)
    {
        $example = new Example();
        $example->name = $request->input('name');
        $example->description = $request->input('description');
        $example->save();

        return redirect()->route('example.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saya()
    {
        return view('pages.admin.catin.index');
    }
}
