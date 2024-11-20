<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persyaratan;
class PersyaratanController extends Controller
{
    protected $modules = ['cms','cms.file-manager'];

    public function index()
    {
        $persyaratan = Persyaratan::all();
        return view('pages.admin.dashboard.persyaratan.index', compact('persyaratan'));
    }

    public function store(Request $request)

    {
        $request->validate([
            'nama'=>'required',
            'jenis_file'=> 'required',
            'file'=> 'required|file|max:1024',//maksimal 10 mb
        ]);
        $file = $request-> file('file');
        $nama_file = $file-> getClientOriginalName();
        $path_file = $file->storeAs('public/persyaratan', $nama_file);

        $persyaratan = new Persyaratan();
        $persyaratan -> nama =$request->nama;
        $persyaratan -> jenis_file =$request->jenis_file;
        $persyaratan -> path_file =$path_file;
        $persyaratan -> save();
        return redirect()->route('persyaratan.index')->with('success','persyaratan berhasil diunggah');

    }
}
