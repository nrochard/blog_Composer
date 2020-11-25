<?php

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
    elseif ($uri == "/articles/delete" and isset($_GET['id'])) {
        postDestroy();
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
    elseif ($uri == "/articles/edit" and isset($_GET['id'])){
        postUpdate();
    }
}
else {
    http_response_code(405);
    require __DIR__ . "/../views/layouts/400.html";
    return;
}