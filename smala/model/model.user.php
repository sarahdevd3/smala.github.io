<?php

////////////////////////////

//READ USER//
if(isset($_POST['login'])){
   $pseudo_user = htmlentities($_POST["pseudo_user"], ENT_QUOTES);
   $requete = "SELECT * FROM `sm_users`
               WHERE `pseudo_user` = :pseudo_user;";
   $prepare = $pdo->prepare($requete);
   $prepare->execute(array(
      ":pseudo_user" => $pseudo_user
   ));
   $resultat = $prepare->fetchAll();  

}


//READ ALL USERS//
// Read all the user's photos
parse_str($_SERVER["QUERY_STRING"], $qs); // récupère les "query string" et les range en tableau
$keys = array_keys($qs); // extrait le nom des clés du tableau
$route = array_shift($keys); // extrait le nom de la première clé
if ($route == "admin_rud_users"){
   $requete = "SELECT * FROM `sm_users`";
   $prepare = $pdo->prepare($requete);
   $prepare->execute();
   $resultat = $prepare->fetchAll();  
   $_SESSION["all_users"] = $resultat;

}


// UPDATE USER //
if (isset($_POST['update_user'])) {
   $user = $_SESSION['id_user'];
   $pseudo = $_POST['pseudo_user'];
   $mail = $_POST['mail_user'];
   $password = $_POST['password_user'];
   $requete = "UPDATE `sm_users` 
               SET `pseudo_user` = :pseudo_user , `mail_user` = :mail_user, `password_user` = :password_user 
               WHERE `id_user` = :id_user ;";
   $prepare = $pdo->prepare($requete);
   $prepare->execute(array(
     ":id_user" => $user,
     ":pseudo_user" => $pseudo,
     ":mail_user" => $mail,
     ":password_user" => $password
   ));
   $resultat = $prepare->rowCount();
   
   if ($resultat == 1) {
     echo '<p>Bien joué, vous venez de modifier vos informations personnelles</p>';
   }
 }





////////////////////// DELETE USER BY ADMIN ///////////////////////////

//Récupere l'ID DES photos de l'utilisateur
if (isset($_POST['delete_user'])) {
   $id_user = $_POST['id_user'];
   $requete = "SELECT * FROM sm_assoc_users_photos
               WHERE id_user_up = :id_user_up";
   $prepare = $pdo->prepare($requete);
   $prepare->execute(array(
      ":id_user_up" => $id_user
   ));
   $resultat = $prepare->fetchAll();


   //SUPPRIME toutes les photos de l'utilisateur
   foreach($resultat as $key => $value){
      $requete = "DELETE FROM sm_photos
                  WHERE id_photo = :id_photo ";
      $prepare = $pdo->prepare($requete);
      $prepare->execute(array(
         ":id_photo" => $value['id_photo_up']
      ));
   }
     

//Delete l'utilisateur
   $requete = "DELETE FROM sm_users
   WHERE id_user = :id_user";
   $prepare = $pdo->prepare($requete);
   $prepare->execute(array(
      ":id_user" => $id_user
   ));   
   $result = $prepare->rowCount();
   if ($result == 1) {
      echo '<p>Utilisateur Supprimé</p>';
      header('Location: ?admin_rud_users');
   }
 }

//create user//create user//create user//create user//create user//create user//create user

if (isset($_POST['create_account'])) {
    $pseudo_user = $_POST['pseudo_user'];
    $mail_user = $_POST['mail_user'];
    $password_user = $_POST['password_user'];
    $role_user = $_POST['role_user'];
   
   $requete = "INSERT INTO `sm_users`(`pseudo_user`, `mail_user`, `password_user`, `role_user` ) 
               VALUES (:pseudo_user,:mail_user,:password_user,:role_user)";
   $prepare = $pdo->prepare($requete);
   $prepare->execute(array(
      ":pseudo_user" => $pseudo_user,
      ":mail_user" => $mail_user,
      ":password_user" => $password_user,
      ":role_user" => $role_user       
   ));
   echo ("<h3>L'utilisateur a bien été ajouté</h3>");

   }
///////////////////////////////////////////////////////////////////////







