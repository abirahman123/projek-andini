<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\Dokumen\StoreDokumenRequest;
use App\Models\Cms\Dokumen;
use ResponseFormatter;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PDF;

class DownloadDokumenController extends Controller
{
    
    public function index(): View
    {
        $posts = Dokumen::all();

        return view('pages.landing.unduh', compact('posts'));
    }

    public function download($id)
    {
        $document = Dokumen::find($id);
        return $document->download();
    }

}
