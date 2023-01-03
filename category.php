<?php
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';
$categories = CategoryManager::getAllCategories();
session_start();

// reçoit l'id de la catégorie pour afficher les bonnes infos
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $categoryInfos = CategoryManager::getCategoryInfos($id);
    $categoryPosts = CategoryManager::getPostsByCategoryId($id);
}

require_once 'views/categoryView.php';
