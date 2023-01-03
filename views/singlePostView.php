<?php
require_once 'partials/header.php';
?>

<section id="main" class="container">
    <h1 class="text-center mb-3 mt-3"><?php echo $post->getTitle() ?></h1>
    <img src="<?php echo $post->getPicture() ?>" class="card-img-top img-fluid mb-3 rounded w-75 mx-auto d-block" alt="...">
    <div id="categories">
        <?php foreach ($post_categories as $post_category) { ?>
            <span class="badge rounded-pill text-bg-danger"><?php echo $post_category->getCategoryName() ?></span>
        <?php } ?>
    </div>
    <p> <?php echo $post->getContent() ?></p>
    <p><em>Ecrit par <a href='author.php?id=<?php echo $post_user->getIdUser() ?>'><?php echo $post_user->getPseudo(); ?></a><br><?php echo $post->getDate(); ?></em></p>
    <div class="container border border-dark-subtle rounded mt-5">
        <h4>Commentaires</h4>
        <figure class="text-end">
            <blockquote class="blockquote">
                <p>blablablablablablablabla</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <em>Auteur/Date</em>
            </figcaption>
        </figure>
    </div>
</section>

<?php
require_once 'partials/footer.php';
?>