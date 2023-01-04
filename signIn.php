<?php
session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/UserManager.php';
$categories = CategoryManager::getAllCategories();

if(isset($_POST) && !empty($_POST)){
    $pseudo = htmlentities($_POST['pseudo']);
    $email = htmlentities($_POST['email']);
    $mdp = $_POST['pass'];
    $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);
    // transmission à une méthode du manager pour enregistrer en bdd
    UserManager::addUser($pseudo, $email, $hashed_password);
    header('location:index.php');
}

require_once 'views/signInView.php';