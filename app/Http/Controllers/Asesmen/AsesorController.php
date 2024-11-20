<?php

namespace App\Http\Controllers\Asesmen;

use ResponseFormatter;
use App\Models\User;
use App\Models\Asesmen\Asesor;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Http\Controllers\Controller;
use App\DataTables\Asesmen\AsesorDataTable;
use App\Http\Requests\Asesmen\StoreAsesorRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AsesorController extends Controller
{
    protected $modules = ["asesmen"];

    public function index(AsesorDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.asesmen.asesor.index');
    }

    public function create()
    {
        return view('pages.admin.asesmen.asesor.create');
    }

    public function store(StoreAsesorRequest $request)
    {
        $validatedData = $request->validated();
        DB::beginTransaction();
        try {
            $assesor = User::create([
                'name' => $validatedData['nama'],
                'email' => $validatedData['email'],
                'password' => Hash::make('12345'),
            ]);

            $assesor->assignRole('asesor');

            $assesor->remember_token = Str::random(10);
            $assesor->email_verified_at = now();
            $assesor->save();

            $validatedData['user_id'] = $assesor->id;

            if (substr($validatedData['nomor_hp'], 0, 1) == '0') {
                $validatedData['nomor_hp'] = '62' . substr($validatedData['nomor_hp'], 1);
            }

            Asesor::create($validatedData);
            DB::commit();
            return ResponseFormatter::created("Berhasil Menambahkan Asesor");
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error("Gagal menambahkan asesor, server error", [
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Asesor $asesor)
    {
        $asesor->loadMissing(['kecamatan', 'kelurahan']);
        return view('pages.admin.asesmen.asesor.edit', compact('asesor'));
    }

    public function update(StoreAsesorRequest $request, Asesor $asesor)
    {
        $validatedData = $request->validated();
        DB::beginTransaction();
        try {

            if ($asesor->email != $validatedData['email']) {
                $user = User::where('email', $asesor->email)->first();
                $user->update(['email' => $validatedData['email']]);
            }

            if ($asesor->user->name != $validatedData['nama']) {
                $asesor->user->update(['name' => $validatedData['nama']]);
            }

            if (substr($validatedData['nomor_hp'], 0, 1) == '0') {
                $validatedData['nomor_hp'] = '62' . substr($validatedData['nomor_hp'], 1);
            }

            $asesor->update($validatedData);
            DB::commit();
            return ResponseFormatter::created("Berhasil Mengubah Asesor");
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error("Gagal mengubah asesor, server error", 500);
        }
    }

    public function destroy(Asesor $asesor)
    {
        $user_id = $asesor->user_id;
        DB::beginTransaction();
        try {
            $asesor->deleteOrFail();
            $user = User::find($user_id);
            if ($user) {
                $user->delete();
            }
            DB::commit();
            return ResponseFormatter::created('Berhasil Menghapus Asesor');
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error("Gagal menghapus asesor, server error",500);
        }
    }
}
