<?php

require __DIR__ . "/../public/routes/web.php";

// Override des méthodes grâce à la value envoyé dans $_POST
if (!empty($_POST['_method'])) {
    $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
}

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        require __DIR__ . "/../views/layouts/400.html";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        require __DIR__ . "/../views/layouts/400.html";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $args = $routeInfo[2];
        call_user_func_array($handler, $args);
        break;
}


// Router classique
// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//     if ($uri == "/") {
//         blogIndex();
//     } 
//     elseif($uri == "/articles"){
//         postIndex();
//     }
//     elseif ($uri == "/articles/show" and isset($_GET['id'])) {
//         postShow();
//     }
//     elseif ($uri == "/articles/create") {
//         postCreate();
//     }
//     elseif ($uri == "/articles/generate") {
//         postGenerate();
//     }
//     elseif ($uri == "/articles/edit" and isset($_GET['id'])) {
//         postEdit();
//     } 
//     else {
//         http_response_code(404);
//         require __DIR__ . "/../views/layouts/400.html";
//         return;
//     }
// } 
// else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if ($uri == "/articles") {
//         postStore();
//     } 
// }

// else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
//     if ($uri == "/articles/edit" and isset($_GET['id'])) {
//         return postUpdate();
//     }
// }

// else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
//     if ($uri == "/articles/delete" and isset($_GET['id'])) {
//         return postDestroy();
//     }
// }

// else {
//     http_response_code(405);
//     require __DIR__ . "/../views/layouts/400.html";
//     return;
// }