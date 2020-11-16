<?php $title = "Article"?>
<?php ob_start();?>

       
<div class="container">
        <div class="row">
            <div class="col-md-8">

                <a href="/articles" class="btn btn-light mt-4">Revenir en arrière</a>

                <!-- Gestion des messages de confirmation ou d'erreur pour la suppression d'un article -->
                <?php
                if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success mt-4" role="alert">
                        <?php foreach($_SESSION['success'] as $message): ?>
                            <?= $message ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php
                if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger mt-4" role="alert">
                        <?php foreach($_SESSION['error'] as $message): ?>
                            <?= $message ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <h1 class="my-4"><?= htmlentities($post->title)?></br>
                </h1>

                <!-- Boucle pour récupérer les informations de tout les articles -->
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-text"><?=htmlentities($post->body)?></p></p>                  
                        <a href="/articles/edit?id=<?=$post->id?>" class="btn btn-warning"><img class="icon_post" src="/img/edit.svg"></a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$post->id?>"><img class="icon_post" src="/img/delete.svg"></a>   
                    </div>
                    
                    <div class="card-footer text-muted">
                        Publié <?= $post->created_at?> by  <span>Boostrap</span>
                    </div>
                </div>

                <!-- Modal Bootstrap -->
                <div class="modal fade" id="exampleModal<?=$post->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Suppression de <?= $post->title?></h5>
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
