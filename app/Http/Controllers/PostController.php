<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Anime;
use App\Models\Character;
use App\Models\Song;
use App\Models\Review_Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts'=> $post->getPaginateByLimit()]);
    }
    
    public function post(PostRequest $request, Post $post , Anime $anime , Character $character , Song $song)
    {
        $post->user_id = auth::id();
        
        
        $input = $request['anime'];
        $anime->fill($input)->save();
        
        $input = $request['character'];
        $input += array("anime_id"=>$anime->id);
        $character->fill($input)->save();
        
        $input = $request['song'];
        $input += array("anime_id"=>$anime->id);
        $song->fill($input)->save();
        
        $input = $request['post'];
        $input += array("anime_id"=>$anime->id);
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
        return view('posts/review')->with(['post'=> $post]);
    }
    
    public function delete_review(Review_Comment $review_comment)
    {
        $post_id=$review_comment->post_id;
        $review_comment->delete();
        return redirect('/posts/' . $post_id);
    }
    
    public function create()
    {
        return view('posts/create');
    }
}
