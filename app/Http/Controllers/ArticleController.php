<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
            'nom' => 'required | min:3 | max:40',
            'description' => 'required | min:3 | max:255',
            'prix' => 'required | min:1 | max:10',
            'disponible' => 'required',
            'initiales' => 'required',
            'flocage' => 'required',
            'numero' => 'required',
        ]);

        Article::create([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'image' => isset($request['image']) ? uploadImage($request['image']) : "image.jpg",
            'prix' => $request->input('prix'),
            'disponible' => $request->input('disponible'),
            'initiales' => $request->input('initiales'),
            'flocage' => $request->input('flocage'),
            'numero' => $request->input('numero'),
        ]);

        return redirect()->route('admin.index')->with('message', 'Produit ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles/details', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', ['article' => $article,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nom' => 'required | min:3 | max:40',
            'description' => 'required | min:3 | max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required | min:1 | max:10',
        ]);

        $article->update([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'image' => isset($request['image']) ? uploadImage($request['image']) : null,
            'prix' => $request->input('prix'),
        ]);

        return redirect()->route('admin.index')->with('message', 'Modifications effectuées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('admin.index')->with('message', 'Article supprimé');
    }
}
