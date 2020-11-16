<?php

session_start();

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require __DIR__ . "/../app/router.php";

//Suppression des messages stockés
if(isset($_SESSION['messages'])){
    unset($_SESSION['messages']);
}
if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
    unset($_SESSION['success']);
}

//Suppression des informations du formulaire stockées
if(isset($_SESSION['old_inputs'])){
    unset($_SESSION['old_inputs']);
}

?>