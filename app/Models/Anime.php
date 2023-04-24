<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Character;
use App\Models\Song;
use App\Models\Post;

class Anime extends Model
{
    use HasFactory;
    
     protected $fillable = ['name', 'user_id'];
    
    
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function getByAnime(int $limit_count = 5)
    {
        return $this->posts()->with('anime')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
}
