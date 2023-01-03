<?php
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';
$categories = CategoryManager::getAllCategories();
session_start();

require_once 'views/createPostView.php';