<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('pages.news', compact('news'));
    }

    public function show($id)
    {
        $showOneNews = News::find($id);
        if(is_null($showOneNews)){
            abort(404);
        }
        
        return view('pages.show', compact('showOneNews'));
    }
}
