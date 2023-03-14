<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;

class AdresseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'adresse' => 'string|required|min:5|max:191',
            'code_postal' => 'min:5|max:5',
            'ville' => 'string|required|min:5|max:191'
        ]);

        Adresse::create([
            'adresse' => $request->adresse,
            'code_postal' => $request->code_postal,
            'ville' => $request->ville,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('users.edit', Auth::user())->with('message', 'Adresse ajoutée');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adresse $adress)
    {
        $request->validate([
            'adresse' => 'string|required|min:5|max:191',
            'code_postal' => 'min:5|max:5',
            'ville' => 'string|required|min:5|max:191'
        ]);

        // $adresse->update([
        //     'adresse' => $request->input('adresse'),
        //     'code_postal' => $request->input('code_postal'),
        //     'ville' => $request->input('ville')
        // ]);
        $adress->update($request->all());

        return view('users.edit', ['user' => Auth::user()])->with('message', 'Adresse modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adresse $adress)
    {
        $adress->delete();
        return redirect()->route('users.edit', Auth::user())->with('message', 'Adresse supprimée avec succès !');
    }
}
