<?php
//le rôle du manager étant d'interagir avec la bdd, c'est ici que l'on va récupérer le fichier qui contient la fonction correspondante
require_once './model/DBconnect.php';
//nous allons transcrire les données récupérées sous la forme d'objets de la classe Post, nous devons donc inclure le fichier correspondant  
require_once './model/classes/Post.php';

class PostManager
{
    //on va ensuite définir différentes méthodes très ciblées 
    public static function getAllPosts()
    { //pour récupérer tous les articles
        $dbh = dbconnect(); //on récupère notre objet PDO
        $query = ("SELECT * FROM t_post"); //on écrit notre requête SQL
        $stmt = $dbh->prepare($query); //on prépare la requête
        $stmt->execute(); //on l'execute 
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post'); //on transcris les résultats en objets de la class Post 
        return $posts; //puis on renvoie les résultats
    }

    public static function getPostById($id)
    {
        $dbh = dbconnect();
        $query = ("SELECT * FROM t_post WHERE id_post = :id");
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $post = $stmt->fetch();
        return $post;
    }

    public static function getPostsByCategoryId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT * FROM t_post JOIN t_post_category ON t_post_category.id_post = t_post.id_post WHERE t_post_category.id_category = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function getPostsByUserId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT * FROM t_post WHERE id_user = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function addPost($title, $content, $picture, $userId)
    {
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $query = "INSERT INTO t_post (title, date, content, picture, id_user) VALUES (:title, '$date', :content, :picture, :id_user)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':id_user', $userId);
        $stmt->execute();
        return $dbh->lastInsertId();
    }

    public static function addPostCategories($id_post, $id_category)
    {
        $dbh = dbconnect();
        $query = "INSERT INTO t_post_category (id_post, id_category) VALUES (:post, :category)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':post', $id_post);
        $stmt->bindParam(':category', $id_category);
        $stmt->execute();
    }

    public static function updatePost($id, $title, $content, $picture, $userId)
    {
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $query = "UPDATE t_post SET title = :title, date = :date, content = :content, picture = :picture, id_user = :user_id WHERE t_post.id_post = :id_post";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':id_post', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
    }

    public static function deletePost($id)
    {
        $dbh = dbconnect();
        $query = "DELETE FROM t_post WHERE id_post = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
