<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\Character;
use App\Models\Song;

class anime extends Model
{
    use HasFactory;
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
