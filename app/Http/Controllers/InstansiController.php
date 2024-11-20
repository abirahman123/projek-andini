<?php

namespace App\Http\Controllers;

use App\Http\Requests\Master\Instansi\StoreInstansi;
use Illuminate\Http\Request;
use App\Models\Master\Instansi;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use ResponseFormatter;

class InstansiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $instansi = Instansi::first();
        $logo = $instansi?->getLogoAsArray();
        return view('pages.admin.data_master.instansi', [
            'data_instansi' => $instansi,
            'logo' => $logo
        ]);
    }

    public function store(StoreInstansi $request) : JsonResponse {
        try {
            $data = $request->validated();
            $instansi = Instansi::first();

            // check if telepon starts with 0
            if (substr($data['telepon'], 0, 1) == '0') {
                $data['telepon'] = '62' . substr($data['telepon'], 1);
            }
            Instansi::updateOrCreate(['id' => $instansi?->id], $request->validated());
        } catch (\Exception $e) {
            return ResponseFormatter::error("Tidak dapat menyimpan data instansi", [
                'message' => $e->getMessage()
            ],code: 500);
        }

        return ResponseFormatter::success("Data instansi berhasil disimpan");
    }
}
