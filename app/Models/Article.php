<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function tailles()
    {
        return $this->belongsToMany(Taille::class, 'tailles_articles');
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commandes_articles')->withPivot('quantite');
    }
}
