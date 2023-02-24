<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Anime;
use App\Models\Review_Comment;
use App\Models\Post;

class review extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
    public function review_comments()
    {
        return $this->hasMany(Review_Comment::class);
    }
    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
