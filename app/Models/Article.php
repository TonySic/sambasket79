<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function tailles_articles()
    {
        return $this->hasMany(TailleArticle::class);
    }

    public function commandes_articles()
    {
        return $this->hasMany(CommandeArticle::class);
    }
}
