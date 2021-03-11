<div class="contener">
<h3 class="msg">Mon profil</h3>


<div class="contenu">
<form action="?backoffice_admin" method="post" class="form">>
<?php

echo ' <label for="pseudo_user"> Pseudo : </label>'
    . '<br>'
    . '<input type="text" name="pseudo_user" value="' . $_SESSION['pseudo'] . '" class="form-control">'
    . '<br>'
    . '<label for="mail">Adresse mail : </label>'
    . '<br>'
    . '<input type="text" name="mail_user" value="' . $_SESSION['mail'] . '" class="form-control">'
    . '<br>'
    . '<label for="password">Mot de passe : </label>'
    . '<br>'
    . '<input type="text" name="password_user" value="' .  $_SESSION['password'] . ' " class="form-control">'
    . '<br>'
    . '<input class="btn btn-grad" type="submit" name="update_user" value="Modifier">';
?>
</form>
</div>
</div>
</div>

<!-- <form action="?login_check" method="post" id="retour">
    <input type="submit" value="Retour">
</form> -->

<!-- Comment faire pour l'envoyer sur le backoffice si c'est un admin et sur l'espace perso si c'est un user -->
<!-- <form>
  <input type="button" value="back" onclick="history.go(-1)">
</form> -->