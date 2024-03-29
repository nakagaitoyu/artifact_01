<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\Search_AnimeRequest;
use App\Http\Requests\Search_UserRequest;

class SearchController extends Controller
{
    public function search_anime(Anime $anime)
    {
        $status = 0;
        return view('search/index_anime')->with(['status'=>$status]);
    }
    
    public function result_anime(Search_AnimeRequest $request)
    {
    
      $search = $request->input('keyword_anime');
      
          $keyword = $request["keyword_anime"];
          $convert = $keyword["name"];
          $searched = Anime::where('name' ,'like', "%$convert%")->get();
          $status = 1;
          return view ('search/index_anime')->with(['animes'=>$searched,'status'=>$status]);
    }
    
    public function category_anime(Anime $anime)
    {
        return view('search/category_anime')->with(['posts'=>$anime->getByAnime(),'anime'=>$anime]);
    }
    
    
    // ユーザー検索 
    public function search_user(User $user)
    {
        $status = 0;
        return view('search/index_user')->with(['status'=>$status]);
    }
    
    public function result_user(Search_UserRequest $request)
    {
    $keyword = $request["keyword_user"];
    $convert = $keyword["name"];
    $searched = User::where('name','like', "%$convert%")->get();
    $status = 1;
    return view('search/index_user')->with(['user'=>$searched,'status'=>$status]);
    }
    
    
    
    public function category_user(User $user)
    {
        return view('search/category_user')->with(['posts'=>$user->getByUser(),'user'=>$user]);
    }
    
}

