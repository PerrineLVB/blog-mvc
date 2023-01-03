<?php
require_once 'partials/header.php';
?>

<section class="container text-center w-50">
    <h2 class="mt-2"><i class="fa-regular fa-user"></i></h2>
    <h2>Inscrivez-vous !</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleInputPseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="exampleInputPseudo" required name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" requireD>
            <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre adresse e-mail.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
        </div>
        <div class="text-center">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
            <label class="form-check-label" for="flexCheckDefault">
                J'accepte les conditions d'utilisation.
            </label>
        </div>
        <button type="submit" class="btn btn-outline-danger mt-5">Envoyer</button>
    </form>
</section>

<?php
require_once 'partials/footer.php';
?>