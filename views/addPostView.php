<?php
require_once 'partials/header.php';
?>

<section class='container w-50'>
    <h2 class="mt-3"><i class="fa-regular fa-pen-to-square"></i></h2>
    <h2>Nouvel article</h2>
    <form action="" method="post">
        <div class="mb-3 mt-5">
            <label for="inputTitle" class="form-label">Titre de l'article</label>
            <input type="text" class="form-control" id="inputTitle" placeholder="Titre du post" name="title">
        </div>
        <div class="mb-3">
            <label for="inputContent" class="form-label">Contenu</label>
            <textarea class="form-control" id="inputContent" rows="15" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label for="inputPicture" class="form-label">Télécharger une image</label>
            <input class="form-control" type="file" id="inputPicture" name="picture">
        </div>
        <div class="mt-4">
            <span>Sélectionner une ou plusieurs catégories</span>
        <?php foreach ($categories as $category) { ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $category->getIdCategory(); ?>" id="category.<?php echo $category->getIdCategory(); ?>" name="categories[]">
                <label class="form-check-label" for="category.<?php echo $category->getIdCategory(); ?>">
                    <?php echo $category->getCategoryName(); ?>
                </label>
            </div>
        <?php } ?>
        </div>
        <button type="submit" class="btn btn-outline-danger mt-4">Soumettre l'article</button>
    </form>
</section>

<?php
require_once 'partials/footer.php';
?>