@extends('layouts/app')

@section('content')
    <div class="row">
        <h1 class="text-center mb-4">Compte client</h1>
    </div>

    {{-- INFORMATIONS ENREGISTRÉES USER --}}
    <div class="row border text-center rounded px-5 py-3 mb-5">

        {{-- INFORMATIONS PERSONNELLES --}}
        <div class="row text-center mx-auto px-5 pb-4 fs-4">

            <div class="row fs-4">
                <h3 class="mb-3">INFORMATIONS PERSONNELLES</h3>
            </div>

            <div class="row p-2 text-bg-light rounded">
                <div class="col-md-4 d-flex justify-content-center">
                    <p class="pe-4 m-1" style="color: #bea207">NOM</p>
                    <p class="m-1">{{ $user->nom }}</p>
                </div>

                <div class="col-md-4 d-flex justify-content-center">
                    <p class="pe-4 m-1" style="color: #bea207">PRÉNOM</p>
                    <p class="m-1">{{ $user->prenom }}</p>
                </div>

                <div class="col-md-4 d-flex justify-content-center">
                    <p class="pe-4 m-1" style="color: #bea207">EMAIL</p>
                    <p class="m-1">{{ $user->email }}</p>
                </div>
            </div>

        </div>
        <div class="row border-top text-center mx-auto px-5 pb-4 fs-4">

            <div class="col-12 fs-4">
                <h3 class="my-4">ADRESSES ENREGISTRÉES</h3>
            </div>

            @foreach ($user->adresses as $adresse)
                <div class="col-12 col-lg-5 mx-auto text-start border text-bg-light rounded">
                    <div class="row p-4">
                        <h5 class="text-center py-2 fw-bold border-bottom">ADRESSE N°{{ $loop->iteration }}</h5>
                        <div class="col-4" style="color: #bea207">
                            <p>RUE</p>
                            <p>CODE POSTAL</p>
                            <p>COMMUNE</p>
                        </div>

                        <div class="col-8">
                            <p>{{ $adresse->rue }}</p>
                            <p>{{ $adresse->code_postal }}</p>
                            <p>{{ $adresse->commune }}</p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>