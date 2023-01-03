<?php
//le rôle du manager étant d'interagir avec la bdd, c'est ici que l'on va récupérer le fichier qui contient la fonction correspondante
require_once './model/DBConnect.php';
//nous allons transcrire les données récupérées sous la forme d'objets de la classe User, nous devons donc inclure le fichier correspondant  
require_once './model/classes/User.php';

class UserManager
{
    //on va ensuite définir différentes méthodes très ciblées 
    public static function getAllUsers()
    { //pour récupérer tous les articles
        $dbh = dbconnect(); //on récupère notre objet PDO
        $query = ("SELECT * FROM t_user"); //on écrit notre requête SQL
        $stmt = $dbh->prepare($query); //on prépare la requête
        $stmt->execute(); //on l'execute 
        $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User'); //on transcris les résultats en objets de la class User 
        return $users; //puis on renvoie les résultats
    }

    public static function getUserById($id)
    {
        $dbh = dbconnect();
        $query = ("SELECT * FROM t_user WHERE id_user = :id");
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }

    public static function getUserInfos($id)
    {
        $dbh = dbconnect();
        $query = ("SELECT * FROM t_user WHERE id_user = :id");
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }

    public static function getUserInfosByPostId($id)
    {
        $dbh = dbconnect();
        $query = ("SELECT * FROM t_post JOIN t_user ON t_post.id_user = t_user.id_user WHERE t_post.id_post = :id");
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $userInfos = $stmt->fetch();
        return $userInfos;
    }

    public static function addUser($pseudo, $email, $hashed_password)
    {
        $dbh = dbconnect();
        $query = "INSERT INTO t_user (pseudo, email, password) VALUES (:pseudo, :email, :hashed_password)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':hashed_password', $hashed_password, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function getUserByEmail($email)
    {
        $dbh = dbconnect();
        $query = ("SELECT * FROM t_user WHERE email = :email");
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }

    public static function connectUser($user)
    {
        session_start();
        $_SESSION['user'] = $user;
    }
}
