    <?php $title = "Page d'accueil"?>

    <?php ob_start();?>
        
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="my-4">Découvrez nos 3 derniers articles </br>
                </h1> 

                <!-- Gestion d'erreur si aucun article en DB -->
                <?php if (count($posts) == 0): ?>
                <div class="alert alert-primary" role="alert">
                    Aucun article n'est en ligne en ce moment
                </div>
                <?php endif;?>
                
                <!-- Boucle pour récupérer les informations des articles avec un compteur pour seuleument en afficher 3 -->
                <?php $i = 0;
                foreach($posts as $post):?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><?= htmlentities($post->title)?></h2>
                        <a href="/articles/show?id=<?=$post->id?>" class="btn btn-primary">Lire l'article</a>                     
                    </div>
                    <div class="card-footer text-muted">
                        Posté le <?= $post->created_at_fr?> by <span>Boostrap</span>
                    </div>
                </div>

                <!-- Modal Boostrap -->
                <div class="modal fade" id="exampleModal<?=$post->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Suppression de <?= htmlentities($post->title)?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Confirmez vous la supression de cette article ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-success"><a class="delete_article" href="/articles/delete?id=<?=$post->id?>">Confimer</a></button>
                            </div>
                        </div>
                     </div>
                </div>
                <?php 
                $i++;
                if ($i == 3)
                    break;
                endforeach;?>
            </div>

            <div class="col-md-4">
                <div class="card my-4">
                <h5 class="card-header">Recherche</h5>
                <div class="card-body">
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Non fonctionnel ...">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="button">Rechercher !</button>
                    </span>
                    </div>
                </div>
            </div>

            <div class="card my-4">
                <h5 class="card-header">Catégories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <p class="category">Web Design</p>
                                </li>
                                <li>
                                    <p class="category">HTML</p>
                                </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                <li>
                                    <p class="category">JavaScript</p>
                                </li>
                                <li>
                                    <p class="category">CSS</p>
                                </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card my-4">
                <h5 class="card-header">À propos</h5>
                <div class="card-body">
                Cette création de blog à pour objectif de nous initier à l'utilisation de Composer et du modèle MVC.
                </div>
            </div>
            </div>
        </div>
    </div>

    <?php $content = ob_get_clean();?>

    <?php require __DIR__."/../layouts/nav.php"?>
    <?php require __DIR__."/../layouts/footer.php"?>
    <?php require __DIR__."/../layouts/default.php"?>