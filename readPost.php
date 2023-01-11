<?php

session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/UserManager.php';
require_once 'model/managers/CommentManager.php';
//toutes nos catégories pour le menu de navigation
$categories = CategoryManager::getAllCategories();

//cette page étant censée recevoir un id, on va d'abord vérifier qu'il est bien présent
if (isset($_GET['id']) && !empty($_GET['id'])) {
    //on le met dans une variable pour plus de simplicité par la suite
    $id = $_GET['id'];
    //on va chercher les informations de l'article qu'on souhaite afficher
    $post = PostManager::getPostById($id); //les infos de l'article
    $post_categories = CategoryManager::getCategoriesByPostId($id);
    $post_user = UserManager::getUserInfosByPostId($id); //les categories auxquelles il est relié
    $comments = CommentManager::getCommentsByPostId($id);
    $commentsData = [];
    foreach ($comments as $comment) {
        $comment_author = CommentManager::getUsernameByCommentId($comment->getIdComment());
        $commentsData[] = [
            'comment' => $comment,
            'author' => $comment_author,
        ];
    }
    if (isset($_SESSION['user'])) {
        if (isset($_POST) && !empty($_POST)) {
            $content = $_POST['content'];
            $id_user = $_SESSION['user']['id'];
            $id_post = $post->getIdPost();
            $newCommentId = CommentManager::addComment($content, $id_user, $id_post);
            header("location:readPost.php?id=$id_post#comments");
        }
    } else {
        echo "Vous devez être connecté(e) pour pouvoir ajouter un commentaire.";
    }
}

require_once 'views/readPostView.php';
