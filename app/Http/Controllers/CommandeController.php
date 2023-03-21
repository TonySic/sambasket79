<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Commande;

class CommandeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('validation_commande')) {
        abort(403);
        }

        $user = Auth::user();
        $commande = new Commande();
        $commande->numero = rand(1000000, 9999999);
        $commande->prix = floatval($request->input('total'));
        $commande->user_id = $user->id;
        $commande->date_commande = date('Y-m-d');
        $commande->save();
        

        $panier = session('panier');

        foreach ($panier as $article) {

            $commande->articles()->attach($article['id'], [
                'quantite' => $article['quantite'],
                'initiales' => $article['initiales'],
                'flocage' => $article['flocage'],
                'numero' => $article['numero'],
                'taille' => $article['taille'],
                'prix' => $article['prix'],
            ]);
            $articleInDatabase = Article::find($article['id']);
            $articleInDatabase->save();
        }
        session()->forget("panier");

        return redirect()->route('boutique')->with('message', 'La commande est bien validée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        $commande->load('articles');
        return view('users/commande', ['commande' => $commande]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        $commande->traite = $request->traite;
        $commande->save();
        return redirect()->route('admin.index')->with('message', 'Traitement modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
