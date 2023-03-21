@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <p class="alert alert-success">{{ session()->get('message') }}</p>
    @endif

    <div class="container">
        <div class="row">
            <h3>Je modifie un article</h3>
            <div class="col-12">
                <form method="post" action="{{ route('articles.update', $article) }}"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <label class="fw-bold control-label">Nom :</label>
                    <input class="form-control" name="nom" value="{{ $article->nom }}" required>

                    <label class="mt-2 fw-bold control-label">Description :</label> 
                    <textarea class="form-control" name="description" required>{{ $article->description }}</textarea>

                    <label class="mt-2 fw-bold form-label">Image :</label>
                    <img class="m-2" src="{{ asset('images/' . $article['image']) }}" style="width:150px; height:auto;">
                    <input class="form-control" type="file" name="image">

                    <label class="mt-2 fw-bold control-label">Prix :</label>
                    <input class="form-control" name="prix" value="{{ $article->prix }}" required>
                    <button type="submit" class="text-end btn boutonRouge mt-3">Valider la modification</button>
                </form>
            </div>
        </div>
    </div>
@endsection
