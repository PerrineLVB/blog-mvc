<?php
require_once 'partials/header.php';
?>

<section id="main" class="container">
    <h1 class="text-center mb-3 mt-3"><?php echo $post->getTitle() ?></h1>
    <img src="images/<?php echo $post->getPicture() ?>" class="card-img-top img-fluid mb-3 rounded w-75 mx-auto d-block" alt="...">
    <div>
        <?php foreach ($post_categories as $post_category) { ?>
            <a href="category.php?id=<?php echo $post_category->getIdCategory(); ?>"><span class="badge rounded-pill text-bg-danger p-2"><?php echo $post_category->getCategoryName() ?></span></a>
        <?php } ?>
    </div>
    <p class="mt-2"> <?php echo $post->getContent() ?></p>
    <div class="d-flex justify-content-between">
        <p><em>Ecrit par <a href='author.php?id=<?php echo $post_user->getIdUser() ?>'><?php echo $post_user->getPseudo(); ?></a><br><?php echo $post->getDate(); ?></em></p>
        <div>
            <button href="" type="button" class="btn btn-outline-danger h-75">Modifier l'article <i class="fa-regular fa-pen-to-square"></i></button>
            <button href="" type="button" class="btn btn-outline-danger h-75">Supprimer l'article <i class="fa-regular fa-trash-can"></i></button>
        </div>
    </div>
    <div class="container" id="comments">
        <div class="card border border-dark-subtle rounded mt-5">
            <div class="card-header">
                <h4 class="mt-2">Commentaires</h4>
            </div>
            <div class="card-body">
                <?php if (isset($commentsData) && !empty($commentsData)) {
                    foreach ($commentsData as $commentData) { ?>
                        <figure class="ps-5">
                            <blockquote class="blockquote">
                                <p><?php echo $commentData['comment']->getContent() ?></p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                <em><?php echo $commentData['author']->getPseudo() ?>
                                </em><br>
                                <em><?php echo $commentData['comment']->getDate() ?></em>
                            </figcaption>
                        </figure>
                    <?php }
                } else { ?>
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p>Aucun commentaire</p>
                        </blockquote>
                    </figure>
                <?php } ?>
                <form method="post" class="mt-5">
                    <textarea class="d-block m-auto w-50 rounded p-2" rows="5" placeholder="Votre commentaire..." name="content" urr></textarea>
                    <button type="submit" class="btn btn-outline-danger d-block m-auto mt-3">Ajouter un commentaire</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'partials/footer.php';
?>