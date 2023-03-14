@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="fw-bold card-header">{{ __('Bienvenue !') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Vous êtes connecté à la boutique du SAM Basket 79 !') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        
        <div class="row">
            <h1 class="text-center m-4">La boutique officielle !</h1>
            @foreach ($articles as $article)
                <div class="border-danger card col-md-5 col-lg-3 p-3 m-3 table-hover" style="width: 18rem;">
                    <a href="{{ route('articles.show', $article) }}">
                        <img class="d-block mx-auto card-img-top" img src="{{ asset("images/$article->image") }}" alt="{{ $article->nom }}">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $article->nom }}</h5>
                            <p class="card-text fw-italic text-center"><em>{{ $article->description }}</em></p>
                            <h4 style="color:#A81F24" class="card-text fw-bold text-center">{{ $article->prix }} €</h4>
                            {{-- <form action="product.php" method="post">
                    <input type="hidden" name="idArticle" value="" . $article['id'] . "">
                    <input class="btn btn-secondary text-center mx-auto" type="submit" value="Détails produit">
                </form>
                <form action="panier.php" method="post">
                    <input type="hidden" name="chosenArticle" value="" . $article['id'] . "">
                    <input class="btn btn-dark mt-2 mx-auto" type="submit" value="Ajouter au panier">
                </form> --}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
