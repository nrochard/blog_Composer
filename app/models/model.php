<?php

//Librairie Config
use Noodlehaus\Config;

function dbConnect()
{
    $config =  new Config("../config/database.php");

    try{
        $db = new PDO("{$config->get('database')['connection']}:host={$config->get('database')['host']};dbname={$config->get('database')['name']}", $config->get('database')['user'], $config->get('database')['password']);
    }
    catch (Exception $exception) //$e contiendra les éventuels messages d’erreur
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }

    return $db;
}


?>
