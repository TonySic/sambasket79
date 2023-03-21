<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'date_commande',
        'prix',
        'user_id',
        'traite',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'commandes_articles')->withPivot(['quantite', 'taille', 'numero', 'flocage', 'initiales', 'prix']);
    }
}
