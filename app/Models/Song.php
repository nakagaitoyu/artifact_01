<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anime;
use App\Models\Post;

class song extends Model
{
    use HasFactory;
    
    public function anime()
    {
      return $this->belongsTo(Anime::class);  
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
