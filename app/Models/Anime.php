<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Character;
use App\Models\Song;
use App\Models\Post;

class anime extends Model
{
    use HasFactory;
    
    
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
