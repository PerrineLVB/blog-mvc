<?php

require_once 'model/managers/UserManager.php';
require_once 'model/managers/CategoryManager.php';
$categories = CategoryManager::getAllCategories();
// reception des données du formulaire
if (isset($_POST) && !empty($_POST)) {
    $email = htmlentities($_POST['email']);
    $mdp = $_POST['mdp'];
    //récupération des données de l'utilisateur via une valeur unique telle que le mail
    $user = UserManager::getUserByEmail($email);
    var_dump($user);
    // vérification de la correspondance du mdp en bdd avec celui saisi par l'utilisateur
    UserManager::connectUser($user, $mdp);
}

require_once 'views/loginView.php';
tt