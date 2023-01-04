<?php
require_once 'partials/header.php';
?>

<section class="container mt-4 text-center">
    <h1 class="mb-5">Bienvenue sur ce blog dédié à Toulouse</h1>
    <div class="row d-flex justify-content-evenly">
        <?php foreach ($posts as $post) { ?>
            <div class="card col-12 col-md-4 col-lg-3 me-3 mb-5">
                <img class="img-fluid mt-2 rounded mx-auto h-75" src="images/<?php echo $post->getPicture() ?>" class="card-img-top mt-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
                    <a href="singlePost.php?id=<?php echo $post->getIdPost() ?>" class="btn btn-outline-danger">Voir l'article</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php
require_once 'partials/footer.php';
?>