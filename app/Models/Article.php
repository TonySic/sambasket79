<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'image',
        'prix',
        'disponible',
        'initiales',
        'flocage',
        'numero',
    ];

    protected $with = ['tailles'];

    public function tailles()
    {
        return $this->belongsToMany(Taille::class, 'tailles_articles');
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commandes_articles')->withPivot(['quantite', 'taille', 'numero', 'flocage', 'initiales', 'prix']);
    }
}
