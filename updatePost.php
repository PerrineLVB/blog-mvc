<?php
session_start();
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/PostManager.php';
require_once 'model/managers/UserManager.php';

$categories = CategoryManager::getAllCategories();
$id = $_GET['id'];
$post = PostManager::getPostById($id);
$post_categories = CategoryManager::getCategoriesByPostId($id);

if (isset($_SESSION['user'])) {
    if (isset($_get['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $author = UserManager::getUserInfosByPostId($id);
        // on vérifie que l'utilisateur en cours est bien l'auteur de l'article
        if ($author->getIdUser() !== $_SESSION['user']['id']) {
            header("location:index.php?status=danger&message=Vous n'avez pas l'autorisation de faire cette action");
            die;
        }
        $post = PostManager::getPostById($id);
        $post_categories = CategoryManager::getCategoriesByPostId($id);
    }
    //si on a des données en POST
    if (isset($_POST) && !empty($_POST)) {
        $title = $_POST['title'];
        // pour l'image qui ne sera pas envoyée si elle n'est pas modifiée
        //si on reçoit une nouvelle image, on s'en occupe
        if (isset($_FILES['picture']['name']) && !empty($_FILES['picture']['name'])) {
            $uploads_dir = 'images';
            $temp_location = $_FILES['picture']['tmp_name'];
            $random_string = uniqid();
            $picture = $random_string . '-' . $_FILES['picture']['name'];
            move_uploaded_file($temp_location, "$uploads_dir/$picture");
        } else {
            //sinon on va redonner à $picture la valeur qu'elle a déjà en bdd
            $picture = $post->getPicture();
        }
        $content = $_POST['content'];
        $userId = $_SESSION['user']['id'];
        // faire appel à une fonction update pour les infos de l'article
        PostManager::updatePost($id, $title, $content, $picture, $userId);
        // suprrimer les catégories déjà en bdd pour l'article
        CategoryManager::deleteCategoriesByPostId($id);
        // enregistrer les nouvelles
        $postCategories = $_POST['categories'];
        foreach ($postCategories as $postCategory) {
            PostManager::addPostCategories($id, $postCategory);
        }
        header("location:readPost.php?id=$id");
    } else {
        echo 'Vous devez être connecté(e) pour pouvoir modifier un article.';
    }
}

require_once 'views/updatePostView.php';
