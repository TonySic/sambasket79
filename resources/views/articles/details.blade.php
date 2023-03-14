@extends('layouts.app')

@section('content')
    <div class="card container border-danger">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img class="d-block mx-auto card-img-top w-50" img src="{{ asset("images/$article->image") }}"
                    alt="{{ $article->nom }}">
            </div>
            <div class="col-md-6">

                {{-- Presentation de l'article --}}
                <h3 class="mt-4 card-title text-center">{{ $article->nom }}</h3>
                <p class="card-text fw-italic text-center"><em>{{ $article->description }}</em></p>
                <h2 style="color:#A81F24" class="card-text fw-bold text-center">{{ $article->prix }} €</h2>

                <form method="POST" action="{{ route('panier.add', $article) }}"> @csrf

                    {{-- Taille --}}
                    <p style="color:dimgrey" class="text-center fw-bold mt-2">Taille :</p>
                    <select class="border-dark form-select" aria-label="Default select example">
                        <option selected>Choisir une taille...</option>
                        @foreach ($article->tailles as $taille)
                            <option value="{{ $taille->id }}">{{ $taille->taille }}</option>
                        @endforeach
                    </select>

                    {{-- Quantité --}}
                    <p style="color:dimgrey" class="text-center fw-bold mt-2">Quantité :</p>
                    <input class="border-dark form-control" type="number" name="quantite" value="1" min="1"
                        max="10">

                    {{-- Personnalisation --}}
                    <p style="color:dimgrey" class="text-center fw-bold mt-2">Personnalisation :</p>
                    @if ($article->initiales == true)
                        <input name="initiales" type="text" class="border-dark form-control"
                            placeholder="Renseignez vos initiales (2 caractères max) + 2 €">
                    @else
                        <p class="ms-2">Initiales non disponibles pour ce produit</p>
                    @endif
                    @if ($article->flocage == true)
                        <input name="flocage" type="text" class="border-dark mt-2 form-control"
                            placeholder="Renseignez votre flocage (20 caractères max) + 5 €">
                    @else
                        <p style="color:dimgray" class="ms-3 mt-2">Flocage non disponible pour ce produit</p>
                    @endif
                    @if ($article->numero == true)
                        <input name="numero" type="text" class="border-dark mt-2 form-control"
                            placeholder="Renseignez votre numéro (2 chiffres max) + 3,50 €">
                    @else
                        <p style="color:dimgray" class="ms-3 mt-2">Numéro non disponible pour ce produit</p>
                    @endif

                    <button type="submit" class="mt-3 mb-4 btn boutonRouge">Ajouter au panier</button>
                </form>
            </div>
        </div>
    </div>
@endsection
