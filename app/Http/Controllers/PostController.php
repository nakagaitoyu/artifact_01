<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Review_Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts'=> $post->getPaginateByLimit()]);
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
    
    public function delete(Review_Comment $review_comment)
    {
        $post_id=$review_comment->post_id;
        $review_comment->delete();
        return redirect('/posts/' . $post_id);
    }
}
