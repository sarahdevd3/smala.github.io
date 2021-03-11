
<div class="containers ">
<div class="bacOffic__content">


<?php

$mail_user = $_SESSION['connected'];
$pseudo_user = $_SESSION['pseudo'];

echo '<div class="msg"><h2>Bonjour '.'...'.'🤗 ' . $pseudo_user.'...'.'🤗'. '</h2></div>
            <div class="das__container">
            <h2>Manage </h2>
            <form action="?add_photo" id="add_photo" method="post">
            <input type="submit" value="Ajouter une photo">
            </form>
            <form action="?update_profile" method="post">
            <input type="submit" value="Modifier mes infos personnelles">
            </form>
            <form action="?create_user" method="post">
            <input type="submit" value="Créer un utilisateur">
            </form>
            <form action="?admin_rud_users" method="post">
            <input type="submit" value="Voir les utilisateurs">
            </form>
        </div>';


if(isset($resultatPhoto)){
    foreach ($resultatPhoto as $key => $value){
        //Il faut réaliser un JOIN pour récupérer le pseudo de la personne qui a édité la photo
        echo '<div class="post-phpto">'
        . '<div class="post-phpto__header ">'
        . '<div class="phpto__header--avatar profile-user__photo"></div>'
        . '</div>'
        . '<div class="post-phpto__content "><img src="' . $value['url_photo'] . '" alt="' . $value['name_photo'] . '"></div>'

            // . '<img src="' . $value['url_photo'] . '" alt="' . $value['name_photo'] . '">'
            . '<div class="post-phpto__footer">'
            . '<p>' . $value['name_photo'] . '</p>'
            . '<p>publié par ' . $value['pseudo_user'] . '</p>'
            . '<p>' . $value['date_photo'] . '</p>'
            . '</div>'
            . '<form action="?rud_photo_users" method="post">'
            . '<input type="hidden" name="id_photo" value="'. $value['id_photo'] .'">'
            . '<input type="submit" name="read_photo" value="Modifier">'
            . '</form>'
            . '<form action="?backoffice_admin" method="post">'
            . '<input type="hidden" name="id_photo" value="'. $value['id_photo'] .'">'
            . '<input type="hidden" name="url_photo" value="'. $value['url_photo'] .'">'
            . '<input type="submit" name="delete_photo" value="Supprimer">'
            . '</form>'
            . '</div>';
    }
}
else{
    echo("<p>Il n'y a pas encore de photo...batard</p>");
}
?>
</div>
</div>

