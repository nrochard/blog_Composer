<?php $title = "Formulaire"?>

<?php ob_start();?>

<div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="my-4">Formulaire</h1></h1> 

                <!-- Gestion d'erreur si aucun article en DB -->
                <?php
                if(isset($_SESSION['messages'])): ?>
                    <div class="alert alert-danger mt-4" role="alert">
                        <?php foreach($_SESSION['messages'] as $message): ?>
                            <?= $message ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
           
                <form  method="post" enctype="multipart/form-data" action="<?= isset($post) ? '/articles/edit/'. $post->id : '/articles' ?>">
                    <?php if(isset($post)) : ?>
                        <input name="_method" type="hidden" value="PUT"/>
                    <?php endif;?>
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['title'] : '' ?><?= isset($post) ? $post->title : ''?>">
                        <small id="name" class="form-text text-muted">Champs obligatoire.</small>
                    </div>
                    <div class="form-group">
                        <label for="body">Contenu :</label></label>
                        <textarea class="form-control" id="body" name="body" rows="5"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['body'] : '' ?><?= isset($post) ? $post->body : ''?></textarea>
                        <small id="name" class="form-text text-muted">Champs obligatoire.</small>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary btn-lg mb-4">Enregistrer</button>
                    </div>
                </form>
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
                    Cette création de blog a pour objectif de nous initier à l'utilisation de Composer et du modèle MVC.
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();?>

<?php require __DIR__."/../layouts/nav.php"?>
<?php require __DIR__."/../layouts/footer.php"?>
<?php require __DIR__."/../layouts/default.php"?>