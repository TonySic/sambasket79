@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session()->has('panier'))
            <h1>Mon panier</h1>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Initialisation du total général à 0 -->
                        @php $total = 0 @endphp

                        <!-- On parcourt les produits du panier en session : session('panier') -->
                        @foreach (session('panier') as $key => $item)
                            <!-- On incrémente le total général par le total de chaque produit du panier -->
                            @php $total += $item['prix'] * $item['quantite'] @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong><a
                                            href="{{ route('articles.show', $key) }}"title="Afficher le produit">{{ $item['nom'] }}</a></strong>

                                    <p class="mb-0"><small>Taille : {{ $item['taille'] }}</small></p>
                                    @if ($item['initiales'] !== null)
                                        <p class="mb-0"><small>Initiales : {{ $item['initiales'] }}</small></p>
                                    @else
                                        <p class="mb-0"><small>Pas d'initiales choisies</small></p>
                                    @endif

                                    @if ($item['flocage'] !== null)
                                        <p class="mb-0"><small>Flocage : {{ $item['flocage'] }}</small></p>
                                    @else
                                        <p class="mb-0"><small>Pas de flocage choisi</small></p>
                                    @endif

                                    @if ($item['numero'] !== null)
                                        <p class="mb-0"><small>Numéro : {{ $item['numero'] }}</small></p>
                                    @else
                                        <p class="mb-0"><small>Pas de numéro choisi</small></p>
                                    @endif

                                </td>
                                <td>{{ $item['prix'] }} €</td>
                                <td>
                                    <!-- Le formulaire de mise à jour de la quantité -->
                                    <form method="POST" action="{{ route('panier.modifQuantite', $key) }}"> @csrf
                                        <input type="number" name="quantite" placeholder="Quantité ?"
                                            value="{{ $item['quantite'] }}" class="form-control" style="width: 80px">
                                        <input type="submit" class="btn btn-primary btn-sm" value="Actualiser" />
                                    </form>
                                </td>
                                <td>
                                    <!-- Le total du produit = prix * quantité -->
                                    {{ $item['prix'] * $item['quantite'] }} €
                                </td>
                                <td>
                                    <!-- Le Lien pour retirer un produit du panier -->
                                    <a href="{{ route('panier.remove', $key) }}" class="btn boutonRouge btn-sm"
                                        title="Retirer le produit du panier">Retirer</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr colspan="2">
                            <td colspan="4">Total de la commande</td>
                            <td colspan="2">
                                <!-- On affiche total général -->
                                <strong id="total-produit">{{ $total }} €<strong>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>



            <!-- Lien pour vider le panier -->
            <div class="row">
                <div class="col-md-6">
                    <a class="btn boutonRouge" href="{{ route('panier.empty') }}"
                        title="Retirer tous les produits du panier">Vider le panier</a>
                    <a type="button" class="btn btn-secondary" href="{{ route('boutique') }}"
                        title="Retour a la boutique">Retour à la boutique</a>
                </div>
                <div class="col-md-6">
                    <form class="text-end" method="post" action="{{ route('commande.store') }}">
                        @csrf
                        <input type="hidden" value="{{ $total }}" name="total">
                        <button type="submit" class="btn boutonRouge">Valider la commande</button>
                    </form>
                </div>
            </div>


    </div>
@else
    <div class="alert alert-info">Aucun produit au panier</div>
    @endif

    </div>
@endsection
