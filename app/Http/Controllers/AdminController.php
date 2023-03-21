<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Taille;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function index(){

      $articles = Article::all();
      $users = User::with('role')->get();
      $tailles = Taille::all();
      $commandes = Commande::with('user')->get();
      return view('admin.index',['articles' => $articles, 'users'=>$users, 'tailles' => $tailles, 'commandes' => $commandes]);
   }
}