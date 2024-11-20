<?php

namespace App\Http\Controllers\Assesor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\AsesorProfile;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;

class ProfileAsesorController extends Controller
{
    /**
     * Display the authenticated user's profile.
     */
    public function index()
    {
        $asesorProfile = Auth::user()->asesor;

        return view('pages.asesor.profile.index', compact('asesorProfile'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $asesorProfile = AsesorProfile::findOrFail($id);
            $namaKecamatan = $asesorProfile->kecamatan->nama ?? '-';
            $namaKelurahan = $asesorProfile->kelurahan->nama ?? '-';

            return view('profile.show', compact('asesorProfile', 'namaKecamatan', 'namaKelurahan'));
        } catch (\Exception $e) {
            return redirect()->route('error.404');
        }
    }
}
