@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Inscription</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" type="text"
                                        class="form-control @error('nom') is-invalid @enderror" name="nom"
                                        value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                <div class="col-md-6">
                                    <input id="prenom" type="text"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                        <div class="form-text">Nous ne partagerons jamais votre e-mail avec des tiers.</div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                        <div class="form-text">Votre mot de passe doit contenir :
                                            <ul>
                                                <li>au moins 8 caractères</li>
                                                <li>au moins une lettre</li>
                                                <li>au moins un chiffre</li>
                                                <li>au moins une majuscule et une minuscule</li>
                                                <li>au moins un caractère spécial : ! @ # $ % ^ & * ?</li>
                                            </ul>
                                        </div>


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirmer le mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="form-group text-center">
                                <div class="row">
                                    <label form="politique">J'ai lu et j'accepte les <a
                                            href="{{ route('politique') }}">mentions légales et la politique de
                                            confidentialité</a>
                                    </label>
                                </div>
                                <div class="row p-2">
                                    <input type="checkbox" name="politique" id="politique"
                                        onclick="toggleValidationButtonDisplay()">
                                </div>
                            </div>
                            <div class="row mb-0 d-flex justify-content-center">
                                    <button id="valider" type="submit" class="w-50 btn boutonRouge" style="visibility: hidden">
                                    Inscription
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function toggleValidationButtonDisplay() {
        let checkbox = document.getElementById("politique");
        let boutonValider = document.getElementById("valider");
        checkbox.checked ? boutonValider.style.visibility = "visible" : boutonValider.style.visibility = "hidden"
    }
</script>
