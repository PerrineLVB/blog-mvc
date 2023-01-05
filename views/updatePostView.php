<?php
require_once 'partials/header.php';
?>

<section id="main" class="container">
    <input type="text" class="mb-3 mt-3" name="title" value="<?php echo $post->getTitle() ?>"></input>
    <img src="images/<?php echo $post->getPicture() ?>" class="card-img-top img-fluid mb-3 rounded w-75 mx-auto d-block" alt="...">
    <div>
        <?php foreach ($post_categories as $post_category) { ?>
            <a href="category.php?id=<?php echo $post_category->getIdCategory(); ?>"><span class="badge rounded-pill text-bg-danger p-2"><?php echo $post_category->getCategoryName() ?></span></a>
        <?php } ?>
    </div>
    <textarea name="content" row="15" value="<?php echo $post->getContent() ?>"></textarea>
    <div class="d-flex justify-content-between">
        <p><em>Ecrit par <a href='author.php?id=<?php echo $post_user->getIdUser() ?>'><?php echo $post_user->getPseudo(); ?></a><br><?php echo $post->getDate(); ?></em></p>
        <div>
            <button href="" type="button" class="btn btn-outline-danger h-75">Valider les modifications <i class="fa-solid fa-check"></i></button>
        </div>
    </div>
</section>

<?php
require_once 'partials/footer.php';
?>