<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review_Comment;

class Review_CommentController extends Controller
{
    public function review_comment(Review_Comment $review_comment)
    {
        return view('posts/review')->with(['review_comment'=> $review_comment]);
    }
}
