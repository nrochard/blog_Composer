<?php $title = "Tout les articles"?>
<?php ob_start();?>

       
<div class="container">
        <div class="row">
            <div class="col-md-8">

                <!-- Gestion des messages de confirmation ou d'erreur pour la suppression d'un article -->
                <?php
                if(isset($_SESSION['messages'])): ?>
                    <div class="alert alert-primary mt-4" role="alert">
                        <?php foreach($_SESSION['messages'] as $message): ?>
                            <?= $message ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <h1 class="my-4">Découvrez tout nos articles</br>
                <small>Nombre d'articles : <?=count($posts) ?></small>
                </h1>

                 <!-- Gestion d'erreur si aucun article en DB -->
                 <?php if (count($posts) == 0): ?>
                <div class="alert alert-primary" role="alert">
                    Aucun article n'est en ligne en ce moment
                </div>
                <?php endif;?>
                
                <!-- Boucle pour récupérer les informations de tout les articles -->
                <?php foreach($posts as $post):?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><?= htmlentities($post->title)?></h2>
                        <a href="/articles/show?id=<?=$post->id?>" class="btn btn-primary">Lire l'article</a>
                        <a href="/articles/edit?id=<?=$post->id?>" class="btn btn-warning"><img class="icon_post" src="img/edit.svg"></a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$post->id?>"><img class="icon_post" src="img/delete.svg"></a>                        
                    </div>
                    <div class="card-footer text-muted">
                        Posté le <?= $post->created_at_fr?> by  <span>Boostrap</span>
                    </div>
                </div>

                <!-- Modal Bootstrap -->
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


