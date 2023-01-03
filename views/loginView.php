<?php
require_once 'partials/header.php';
?>

<section class="container text-center">
    <h2 class="mt-2"><i class="fa-regular fa-user"></i></h2>
    <h2>Connexion</h2>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="email">
            <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre adresse e-mail.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" required name="mdp">
        </div>
        <div class="mb-3">
            <p>Pas enregistré(e) ? <a href="./signIn.php" class="link-secondary">Cliquez ici pour créer un compte !</a></p>
        </div>
        <button type="submit" class="btn btn-outline-danger mt-5">Envoyer</button>
    </form>
</section>

<?php
require_once 'partials/footer.php';
?>