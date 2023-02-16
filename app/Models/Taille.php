<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    use HasFactory;

    public function tailles_articles()
    {
        return $this->hasMany(TailleArticle::class);
    }
}
