<div class="contener">
<div class="das__container">
<h3 class="msg">Mes photos</h3>
<div class="content-table">
<table>      
        <tr>
            <td>Mes photos</td>
            <td colspan="2">Gestion</td>
            <td></td>
        </tr>
        <?php
        foreach ($resultatPhotos as $value) {
            //Il faut réaliser un JOIN pour récupérer toutes les photos de la table avec l'éditeur de la photo en question
            echo    '<form action="?user_rud_photo" method="post">'                
                        . '<input  type="hidden" name="id_photo" value="' . $value['id_photo'] . '">'               
                        . '<input type="text" name="name_photo" value="' . $value['name_photo'] . '">'
                        . '<input type="hidden" name="url_photo" value="' . $value['url_photo'] . '">'                
                        . '<input type="submit" name="update_photo_user" value="Modifier">'
                        . '<input type="submit" name="delete_photo_user" value="Supprimer">'
                    . '</form>';
            }
        ?>
</table>
</div>
</div>
</div>