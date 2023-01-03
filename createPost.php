<?php
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';
$categories = CategoryManager::getAllCategories();



require_once 'views/createPostView.php';