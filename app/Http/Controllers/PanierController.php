<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use Illuminate\Support\Arr;

class PanierController extends Controller
{
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        
        // if ($user) {
        //     $user->load('adresses');
        // }

        return view('panier.show', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Article $article, Request $request)
    {

        $panier = session()->get('panier');
        $quantite = $request->input('quantite');
        $initiales = $request->input('initiales');
        $flocage = $request->input('flocage');
        $numero = $request->input('numero');

        $detail_article = [
            'id' => $article->id,
            'nom' => $article->nom,
            'description' => $article->description,
            'image' => $article->image,
            'prix' => $article->prix,
            'quantite' => $quantite,
            'initiales' => $initiales,
            'flocage' => $flocage,
            'numero' => $numero,
        ];

        array_push($panier, $detail_article);

        session()->put('panier', $panier);

        return redirect()->route('panier')->with('message', 'Le produit a été ajouté/modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Suppression d'un produit du panier
    public function remove($key)
    {
    // Suppression du produit du panier par son identifiant
    $panier = session()->get("panier"); // On récupère le panier en session
    unset($panier[$key]); // On supprime le produit du tableau $panier
    session()->put("panier", $panier); // On enregistre le panier

    // Redirection vers le panier
    return back()->withMessage("Produit retiré du panier");
}
}
