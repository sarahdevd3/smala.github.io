<div class="contener">
<div class="das__container">
<?php
echo '<div class="msg"><h3>Bonjour ' . $_SESSION['pseudo'] .'!</h3></div>';
?>
<div class="columnLeft">

<h2>Manage</h2>

<form action="?add_photo" id="add_photo" method="post">
<input type="submit" value="Ajouter une photo">
</form>

<form action="?update_profile" id="update_profil" method="post">
<input type="submit" value="Modifier le profil">
</form>

<form action="?user_rud_photo" id="update_photo" method="post">
<input type="submit" value="Modifier mes photos" name="readAll_photos" >
</form>

</div>
                
                    
                        
                        
                    
                    
                    <?php
                        if(isset($resultatPhoto)){
                            foreach ($resultatPhoto as $key => $value) {
                                //Il faut réaliser un JOIN pour récupérer toutes les photos de l'user qui est connecté 
                                echo '<div class="post-phpto ">'
                                    . '<div class="post-phpto__header ">'
                                    . '<div class="phpto__header--avatar profile-user__photo"></div>'
                                    . '</div>'
                                    // . '<p class="pseudoUserPhoto">' . $value['pseudo_user'] . '</p>'
                                    . '<div class="post-phpto__content "><img src="' . $value['url_photo'] . '" alt="' . $value['name_photo'] . '"></div>'
                                    // . '<p class="namePhoto">' . $value['name_photo'] . '</p>'
                                    . '<div class="post-phpto__footer"></div>'
                                    . '</div>';
                            }
                        }
                        else{
                            echo("<p>Il n'y a pas encore de photo...batard</p>");
                        }
                    ?>

                    
        
                    


</div>
</div>
