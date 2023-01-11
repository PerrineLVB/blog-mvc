<?php
session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CommentManager.php';
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/UserManager.php';

if (isset($_SESSION['user'])) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        CommentManager::deleteCommentsByPostId($id);
        CategoryManager::deleteCategoriesByPostId($id);
        PostManager::deletePost($id);
        header('location:index.php');
    }
} else {
    echo 'Vous devez être connecté(e) pour pouvoir supprimer un article.';
};
