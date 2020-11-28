<?php

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
    $route->get('/', 'blogIndex');
    $route->get('/articles', 'postIndex');
    $route->get('/articles/show/{id:[0-9]+}', 'postShow');
    $route->get('/articles/create', 'postCreate');
    $route->get('/articles/generate', 'postGenerate');
    $route->get('/articles/edit/{id:[0-9]+}', 'postEdit');

    $route->post('/articles', 'postStore');

    $route->put('/articles/edit/{id:[0-9]+}', 'postUpdate');

    $route->delete('/articles/delete/{id:[0-9]+}', 'postDestroy');
});
