<?php
require_once 'partials/header.php';
?>

<section class="container mt-5">
    <h2 class="mb-3">Articles publiés par l'utilisateur : <?php echo $userInfos->getPseudo() ?></h2>
    <div class="row">
        <?php foreach ($userPosts as $userPost) { ?>
            <div class="card col-12 col-md-4 col-lg-3 me-3 mb-3">
                <a href="singlePost.php?id=<?php echo $userPost->getIdPost() ?>"><img src="<?php echo $userPost->getPicture() ?>" class="card-img-top mt-2" alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $userPost->getTitle() ?></h5>
                    <a href="singlePost.php?id=<?php echo $userPost->getIdPost() ?>" class="btn btn-outline-danger">Voir l'article</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php
require_once 'partials/footer.php';
?>