<div class="msg">
<h3>Utilisateurs de la SMALA</h3>
</div>    
<div class="content-table">
    <table>
        
        <tr>
            <td>Pseudo</td>
            <td>Email</td>
            <td>Mot de passe</td>
            <td colspan="2">Gestion</td>
            <td></td>
        </tr>
        
        <?php
        foreach ($_SESSION["all_users"] as $value => $key) {
            
            echo '<form action="?admin_rud_users" method="post">'
            . '<tr><td><input type ="text" name="pseudo_user" value="' . $key['pseudo_user'] . '"></td>'
            . '<td><input type ="text" name="mail_user" value="' . $key['mail_user'] . '"></td>'
            . '<td><input type ="text" name="password_user" value="' . $key['password_user'] . '"></td>'
            . '<td><input type="submit" name="update_user" value="Modifier"></td>'
            . '<td><input type="submit" name="delete_user" value="Supprimer"></td>'
            . '<td><input type ="hidden" name="id_user"  value="' . $key['id_user'] . '"></td></tr>'
            . '</form>';
            
        }
        ?>
        
    </table>
</div>
<!-- 
<form action="?login_check" method="post">
    <input type="submit" value="Retour">
</form> -->
