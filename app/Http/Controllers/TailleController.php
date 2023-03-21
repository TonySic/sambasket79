<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taille;

class TailleController extends Controller
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
            'taille' => 'required | min:3 | max:40',
        ]);

        Taille::create([
            'taille' => $request->input('taille'),
        ]);

        return redirect()->route('admin.index')->with('message', 'Taille ajoutée');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Taille $taille)
    {
        {
            $Tailles = Taille::get();
            return view('tailles.edit', ['taille' => $taille,]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taille $taille)
    {
        $request->validate([
            'taille' => 'required',
        ]);

        $taille->update([
            'taille' => $request->input('taille'),
        ]);

        return redirect()->route('admin.index')->with('message', 'Modification la taille effectuée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taille = Taille::find($id);
        $taille->delete();
        return redirect()->route('admin.index')->with('message', 'Taille supprimée');
    }
}

