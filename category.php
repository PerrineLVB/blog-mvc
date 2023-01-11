<?php
session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/UserManager.php';
$categories = CategoryManager::getAllCategories();

// reçoit l'id de la catégorie pour afficher les bonnes infos
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $categoryInfos = CategoryManager::getCategoryInfos($id);
    $categoryPosts = PostManager::getPostsByCategoryId($id);
}

require_once 'views/categoryView.php';
