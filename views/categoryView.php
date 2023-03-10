<?php
require_once 'partials/header.php';
?>

<section class="container mt-4 text-center">
    <h2 class="mb-5">Articles correspondant à la catégorie : <?php echo $categoryInfos->getCategoryName() ?></h2>
    <div class="row d-flex justify-content-evenly">
        <?php if (!empty($categoryPosts)){
        foreach ($categoryPosts as $categoryPost) { ?>
            <div class="card col-12 col-md-4 col-lg-3 me-3 mb-5">
                <img src="images/<?php echo $categoryPost->getPicture() ?>" class="img-fluid mt-2 rounded mx-auto h-75" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $categoryPost->getTitle() ?></h5>
                    <a href="readPost.php?id=<?php echo $categoryPost->getIdPost() ?>" class="btn btn-outline-danger">Voir l'article</a>
                </div>
            </div>
        <?php }} else { ?>
            <h4 class="mt-5"><em>aucun article pour la catégorie correspondante</em></h4>
        <?php } ?>
    </div>
</section>

<?php
require_once 'partials/footer.php';
?>