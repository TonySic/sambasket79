<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function politique()
    {
        return view('politique');
    }

    public function boutique()
    {
        $articles = Article::all();
        return view('boutique', ['articles' => $articles]);
    }
}
