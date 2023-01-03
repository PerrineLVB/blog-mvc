<?php session_start(); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ô TOULOUSE</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/custom.css">
    <script src="https://kit.fontawesome.com/8f442c55b9.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><strong>Ô TOULOUSE</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($categories as $category) { ?>
                                <li><a class="dropdown-item" href="category.php?id=<?php echo $category->getIdCategory(); ?>"><?php echo $category->getCategoryName() ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                            <a class="nav-link" href="addPost.php">Nouvel article <i class="fa-regular fa-pen-to-square"></i></a>
                        <?php } ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                            <a class="nav-link" href="logout.php">Déconnexion <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        <?php } else { ?>
                            <a class="nav-link" href="login.php">Connexion <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                        <?php }
                        ?>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <div class="notFooter">