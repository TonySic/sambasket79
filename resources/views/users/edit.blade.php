@extends('layouts/app')

@section('content')
    <h1 class="text-center mb-4" style="color:black">Mon compte client</h1>
    <div class="container">
        <div class="row  py-3">
            <div class="col-md-6 text-center">
                <h3 class="mb-3" style="color:black">MES INFORMATIONS</h3>
                <form action="{{ route('users.update', Auth::user()) }}" method="POST"> @csrf @method('put')
                    <div class="form-group m-1">
                        <label for="nom" class="fw-bold" style="color:#A81F24">Nom</label>
                        <input name="nom" type="text" class="form-control text-center bg-secondary-emphasis"
                            id="nom" style="color:black" value="{{ $user->nom }}">
                    </div>
                    <div class="form-group m-1">
                        <label for="nom" class="fw-bold" style="color:#A81F24">Prénom</label>
                        <input name="prenom" type="text" class="form-control text-center bg-secondary-emphasis"
                            id="prenom" style="color:black" value="{{ $user->prenom }}">
                    </div>
                    <div class="form-group m-1">
                        <label for="nom" class="fw-bold" style="color:#A81F24">E-mail</label>
                        <input name="email" type="email" class="form-control text-center bg-secondary-emphasis"
                            id="email" style="color:black" value="{{ $user->email }}">
                    </div>
                    <div><button type="submit" class="m-2 btn boutonRouge">Je modifie mes informations</button></div>
                </form>
            </div>
            <div class="col-md-6 text-center">
                <h3 class="text-center mb-3" style="color:black">MON MOT DE PASSE</h3>
                <form action="{{ route('updatePassword', Auth::user()) }}" method="POST"> @csrf @method('put')
                    <div class="form-group m-1">
                        <label for="password" class="fw-bold" style="color:#A81F24">Mot de passe actuel</label>
                        <input name="password" type="password"
                            class="form-control text-center fw-bold bg-secondary-emphasis" id="mdp_actuel"
                            style="color:black">
                    </div>
                    <div class="form-group m-1">
                        <label for="new_password" class="fw-bold" style="color:#A81F24">Nouveau de mot de passe</label>
                        <input name="new_password" type="password"
                            class="form-control text-center fw-bold bg-secondary-emphasis" id="prenom"
                            style="color:black">
                    </div>
                    <div class="form-group m-1">
                        <label for="new_password" class="fw-bold" style="color:#A81F24">Confirmer le nouveau mot de
                            passe</label>
                        <input name="new_password_confirmation" type="password"
                            class="form-control text-center fw-bold bg-secondary-emphasis" id="email"
                            style="color:black">
                    </div>
                    <div><button type="submit" class="m-2 btn boutonRouge">Je modifie mon mot de passe</button></div>
                </form>
            </div>
        </div>
    </div>
    @if ($user->adresse)
        <div class="row py-3 mb-5">
            <div class="col-md-4 text-center offset-md-4">
                <div class="row fs-4">
                    <h3 class="mb-3" style="color:black">MON ADRESSE DE LIVRAISON</h3>
                </div>
                <form action="{{ route('adresses.update', $user->adresse) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group m-1">
                        <label for="adresse" class="fw-bold" style="color:#A81F24">Rue</label>
                        <input name="adresse" type="text" class="form-control text-center bg-secondary-emphasis"
                            id="adresse" style="color:black" value="{{ $user->adresse->adresse }}">
                    </div>
                    <div class="form-group m-1">
                        <label for="code_postal" class="fw-bold" style="color:#A81F24">Code postal</label>
                        <input name="code_postal" type="text" class="form-control text-center bg-secondary-emphasis"
                            id="code_postal" style="color:black" value="{{ $user->adresse->code_postal }}">
                    </div>
                    <div class="form-group m-1">
                        <label for="ville" class="fw-bold" style="color:#A81F24">Ville</label>
                        <input name="ville" type="text" class="form-control text-center bg-secondary-emphasis"
                            id="ville" style="color:black" value="{{ $user->adresse->ville }}">
                    </div>
                    <div><button type="submit" class="m-1 btn boutonRouge">Je modifie mon adresse</button></div>
                </form>
                <form action="{{ route('adresses.destroy', $user->adresse) }}" method="POST">
                    @method('delete')
                    @csrf <button type="submit" class="m-1 btn btn-dark">Je supprime mon adresse</button>
                </form>
            </div>

        </div>
        </div>
    @else
        <div class="row py-3 mb-5">
            <div class="col-md-4 text-center offset-md-4">
                <div class="row fs-4">
                    <h3 class="mb-3" style="color:black">CREATION D'UNE ADRESSE</h3>
                </div>
                <form action="{{ route('adresses.store') }}" method="POST">
                    @csrf
                    <div class="form-group m-1">
                        <label for="adresse" class="fw-bold" style="color:#A81F24">Rue</label>
                        <input name="adresse" type="text" class="form-control text-center bg-secondary-emphasis"
                            id="rue" style="color:black" placeholder="Indiquez votre adresse...">
                    </div>
                    <div class="form-group m-1">
                        <label for="code_postal" class="fw-bold" style="color:#A81F24">Code postal</label>
                        <input name="code_postal" type="text" class="form-control text-center bg-secondary-emphasis"
                            id="code_postal" style="color:black" placeholder="Indiquez votre code postal...">
                    </div>
                    <div class="form-group m-1">
                        <label for="ville" class="fw-bold" style="color:#A81F24">Ville</label>
                        <input name="ville" type="text" class="form-control text-center bg-secondary-emphasis"
                            id="ville" style="color:black" placeholder="Indiquez votre ville...">
                    </div>
                    <div><button type="submit" class="m-2 btn boutonRouge">J'enregistre mon adresse</button></div>
                </form>
            </div>
        </div>
    @endif

    <div class="row mb-2">
        <div class="col-md-4 text-center offset-md-4">
            <div class="row fs-4">
                <h3 class="mb-3" style="color:black">SUPPRESSION DU COMPTE</h3>
                <form action="{{ route('users.destroy', Auth::user()) }}" method="POST"> @method('delete') @csrf
                    <button type="submit" class="m-1 btn btn-dark">Je supprime mon compte</button>
                </form>
            </div>
        </div>
    </div>
@endsection
