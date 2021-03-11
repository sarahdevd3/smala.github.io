
<div class="contener">
<div class="das__container">
<?php

echo '<h3>Modifier ' . $resultat['name_photo'] . '</h3>';

echo '<div>';

echo '<form action="?backoffice_admin" method="post">'
        .'<label for="name_photo">Nom de la photo : </label>'
        . '<input type="text" name="name_photo" value="' . $resultat['name_photo'] . '">'
        . '<input type="hidden" name="id_photo" value="' . $resultat['id_photo'] . '">'
        . '<input type="submit" name="update_photo" value="Modifier">';
?>
</form>
</div>
</div>
</div>

<!-- <form action="?login_check" method="post">
    <input type="submit" value="Retour">
</form> -->
