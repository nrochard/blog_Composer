<?php

// Override des méthodes grâce à la value envoyé dans $_POST
if (!empty($_POST['_method'])) {
    $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
}

// Router classique
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($uri == "/") {
        blogIndex();
    } 
    elseif($uri == "/articles"){
        postIndex();
    }
    elseif ($uri == "/articles/show" and isset($_GET['id'])) {
        postShow();
    }
    elseif ($uri == "/articles/create") {
        postCreate();
    }
    elseif ($uri == "/articles/generate") {
        postGenerate();
    }
    elseif ($uri == "/articles/edit" and isset($_GET['id'])) {
        postEdit();
    } 
    else {
        http_response_code(404);
        require __DIR__ . "/../views/layouts/400.html";
        return;
    }
} 
else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($uri == "/articles") {
        postStore();
    } 
}

else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if ($uri == "/articles/edit" and isset($_GET['id'])) {
        return postUpdate();
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($uri == "/articles/delete" and isset($_GET['id'])) {
        return postDestroy();
    }
}

else {
    http_response_code(405);
    require __DIR__ . "/../views/layouts/400.html";
    return;
}