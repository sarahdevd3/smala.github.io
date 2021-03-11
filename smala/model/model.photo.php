<?php


//Add photo DB
if (isset($_POST['submit'])) {    
    $name_photo = $_POST['name_photo'];
    $target_dir = "images/images/";
    $url_photo = $target_dir . basename($_FILES["fileToUpload"]["name"]);   
    $requete = "INSERT INTO `sm_photos`(`name_photo`, `date_photo`, `url_photo`) 
                VALUES (:name_photo, NOW() ,:url_photo)";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
    ":name_photo" => $name_photo,
    ":url_photo" => $url_photo          
    ));  
    $id_photo = $pdo->lastInsertId();    //Recupere le dernier ID
    $res = $prepare->rowCount();     

    //Add assoc_photo_user
    if ($res >= 1){   
        $id_photo_up= $id_photo;
        $id_user_up= $_SESSION["id_user"];        
        $requete = "INSERT INTO `sm_assoc_users_photos`(`id_photo_up`, `id_user_up`) 
            VALUES (:id_photo_up,:id_user_up)";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":id_photo_up" => $id_photo_up,
                ":id_user_up" => $id_user_up        
            ));
        echo "<h3>La photo a bien été ajouté</h3>";
    } 
}



// Read all the user's photos
parse_str($_SERVER["QUERY_STRING"], $qs); // récupère les "query string" et les range en tableau
$keys = array_keys($qs); // extrait le nom des clés du tableau
$route = array_shift($keys); // extrait le nom de la première clé
if ($route == "backoffice_admin") {
    $user = $_SESSION['id_user'];
    $requete = "SELECT 
    `id_photo`,
    `url_photo`,
    `name_photo`,
    `date_photo`,
    `pseudo_user`
    FROM `sm_assoc_users_photos`
    JOIN `sm_photos` ON id_photo = id_photo_up
    JOIN `sm_users` ON id_user = id_user_up
    WHERE id_user = :id_user ;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":id_user" => $user
    ));
    $resultatPhoto = $prepare->fetchAll();
}
// Read all the user's photos
parse_str($_SERVER["QUERY_STRING"], $qs); // récupère les "query string" et les range en tableau
$keys = array_keys($qs); // extrait le nom des clés du tableau
$route = array_shift($keys); // extrait le nom de la première clé
if ($route == "espace_user") {
    $user = $_SESSION['id_user'];
    $requete = "SELECT 
    `id_photo`,
    `url_photo`,
    `name_photo`,
    `date_photo`,
    `pseudo_user`
    FROM `sm_assoc_users_photos`
    JOIN `sm_photos` ON id_photo = id_photo_up
    JOIN `sm_users` ON id_user = id_user_up
    WHERE id_user = :id_user ;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":id_user" => $user
    ));
    $resultatPhoto = $prepare->fetchAll();
}

// Read all the user's photos
if (isset($_POST['readAll_photos'])) {
    $user = $_SESSION['id_user'];
    $requete = "SELECT 
    `id_photo`,
    `url_photo`,
    `name_photo`
    FROM `sm_assoc_users_photos`
    JOIN `sm_photos` ON id_photo = id_photo_up
    JOIN `sm_users` ON id_user = id_user_up
    WHERE id_user = :id_user ;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":id_user" => $user
    ));
    $resultatPhotos = $prepare->fetchAll();
}

// Read the photo selected by the user
if (isset($_POST['read_photo'])) {
    $requete = "SELECT * FROM `sm_photos` WHERE `id_photo` = :id_photo ;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":id_photo" => $_POST['id_photo']
    ));
    $resultat = $prepare->fetch();
}

// Update the photo selected by the user
if (isset($_POST['update_photo'])) {
    $namePhoto = $_POST['name_photo'];    
    $requete = "UPDATE `sm_photos` 
                SET `name_photo` = :name_photo
                WHERE `id_photo` = :id_photo ;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":id_photo" => $_POST['id_photo'],
        ":name_photo" => $namePhoto,       
        
    ));
    $result = $prepare->rowCount();

    if ($result == 1) {
        header('Location: ?backoffice_admin');
        echo '<p>Bien joué, vous venez de modifier votre photo</p>';
    }
}

// Delete the photo selected by the user
if (isset($_POST['delete_photo'])) {
    $requete = "DELETE FROM `sm_photos` WHERE `id_photo` = :id_photo;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":id_photo" => $_POST['id_photo']
    ));
    $result = $prepare->rowCount();

    if ($result == 1) {
        header('Location: ?backoffice_admin');
        echo '<p>Bien joué, vous venez de supprimer votre photo</p>';
    }
}
if (isset($_POST['update_photo_user'])) {
    $namePhoto = $_POST['name_photo'];    
    $requete = "UPDATE `sm_photos` 
                SET `name_photo` = :name_photo
                WHERE `id_photo` = :id_photo ;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":id_photo" => $_POST['id_photo'],
        ":name_photo" => $namePhoto,       
        
    ));
    $result = $prepare->rowCount();

    if ($result == 1) {
        header('Location: ?espace_user');
        echo '<p>Bien joué, vous venez de modifier votre photo</p>';
    }
}

// Delete the photo selected by the user
if (isset($_POST['delete_photo_user'])) {
    $requete = "DELETE FROM `sm_photos` WHERE `id_photo` = :id_photo;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":id_photo" => $_POST['id_photo']
    ));
    $result = $prepare->rowCount();

    if ($result == 1) {
        header('Location: ?espace_user');
        echo '<p>Bien joué, vous venez de supprimer votre photo</p>';
    }
}


?>