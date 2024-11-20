<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Cms\News;
use App\Models\Cms\KategoriBerita;


class NewsController extends Controller
{

    protected $newsNew;
    protected $kategoriNews;

    public function __construct()
    {
        $this->newsNew = News::latest()->paginate(6);
        $this->kategoriNews = KategoriBerita::inRandomOrder()->paginate(6);
    }

    public function index(): view
    {
        $news = news::inRandomOrder()
                    ->Paginate(4);
        return view('pages.guest.news', [
            'news'=> $news, 'newsNew'=> $this->newsNew, 'kategoriNews'=> $this->kategoriNews
        ]);
        
    }

    public function search(): view
    {
        $inputSearch = request()->input('search');
        $news = news::where('title', 'like', '%'.$inputSearch. '%')
                        ->orWhere('description', 'like', '%'.$inputSearch. "%")
                        ->Paginate(4);
       
        return view('pages.guest.news', [
            'news'=> $news, 'newsNew'=> $this->newsNew, 'kategoriNews'=>$this->kategoriNews
        ]);
        
    }

    public function show($id)
    {
        $detailNews = news::findOrFail($id);
        return view('pages.guest.detailNews', [
            'detailNews'=> $detailNews, 'newsNew'=>$this->newsNew, 'kategoriNews'=>$this->kategoriNews
        ]);
    }

    public function sortingKategori($id)
    {
        $idKategori = KategoriBerita::findOrFail($id);
        $news = news::where('kategori_berita_id', $idKategori->id)->paginate(7);             
        return view('pages.guest.news',[
        'idKategori'=> $idKategori, 'news'=>$news, 'kategoriNews'=>$this->kategoriNews, 'newsNew' => $this->newsNew

        ]);
        
    }
}
