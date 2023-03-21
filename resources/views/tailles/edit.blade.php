@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <p class="alert alert-success">{{ session()->get('message') }}</p>
    @endif

    <div class="container">
        <div class="row">
            <h3>Je modifie une taille</h3>
            <div class="col-12">
                <form method="post" action="{{ route('tailles.update', $taille) }}"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <label class="fw-bold control-label">Nom :</label>
                    <input class="form-control" name="taille" value="{{ $taille->taille }}" required>
                    <button type="submit" class="text-end btn boutonRouge mt-3">Valider la modification</button>
                </form>
            </div>
        </div>
    </div>
@endsection
