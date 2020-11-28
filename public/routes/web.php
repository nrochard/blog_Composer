<?php

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
    $route->get('/', 'blogIndex');
    $route->get('/articles', 'postIndex');
    $route->get('/articles/show', 'postShow');
    $route->get('/articles/create', 'postCreate');
    $route->get('/articles/generate', 'postGenerate');
    $route->get('/articles/edit', 'postEdit');

    $route->post('/articles', 'postStore');

    $route->put('/articles/edit', 'postUpdate');

    $route->delete('/articles/delete', 'postDestroy');
});
