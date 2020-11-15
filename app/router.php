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
    elseif ($uri == "/articles/edit" and isset($_GET['id'])) {
        postEdit();
    } 
    else {
        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
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
    echo "<html><body>Method not allowed</body></html>";
    return;
}