<?php
session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';

$categories = CategoryManager::getAllCategories();

if (isset($_SESSION['user'])) {
    if (isset($_POST) && !empty($_POST)) {
        $title = $_POST['title'];
        $picture = $_POST['picture'];
        $content = $_POST['content'];
        $userId = $_SESSION['user']['id'];
        $newPostId = PostManager::addPost($title, $content, $picture, $userId);
        //ajout des catégories sélectionnées
        $postCategories = $_POST['categories'];
        /*$_POST['categories'] nous donne un tableau des catégories sélectionnées
        il suffit donc de boucler sur ce tableau et pour chaque ligne insérer
        dans la table de liaison l'id de l'article ($newPost) et l'id de la catégorie*/
        foreach ($postCategories as $postCategory) {
            PostManager::addPostCategories($newPostId, $postCategory);
        }
    }

    //upload de fichier

    /*$uploads_dir = '/uploads';
    $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
    // basename() may prevent filesystem traversal attacks;
    // further validation/sanitation of the filename may be appropriate
    $name = basename($_FILES["pictures"]["name"][$key]);
    move_uploaded_file($tmp_name, "$uploads_dir/$name");*/
    require_once 'views/addpostView.php';
} else {
    echo 'Vous ne passerez pas !!!';
}
