<?php

function dbConnect()
{

    try{
        $db = new PDO("{$_ENV['DB_CONNECTION']}:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    }
    catch (Exception $exception) //$e contiendra les éventuels messages d’erreur
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }

    return $db;
}


?>
