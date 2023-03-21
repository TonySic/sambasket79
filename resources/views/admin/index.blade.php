@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">commandes</h1>
        <div class="row">
            <table class="table table-hover table-light">
                <thead>
                    <tr>
                        <th style="color:#A81F24" scope="col">Numéro de commande</th>
                        <th style="color:#A81F24" scope="col">Date</th>
                        <th style="color:#A81F24" scope="col">Montant</th>
                        <th style="color:#A81F24" scope="col">Détails</th>
                        <th style="color:#A81F24" scope="col">Commande passée par :</th>
                        <th style="color:#A81F24" scope="col">Traitée</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                        <tr class="border-bottom border-secondary">

                            <td>{{ $commande->numero }}</td>
                            <td>{{ date('d-m-Y', strtotime($commande->created_at)) }}</td>
                            <td><strong>{{ number_format($commande->prix, 2, ',') }} €</strong></td>
                            <td><a href="{{ route('commande.show', $commande) }}">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Détails') }}
                                    </button></a></td>
                            <td>{{ $commande->user->nom . ' ' . $commande->user->prenom }} </td>
                            <td><form method="POST" action="{{ route('commande.update', $commande) }}">
                                @method('put') @csrf
                                <label>Oui</label>
                                <input @if($commande->traite==1) checked @endif type="radio" name="traite" value="1" required>
                                <label>Non</label>
                                <input @if($commande->traite==0) checked @endif type="radio" name="traite" value="0" required>
                                <button type="submit" class="btn boutonRouge">Valider</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>




    <div class="container">
        <h1 class="text-center">articles</h1>
        <div class="row">
            <table class="table table-hover table-light">
                <thead class="text-uppercase border-top border-secondary">
                    <tr>
                        <th style="color:#A81F24" scope="col">NOM</th>
                        <th style="color:#A81F24" scope="col">DESCRIPTION</th>
                        <th style="color:#A81F24" scope="col">IMAGE</th>
                        <th style="color:#A81F24" scope="col">PRIX</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($articles as $article)
                    <tbody>
                        <tr class="border-bottom border-secondary">
                            <td class=fw-bold><small>{{ $article['nom'] }} </small></td>
                            <td><small>{{ substr($article['description'], 0, 100) }}</td>
                            <td><img src="./images/{{ $article['image'] }}" style="width:50px;height:auto;"></td>
                            <td><small>{{ $article['prix'] }} €</td>
                            <td>
                                <form method="post" action="{{ route('articles.edit', $article->id) }}">
                                    @method('get')
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $article['id'] }}">
                                    <button class="btn btn-info btn-sm">Modifier</button>
                                </form>
                            </td>

                            <td>
                                <form method="post" action="{{ route('articles.destroy', $article) }}">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $article['id'] }}">
                                    <button class="btn-sm btn boutonRouge">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

        <div class="container">
            <div class="col-md-12">
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="">
                                <h3>creation d'un article</h3>
                                <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Nom du nouvel article --}}
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="fw-bold form-label">NOM</label>
                                            <input class="form-control" name="nom" required>
                                        </div>

                                        {{-- Description du nouvel article --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="fw-bold form-label">DESCRIPTION</label>
                                            <textarea class="form-control" name="description" required></textarea>
                                        </div>

                                        {{-- Image du nouvel article --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="fw-bold form-label">IMAGE</label>
                                            <input class="form-control" type="file" name="image" required>
                                        </div>

                                        {{-- Prix du nouvel article --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="fw-bold form-label">PRIX</label>
                                            <input class="form-control" type="number" name="prix" required>
                                        </div>

                                        {{-- Article disponible --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <p class="fw-bold">DISPONIBLE : </p>
                                            <label>Oui</label>
                                            <input type="radio" name="disponible" value="1" required>

                                            <label>Non</label>
                                            <input type="radio" name="disponible" value="0" required>
                                        </div>

                                        {{-- Initiales --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <p class="fw-bold">INITIALES : </p>
                                            <label>Oui</label>
                                            <input type="radio" name="initiales" value="1" required>

                                            <label>Non</label>
                                            <input type="radio" name="initiales" value="0" required>
                                        </div>

                                        {{-- Flocage --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <p class="fw-bold">FLOCAGE : </p>
                                            <label>Oui</label>
                                            <input type="radio" name="flocage" value="1" required>

                                            <label>Non</label>
                                            <input type="radio" name="flocage" value="0" required>
                                        </div>

                                        {{-- Numéro --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <p class="fw-bold">NUMERO : </p>
                                            <label>Oui</label>
                                            <input type="radio" name="numero" value="1" required>

                                            <label>Non</label>
                                            <input type="radio" name="numero" value="0" required>
                                        </div>

                                        {{-- Bouton de création du nouvel article --}}
                                        <div class="row">
                                            <div class="col mx-auto text-center">
                                                <button class="btn boutonRouge mt-2 mb-2">Créer le nouvel
                                                    article</button>
                                            </div>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <h1 class="mt-3 text-center">tailles</h1>
        <div class="row table-responsive">
            <table class="table table-hover table-light">
                <thead class="text-uppercase border-bottom border-secondary">
                    <tr>
                        <th style="color:#A81F24" scope="col">TAILLE</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($tailles as $taille)
                    <tbody>
                        <tr class="border-bottom border-secondary">
                            <td class=fw-bold><small>{{ $taille['taille'] }} </small></td>
                            <td>
                                <form method="post" action="{{ route('tailles.edit', $taille) }}">
                                    @method('get')
                                    @csrf
                                    <input type="hidden" name="taille_id" value="{{ $taille['id'] }}">
                                    <button class="btn btn-info btn-sm">Modifier</button>
                                </form>
                            </td>

                            <td>
                                <form method="post" action="{{ route('tailles.destroy', $taille) }}">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="taille_id" value="{{ $taille['id'] }}">
                                    <button class="btn-sm btn boutonRouge">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <h1 class="text-center">utilisateurs</h1>
        <div class="row">
            <table class="table table-hover table-light">
                <thead class="text-uppercase border-bottom border-secondary">
                    <tr>
                        <th style="color:#A81F24" scope="col">NOM</th>
                        <th style="color:#A81F24" scope="col">PRENOM</th>
                        <th style="color:#A81F24" scope="col">E-MAIL</th>
                        <th style="color:#A81F24" scope="col">ROLE</th>
                        <th style="color:#A81F24" scope="col">SUPPRIMER</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <tr class="border-bottom border-secondary">
                            <td><small>{{ $user['nom'] }} </small></td>
                            <td><small>{{ $user['prenom'] }} </small></td>
                            <td><small>{{ $user['email'] }}</small></td>
                            <td><small>{{ $user->role->role }}</small></td>
                            <td>
                                <form method="post" action="{{ route('users.destroy', $user) }}">
                                    @method('delete')
                                    @csrf
                                    <button class="btn-sm btn boutonRouge">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
