@extends('layouts.app')

@section('title', 'Liste des articles')

@section('content')
    <h2 class="mb-4"><u class="h3">Ajouter un article :</u></h2>

    <form action="{{ url('/articles/formulaire') }}" method="POST">
        @csrf

        <label for="a_nom">{{ $article->getLabel('a_nom') }}</label>
        <input type="text" class="form-control @error('a_nom') is-invalid @enderror" name="a_nom" value="{{ old('a_nom') }}">
        @if ($errors->has('a_nom'))
        <div class="error">
            {{ $errors->first('a_nom') }}
        </div>
        @endif
        </br>

        <label for="a_description">{{ $article->getLabel('a_description') }}</label>
        <textarea rows="5" cols="33" class="form-control @error('a_description') is-invalid @enderror" name="a_description">{{ old('a_description') }}</textarea>
        @if ($errors->has('a_description'))
        <div class="error">
            {{ $errors->first('a_description') }}
        </div>
        @endif
        </br>

        <label for="a_prix">{{ $article->getLabel('a_prix') }}</label>
        <input type="number" step="0.01" class="form-control @error('a_prix') is-invalid @enderror" name="a_prix" value="{{ old('a_prix') }}">
        @if ($errors->has('a_prix'))
        <div class="error">
            {{ $errors->first('a_prix') }}
        </div>
        @endif
        </br>

        <label for="a_quantite">{{ $article->getLabel('a_quantite') }}</label>
        <input type="number" class="form-control @error('a_quantite') is-invalid @enderror" name="a_quantite" value="{{ old('a_quantite') }}">
        @if ($errors->has('a_quantite'))
        <div class="error">
            {{ $errors->first('a_quantite') }}
        </div>
        @endif
        </br>

        <label for="a_image">{{ $article->getLabel('a_image') }}</label>
        <input type="file" class="form-control @error('a_image') is-invalid @enderror" name="a_image" value="{{ old('a_image') }}">
        @if ($errors->has('a_image'))
        <div class="error">
            {{ $errors->first('a_image') }}
        </div>
        @endif

        <br/>
        <button name="btnAddArticle" type="submit" class="btn btn-primary">Ajouter</button>
        &nbsp;
        <button name="btnAnnuler" type="submit" class="btn btn-secondary">Annuler</button>
    </form>
@endsection

