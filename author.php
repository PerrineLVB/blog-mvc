<?php
session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/UserManager.php';
require_once 'model/managers/CategoryManager.php';
$posts = UserManager::getAllUsers();
$categories = CategoryManager::getAllCategories();

// reçoit l'id de la catégorie pour afficher les bonnes infos
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $userInfos = UserManager::getUserInfos($id);
    $userPosts = PostManager::getPostsByUserId($id);
}

require_once 'views/authorView.php';
