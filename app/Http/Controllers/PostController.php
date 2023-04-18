<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Anime;
use App\Models\Character;
use App\Models\Song;
use App\Models\Review_Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $animes = Anime::all();
        // アニメ一つ一つに対するいいね数のカウント
        foreach($animes as $anime)
        {
            $sum1 = 0;
            foreach($anime->posts as $post)
            {
                $sum1 += $post->likes->count();
            }
            $anime->count_serch = $sum1;
        }
        // アニメのいいね数の多い順に降順に表記
        $animes_counts = $animes->sortByDesc('count_serch')->take(10);
        
        
        // $review_comments = Review_Comment::all();
        
        // foreach($review_comments as $review_comment)
        // {
        //     $sum2 = 0;
        //     foreach($review_comment->post as $post)
        //     {
        //         $sum2 += $post->review_comments->count();
        //     }
        //     $review_comment->count_serch = $sum2;
        // }
        // dd($review_comment);

        // 投稿一つ一つに対するコメントのカウント
        
        
        return view('posts/index')->with(['posts'=> $post->getPaginateByLimit() ,'animes_counts'=> $animes_counts]);
    }
    
    public function post(CommentRequest $request, Post $post , Anime $anime , Character $character , Song $song)
    {
        
        $post->user_id = auth::id();
        
        if( $request['anime']['name'] != "other"){
            $anime_id = (int)$request['anime']['name'];
        }else{
            $input = $request['new_anime'];
            $anime->fill($input)->save();
            $anime_id = $anime->id;
        }
        
        $input = $request['character'];
        $input += array("anime_id"=>$anime_id);
        $character->fill($input)->save();
        
        $input = $request['song'];
        $input += array("anime_id"=>$anime_id);
        $song->fill($input)->save();
       
        $input = $request['post'];
        $input += array("anime_id"=>$anime_id);
        $input += array("character_id"=>$character->id);
        $input += array("song_id"=>$song->id);
        $post->fill($input)->save();
        
        
        
        return redirect('/');
    }
    
    public function delete_post(Post $post , Anime $anime , Character $character , Song $song)
    {
        $anime_id=$post->anime_id;
        $character=$post->character_id;
        $song=$post->song_id;
        
        $post->delete();
        return redirect('/');
    }
    
    public function store($post_id, PostRequest $request, Review_Comment $review_comment)
    {
        $review_comment->user_id = auth::id();
        $review_comment->post_id = $post_id;
        $input = $request['review_comment'];
        $review_comment->fill($input)->save();
        return redirect('/posts/' . $post_id );
    }   
       
    public function review(Post $post)
    {
        // $like=Like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        $request=request();
        $ip = $request->ip();
        $like=Like::where('post_id',$post->id)->where('ip',$ip)->first();
        return view('posts/review')->with(['post'=> $post ,'like'=> $like]);
    }
    
    public function delete_review(Review_Comment $review_comment)
    {
        $post_id=$review_comment->post_id;
        $review_comment->delete();
        return redirect('/posts/' . $post_id);
    }
    
    public function create(Anime $anime)
    {
        return view('posts/create')->with(['animes'=>$anime->get()]);
    }
}
