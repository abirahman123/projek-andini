<?php

namespace App\Http\Controllers;

use App\DataTables\JabatanFungsionalDataTable;
use App\Models\Master\Agama;
use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimulasiController extends Controller
{

    protected $modules = ["simulasi"];
    protected $actions = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agama = Agama::all();
        return view('pages.simulasi.index');
    }

    public function jabatanFungsional(JabatanFungsionalDataTable $dataTable)
    {
        return $dataTable->render('pages.simulasi.jabatan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function databaseTransactionLama() {
        $user = new User();
        $user->name = 'Rizal';
        $user->email = 'rizal@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $register = new Register();
        $register->user_id = $user->id;
        $register->nama = $user->name;
        $register->email = $user->email;
        $register->save();
    }

    public function databaseTransaction() {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = 'Rizal';
            $user->email = 'rizal@gmail.com';
            $user->password = bcrypt('password');
            $user->save();

            $register = new Register();
            $register->user_id = $user->id;
            $register->nama = $user->name;
            $register->email = $user->email;
            $register->nomor_hp = '1245677';
            $register->alamat = 'Malang';
            $register->is_active = '1';
            $register->save();
            DB::commit();
            echo 'Data berhasil disimpan';
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            echo $th->getMessage();
        }
    }
}
