@extends('layouts.app')

@section('title', 'Liste des articles')

@section('content')
    <!-- flash message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="<?= url("/articles/formulaire") ?>" class="btn btn-primary">Ajouter un article</a>

   <div class="row row-cols-2 row-cols-md-4 my-5">
    <?php
    foreach ($articles as $article) {
        ?>
        <div id="<?= $article->a_id ?>" class="col mb-4">
            <div class="card h-100 vignette">
                <div class="position-relative p-1">
                    <button type="button" class="btn-close" aria-label="Close" onclick="js:confirmDeleteArticle({{ $article->a_id }});"><span >&times;</span></button>
                </div>

                <!-- embed-responsive embed-responsive-4by3 et embed-responsive-item pour définir la taille de l'image et mettre en responsive design -->
                <div class="embed-responsive embed-responsive-4by3">
                    <img src="{{ asset('img/' . $article->a_image) }}" alt="image article" class="card-img-top img-thumbnail img-fluid embed-responsive-item"/>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $article->a_nom }}</h5>
                    <span class="card-prix ">@money($article->a_prix)</span>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script type="text/javascript">
    function confirmDeleteArticle(id) {
        toDelete = window.confirm("Confirmez-vous la suppression de l'article ?");

        if (toDelete) {
            //direction : réduit horizontalement, verticalement ou les 2
            //origin : influe sur le mouvement de la réduction
            //percent : pourcentage de réduction de l'élément avant disparition
            //500 : vitesse de l'animation
            $("#" + id).hide("scale", {direction: 'both', origin : ["middle", "center"], percent : 60}, 500);
            deleteArticle(id);
        }
    }

    function deleteArticle(id) {
        $.ajax({
            url: '<?= url("articles/supprimer") ?>',//fonction PHP appelée
            data: {"id": id, "_token": "{{ csrf_token() }}"},//données envoyées
            type: 'POST',//type d'envoi
            dataType: 'json'//type des données récupérées
        });
    }
</script>
@endsection

