<?php
require_once 'partials/header.php';
?>

<section class="container mt-5">
    <div class="row">
        <?php foreach ($posts as $post) { ?>
            <div class="card col-12 col-md-4 col-lg-3 me-3 mb-3">
                <a href="singlePost.php?id=<?php echo $post->getIdPost() ?>"><img src="<?php echo $post->getPicture() ?>" class="card-img-top mt-2" alt="..."></a>
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