<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
      
      $keyword = $request["keyword"];
      $searched = Anime::where('name' ,'like', '%'.$keyword.'%')->get();
      
      
      return view('search/index')->with(['animes'=>$searched]);
      
    }
    
    public function index(Anime $anime)
    {
    
        return view('search/index');
    }
    
    public function category(Anime $anime)
    {
        return view('search/category')->with(['posts'=>$anime->getByAnime()]);
    }
}

