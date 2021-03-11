
<?php

if(isset($_SESSION["role"])){
    if($_SESSION["role"] == 0){
        echo('<form action="?espace_user" method="post" id="retour">
        <input type="submit" value="Retour">
        </form>');
    }
    else{
        echo('<form action="?backoffice_admin" method="post" id="retour">
        <input type="submit" value="Retour">
        </form>');
    }

}

?>
