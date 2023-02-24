<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anime;
use App\Models\Character;
use App\Models\Song;



class Post extends Model
{
    use HasFactory;
    
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
    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
