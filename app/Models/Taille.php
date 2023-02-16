<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    use HasFactory;

    protected $fillable = [
        'taille',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'tailles_articles');
    }
}
