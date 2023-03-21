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

        $request->validate(['taille' => 'required']);

        $panier = session()->get('panier');
        $quantite = $request->input('quantite');
        $initiales = $request->input('initiales');
        $flocage = $request->input('flocage');
        $numero = $request->input('numero');

        if ($initiales != null) {
            $article->prix += 2;
        }

        if ($flocage != null) {
            $article->prix += 5;
        }

        if ($numero != null) {
            $article->prix += 3.5;
        }

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
            'taille' => $request->taille,
        ];

        array_push($panier, $detail_article);

        session()->put('panier', $panier);

        return redirect()->route('panier')->with('message', 'Le produit a été ajouté/modifié');
    }

    public function modifQuantite($key, Request $request)
    {
        $panier = session()->get('panier');
        $request->validate([
            'quantite' => 'required|min:1|max:10',
        ]);
        $panier[$key]['quantite'] = $request->quantite;

        session()->put('panier', $panier);

        return redirect()->route('panier')->with('message', 'Quantité modifiée');
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

    public function empty()
    {
        session()->forget("panier"); // On supprime le panier en session
        return redirect()->route('panier')->with('message', 'Le panier a été vidé');
    }
}
