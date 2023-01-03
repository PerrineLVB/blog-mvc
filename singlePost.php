<?php

require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/UserManager.php';
session_start();

//cette page étant censée recevoir un id, on va d'abord vérifier qu'il est bien présent
if (isset($_GET['id']) && !empty($_GET['id'])) {
    //on le met dans une variable pour plus de simplicité par la suite
    $id = $_GET['id'];
    //on va chercher les informations de l'article qu'on souhaite afficher
    $post = PostManager::getPostById($id); //les infos de l'article
    $post_categories = CategoryManager::getCategoriesByPostId($id);
    $post_user = UserManager::getUserInfosByPostId($id); //les categories auxquelles il est relié
}

//toutes nos catégories pour le menu de navigation
$categories = CategoryManager::getAllCategories();

require_once 'views/singlePostView.php';
