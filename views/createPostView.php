<?php
require_once 'partials/header.php';
?>

<section class='container'>
    <h2 class="mt-2"><i class="fa-regular fa-pen-to-square"></i></h2>
    <h2>Nouveau post</h2>
    <div class="mb-3 mt-5">
        <label for="exampleFormControlInput1" class="form-label">Titre du post</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Titre du post">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Contenu</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Télécharger une image</label>
        <input class="form-control" type="file" id="formFile">
    </div>

    <button type="submit" class="btn btn-outline-danger mt-5">Envoyer</button>
</section>

<?php
require_once 'partials/footer.php';
?>