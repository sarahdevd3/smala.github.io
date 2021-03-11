<?php

  // je suis un contrôleur, un chef d'orchestre !

  // d'abord j'appelle un modèle, pour en récupérer une $info
  // include("model/model.user.php");
  
  // puis j'appelle une vue, pour afficher cette $info dans une belle page web
  include("model/model.pdo.php");//Connexion PDO $pdo

  include("view/view.header_bis.php");

  include("view/view.login.php");


  // et puis voilou, on s'arrête là
  exit;