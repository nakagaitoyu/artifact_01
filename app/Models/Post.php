<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anime;
use App\Models\Character;
use App\Models\Song;
use App\Models\Review_Comment;
use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
     protected $fillable = ['review','anime_id','song_id','character_id'];
    
    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
    
    public function character()
    {
        return $this->belongsTo(Character::class);
    }
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function review_comments()
    {
        return $this->hasMany(Review_Comment::class);
    }
    public function getPaginateByLimit(int $limit_count = 1)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }   
}
