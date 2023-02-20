<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anime;

class song extends Model
{
    use HasFactory;
    
    public function Anime()
    {
      return $this->belongsTo(Anime::class);  
    }
}
