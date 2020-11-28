<?php

//Librairie Respect/Validation
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

// Affichage de la page d'accueil et de 3 articles
function blogIndex()
{    
    $posts = getAllPosts();
    view('posts/index.php', compact('posts'));
}

// Affichage de tout les articles
function postIndex()
{
    $posts = getAllPosts();
    view('posts/posts.php', compact('posts'));
}

// Affichage d'un article
function postShow($id)
{
    if (empty($id)) {
        http_response_code(400);
        require __DIR__ . "/../../views/layouts/400.html";
        return;
    }

    $post = getPostById($id);

    if (!$post) {
        http_response_code(404);
        require __DIR__ . "/../../views/layouts/400.html";
        return;
    }

    require __DIR__ . "/../../views/posts/show.php";
}

// Suppression d'un article
function postDestroy($id)
{
    if (empty($id)) {
        http_response_code(400);
        require __DIR__ . "/../../views/layouts/400.html";
        return;
    }

    $deletedArticle =  deleteArticle($id); 
    

    if (!$deletedArticle) {
        http_response_code(404);
        require __DIR__ . "/../../views/layouts/400.html";
        return;
    }

    if($deletedArticle){
        $_SESSION['success'][] = 'Article supprimé !';
    }
    else{
        $_SESSION['error'][] = 'Erreur lors de la suppression. ';
    }

    header('Location:/articles');
    exit;
}

// Affichage du formulaire de création d'un article
function postCreate()
{
    require __DIR__ . "/../../views/posts/form.php";
}

// Création d'un article
function postStore()
{
    if(empty($_POST['title']) || empty($_POST['body'])){
        if(empty($_POST['title'])){
            $_SESSION['messages'][] = 'Le champ titre est obligatoire !';
        }
        else if(empty($_POST['created_at'])){
            $_SESSION['messages'][] = 'Le champ contenu est obligatoire !';
        }
        $_SESSION['old_inputs'] = $_POST;
        header('Location:/articles/create');
        exit;
    }
    else{
        $resultAdd = storeArticle($_POST);
        if($resultAdd){
            $_SESSION['success'][] = 'Article enregistré !';
        }
        else{
            $_SESSION['error'][] = 'Erreur lors de l\'enregistrement.';
        }


        header('Location:/articles');
        exit;
    }
}

// Affichage du formulaire de modification d'un article
function postEdit($id)
{
    if (empty($id)) {
        http_response_code(400);
        require __DIR__ . "/../../views/layouts/400.html";
        return;
    }

    $post = getPostById($id);

    if (!$post) {
        http_response_code(404);
        require __DIR__ . "/../../views/layouts/400.html";
        return;
    }

    view('posts/form.php', compact('post'));
}

// Modication d'un article
function postUpdate($id)
{
    if(empty($_POST['title']) || empty($_POST['body'])){
        if(empty($_POST['title'])){
             $_SESSION['messages'][] = 'Le champ titre est obligatoire !';
        }
        else if(empty($_POST['body'])){
            $_SESSION['messages'][] = 'Le champ contenu est obligatoire !';
        }
        $_SESSION['old_inputs'] = $_POST;
        header('Location:/articles/edit?id='.$id);
        exit;
        }
    else{
        $result = updateArticle($id, $_POST);
        if($result){
            $_SESSION['success'][] = 'Article mis à jour!';
        }
        else{
            $_SESSION['error'][] = 'Erreur lors de la mise à jour.';
        }
       header('Location:/articles/show/'.$id);
       exit;
    }
}

// Ajouter d'un article généré aléatoirement
function postGenerate(){
    $faker = Faker\Factory::create();

    $title = $faker->text($maxNbChars = 255);
    $body = $faker->paragraph($nbSentences = 15, $variableNbSentences = true);

    $result = postGeneratedArticle($title, $body);

    if($result){
        $_SESSION['success'][] = 'Un article a été généré aléatoirement  !';
        header('Location:/articles');
        exit;
    }
    else{
        $_SESSION['error'][] = 'Un problème est survenu lors de la création de l\'article !';
        header('Location:/articles');
        exit;
    }

}