<?php

use Carbon\Carbon;


function getAllPosts()
{

    $db = dbConnect();

    $statement = $db->query('SELECT id, title, DATE_FORMAT(created_at, "%d/%m/%Y") as created_at_fr FROM posts ORDER BY id DESC');
    $posts = $statement->fetchAll(PDO::FETCH_OBJ);

    return($posts);
}

function getPostById($id)
{

    $db = dbConnect();
    $statement = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $statement->execute(['id' => $_GET['id']]);
    $post = $statement->fetchObject();

    if ($post)
        $post->created_at = Carbon::parse($post->created_at, 'Europe/Paris')->locale('fr_FR')->diffForHumans();

    return($post);
}

function deleteArticle($id)
{
    $db = dbConnect();

    $query = $db->prepare('DELETE FROM posts WHERE id = ?');
    $result = $query->execute([$id]);

    print_r($result);
    die();

    return $result;
}

function storeArticle($data)
{

    $db = dbConnect();

    $query = $db->prepare("INSERT INTO posts (title, body) VALUES(:title, :body)");
    $result = $query->execute([
        'title' => $data['title'],
        'body' => $data['body'],
    ]);

    return $result;
}

function updateArticle($id, $data)
{

    $db = dbConnect();

    date_default_timezone_set('Europe/Paris');
    $date = date('y-m-d h:i:s');

    $query = $db->prepare('UPDATE posts SET title = ?, body = ?, updated_at = ? WHERE id = ?');

    $result = $query->execute(
        [
            $data['title'],
            $data['body'],
            $date,
            $id,
        ]
    );

    return($result);
}

?>

