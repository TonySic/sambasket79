@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <h1 class="text-center m-4">La boutique du sam basket 79 !</h1>
            @foreach ($articles as $article)
                <div class="border-danger card col-md-5 col-lg-3 p-3 m-3 shadow" style="width: 18rem;">
                    <a href="{{ route('articles.show', $article) }}">
                        <img class="d-block mx-auto card-img-top" img src="{{ asset("images/$article->image") }}"
                            alt="{{ $article->nom }}">
                        <div class="mx-auto card-body">
                            <h5 class="card-title text-center">{{ $article->nom }}</h5>
                            <p class="card-text fw-italic text-center"><em>{{ $article->description }}</em></p>
                            <h4 style="color:#A81F24" class="card-text fw-bold text-center">{{ $article->prix }} €</h4>
                            <button type="submit" class="d-flex mx-auto mt-3 btn boutonRouge">Détails</button>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
