@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-uppercase p-3">commande n°{{ $commande->numero }} du {{ date('d-m-Y', strtotime($commande->created_at)) }}</h3>
            </div>

            <table class="table m-3">
                <thead>
                    <tr class="border-bottom border-secondary">
                        <th style="color:#A81F24" scope="col" class="text-uppercase">Produit(s)</th>
                        <th style="color:#A81F24" scope="col" class="text-uppercase text-end">Prix unitaire</th>
                        <th style="color:#A81F24" scope="col" class="text-uppercase text-end">Quantité</th>
                        <th style="color:#A81F24" scope="col" class="text-uppercase text-end">Prix total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($commande->articles as $article)
                    
                        <tr class="border-bottom border-secondary">
                            <td>
                            <strong>{{ $article->nom }}</strong>
                            <p class="mb-0"><small>Taille : {{ $article->pivot->taille }}</small></p>
                            @if ($article->pivot->initiales !== null)
                        
                                <p class="mb-0"><small>Initiales : {{ $article->pivot->initiales }}</small></p>
                            @else
                                <p class="mb-0"><small>Pas d'initiales choisies</small></p>
                            @endif

                            @if ($article->pivot->flocage !== null)
                                <p class="mb-0"><small>Flocage : {{ $article->pivot->flocage }}</small></p>
                            @else
                                <p class="mb-0"><small>Pas de flocage choisi</small></p>
                            @endif

                            @if ($article->pivot->numero !== null)
                                <p class="mb-0"><small>Numéro : {{ $article->pivot->numero }}</small></p>
                            @else
                                <p class="mb-0"><small>Pas de numéro choisi</small></p>
                            @endif</td>
                            <td class="text-end">{{ number_format($article->pivot->prix, 2, ',', ' ') }} €</td>
                            <td class="text-end">{{ $article->pivot->quantite }}</td>
                            <td class="text-end">
                                {{ number_format($article->pivot->prix * $article->pivot->quantite, 2, ',', ' ') }} €</td>
                        </tr>
                        @php $total += $article->pivot->prix * $article->pivot->quantite @endphp
                    @endforeach
                </tbody>

            </table>
            <p class="fs-5 text-end m-0"><strong>Coût total de la commande : {{ number_format($total, 2, ',', ' ') }} €</strong></p>
            <a class="text-end" href="{{ route('users.edit', $user = Auth::user()) }}"> 
                <button type="submit" class="m-1 btn boutonRouge">Retour à mon compte client</button>
            </a>
        </div>

            </div>
        </div>
    </div>
@endsection
