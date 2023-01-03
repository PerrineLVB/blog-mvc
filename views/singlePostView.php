<?php
require_once 'partials/header.php';
require_once 'model/classes/User.php';
require_once 'model/managers/UserManager.php';
?>

<section id="hero">
    <img src="assets/img/<?php echo $post->getPicture() ?>" alt="">
</section>

<section id="main" class="container">
    <h1 class="text-center"><?php echo $post->getTitle() ?></h1>
    <img src="<?php echo $post->getPicture() ?>" class="card-img-top img-fluid mb-3" alt="...">
    <div id="categories">
        <?php foreach ($post_categories as $post_category) { ?>
            <span class="badge rounded-pill text-bg-danger"><?php echo $post_category->getCategoryName() ?></span>
        <?php } ?>
    </div>
    <p> <?php echo $post->getContent() ?></p>
    <p><em>Ecrit par <a href='author.php?id=<?php echo $post_user->getIdUser() ?>'><?php echo $post_user->getPseudo(); ?></a><br><?php echo $post->getDate(); ?></em></p>
</section>

<?php
require_once 'partials/footer.php';
?>