<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use Request;
use Carbon\Carbon;

require_once "LibraryDomController.php";

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest('pubDate')->take(10)->get();
        return view('pages.news', compact('news'));
    }

    public function show($id)
    {
        $showOneNews = News::find($id);
        if(is_null($showOneNews)){
            abort(404);
        }
        
        $category_id = $showOneNews->id_category;
        $categories = Category::find($category_id);;
        $category_name = $categories->name;
        
        return view('pages.show', compact('showOneNews'),["category_name"=>$category_name]);
    }

    public function create()
    {
        $categories=Category::all();

        foreach($categories as $category){
            $categories_array[$category->id] = $category->name;
        }

        return view('pages.create',["categories_array"=>$categories_array]);
    }

    public function store()
    {
        $input=Request::all();
        $input['pubDate']=Carbon::now();

        News::create($input);


        $inputXML = Request::all();
        $news = new LibraryDomController("RSS.xml");

        $title = $inputXML["title"];
        $description = $inputXML["description"];
        $pubDate = $inputXML['pubDate']=Carbon::now();
        $link = $inputXML["link"];
        $id_category = $inputXML["id_category"];

        $news->addNews($title, $description, $pubDate, $link, $id_category);

        return redirect('news/');
    }
}
