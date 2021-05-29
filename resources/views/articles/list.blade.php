@extends('layouts.app')

@section('title', 'Liste des articles')

@section('content')
    <a href="<?= url("/articles/formulaire") ?>" class="btn btn-primary">Ajouter un article</a>

   <div class="row row-cols-2 row-cols-md-4 my-5">
    <?php
    foreach ($articles as $article) {
        ?>
        <div id="<?= $article->a_id ?>" class="col mb-4">
            <div class="card h-100 vignette">
                <!-- embed-responsive embed-responsive-4by3 et embed-responsive-item pour définir la taille de l'image et mettre en responsive design -->
                <div class="embed-responsive embed-responsive-4by3">
                    <img src="{{ asset('img/' . $article->a_image) }}" alt="image article" class="card-img-top img-thumbnail img-fluid embed-responsive-item"/>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $article->a_nom }}</h5>
                    <span class="card-prix">{{ $article->a_prix }}</span>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
@endsection

