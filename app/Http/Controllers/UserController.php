<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->load('adresse');
        return view('users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required|max:40',
            'prenom' => 'required|max:40',
            'email' => 'required|max:255',
        ]);

        // on modifie les infos de l'utilisateur
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');

        // on sauvegarde les changements en bdd
        $user->save();

        // on redirige sur la page précédente avec un messade de succès
        return back()->with('message', 'Le compte a bien été modifié');
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'new_password' => 'min:8|required|string|confirmed',
            'password' => ['required',
            Password::min(8)
                ->mixedCase() // au moins 1 minuscule et 1 majuscule
                ->letters() // au moins une lettre
                ->numbers() // au moins un chiffre
                ->symbols()] // au moins un caractère spécial
        ]);

        if (!Hash::check($request['password'], $user->password)) {
            return redirect()->route('users.edit', ['user' => $user])->with('message', 'Le mot de passe actuel ne correspond pas');
        } else {
            if ($request->input('new_password') == $request['password']) {
                return redirect()->route('users.edit', ['user' => $user])->with('message', 'Merci de choisir un nouveau mot de passe');
            } else {
                $user->password = Hash::make($request['new_password']);
                $user->save();
                return redirect()->route('users.edit', ['user' => $user])->with('message', 'Le mot de passe a bien été modifié');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('message', 'Utilisateur supprimé');
    }
}
