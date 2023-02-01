$(document).ready(function () {
    // console.log('Bienvenue dans mon code jQuery !');
    $('form').submit(function (event) {
        event.preventDefault();                                                         // stoppe la propagation de l'évènement donc ici l'envoi du formulaire
        let comment = $('#inputContent').val();                                         // récupère le contenu du champ de formulaire
        // console.log(comment);                                                        // on l'affiche en console
        let userPseudo = $('#pseudo').val();
        let date = 'a few moments ago';
        $.post('', { content: comment });                                               // on l'envoie en base de données via la requête Ajax
        $('<figure class="ps-5"><blockquote class= "blockquote" ><p>' + comment + '</p></blockquote ><figcaption class="blockquote-footer"><em>' + userPseudo + '</em><br><em>' + date + '</em></figcaption></figure >').appendTo('#comments');    // affichage immédiat du commentaire en ajoutant un élément dans le DOM
        $('#inputContent').val('');                                                     // on vide le champ de saisie du commentaire pour simuler l'envoi
    })
});