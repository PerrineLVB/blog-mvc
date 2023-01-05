<?php
session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';

$categories = CategoryManager::getAllCategories();

if (isset($_SESSION['user'])) {
    if (isset($_POST) && !empty($_POST)) {
        $title = $_POST['title'];

        $uploads_dir = 'images';
        $temp_location = $_FILES['picture']['tmp_name'];
        $random_string = uniqid();
        $picName = $random_string . '-' . $_FILES['picture']['name'];
        move_uploaded_file($temp_location, "$uploads_dir/$picName");

        $content = $_POST['content'];
        $userId = $_SESSION['user']['id'];
        $newPostId = PostManager::addPost($title, $content, $picName, $userId);
        if ($_POST['newCategory'] != null) {
            $newCategory = $_POST['newCategory'];
            $lastCategory = CategoryManager::addCategory($newCategory);
            PostManager::addPostCategories($newPostId, $lastCategory);
        }
            // ajout des catégories sélectionnées
            $postCategories = $_POST['categories'];
        /*$_POST['categories'] nous donne un tableau des catégories sélectionnées
        il suffit donc de boucler sur ce tableau et pour chaque ligne insérer
        dans la table de liaison l'id de l'article ($newPost) et l'id de la catégorie*/
        foreach ($postCategories as $postCategory) {
            PostManager::addPostCategories($newPostId, $postCategory);
        }
        header('location:index.php');
    }

    require_once 'views/addpostView.php';
} else {
    echo 'Vous devez être connecté(e) pour pouvoir ajouter un article.';
}
