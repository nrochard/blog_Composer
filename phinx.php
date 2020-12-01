<?php

require __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => $_ENV['DB_CONNECTION'],
            'host' => $_ENV['DB_LOCALHOST'],
            'name' => 'production_db',
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => $_ENV['DB_PORT'],
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' =>  $_ENV['DB_CONNECTION'],
            'host' => $_ENV['DB_LOCALHOST'],
            'name' => 'blog',
            'user' => $_ENV['DB_USER'],
            'pass' =>  $_ENV['DB_PASSWORD'],
            'port' => $_ENV['DB_PORT'],
            'charset' => 'utf8',
            'unix_socket' => $_ENV['DB_SOCKET']
        ],
        'testing' => [
            'adapter' =>  $_ENV['DB_CONNECTION'],
            'host' => $_ENV['DB_LOCALHOST'],
            'name' => 'testing_db',
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => $_ENV['DB_PORT'],
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
