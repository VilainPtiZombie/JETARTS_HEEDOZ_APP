<?php // script de traitement ajout de promo commerçant
  //INPORT SETTINGS
  include('../config.php');
  include('../db.php');
  include('../auth.php');

// echo UPLOAD_FILE_PATH;

  // si l'utilisateur n'est pas connecté
  if(empty($_SESSION['username'])){

    //on le renvoi vers la page de connexion
    header('Location: ../logIn.php');
    exit();
  }

  // si le formulaire est vide
  if(empty($_POST)){

    //on le renvoi vers la page d'ajout de slide
    header('Location: FormVide.php');
    exit();
  }

  //Pour le formulaire d'ajout de slide
  //on initialise les variables d'erreurs et de retour
  $error = false;
  $errorUrl = 'rrrrr.php?';

  //si les titre sont vide
  if( empty($_POST['password'])){
    $error = true;
    $errorUrl = $errorUrl.'&titleEmpty';
  }

  //si les textes sont vide
  if( empty($_POST['mail'])){
    $error = true;
    $errorUrl = $errorUrl.'&textEmpty';
  }
    //si les textes sont vide
  if( empty($_POST['img'])){
    $error = true;
    $errorUrl = $errorUrl.'&catEmpty';
  }

  //TRAITEMENT IMPORT IMAGE VIA FORMULAIRE
  //si on a recu un fichier et qu'il y a une erreur
  if($_FILES['img']['size'] > 0 && $_FILES['img']['error'] > 0){

    //on change les variable d'erreurs
    $error = true;
    $errorUrl = $errorUrl.'&fileError';
  }

  //si on a recu un fichier
  if($_FILES['img']['size'] > 0){

    //on teste si on a la bonne extension
    $extensions_valides = array('png', 'jpg', 'jpeg', 'gif');

    //on recupère le nom d'origine du fichier
    $nomDuFichier = $_FILES['img']['name'];

    //on décompose ce nom sous forme d'un tableau selon le motif '.'
    $patternDuFichier = explode('.', $nomDuFichier);

    //on recupere la derniere case de ce tableau c'est à dire l'extension
    $extension_du_fichier = $patternDuFichier[ count($patternDuFichier) - 1];

    //on transforme l'extention en minuscule
    $extension_minuscule = strtolower($extension_du_fichier);

    //si l'extension minuscule n'est pas dans le tableau des valides
    if( !in_array($extension_minuscule, $extensions_valides)) {

      //on declenche une erreur
      $error = true;
      $errorUrl = $errorUrl.'&extensionError';
    }
  }


  //si il y a une erreur
  if($error){

  //on revoi vers la page d'ajout de slide
  header('Location: '.$errorUrl);
  exit();

  }else{//on ajoute dans la bd

    //on initialise les variables qui nous permettent de construire la requete avec le pseudo et le mot de pass de l'utilisateur
    $insertCols = array('password', 'mail');
    //$insertAliases = ':tifr, :tfr, :time';
    $insertAliases = array(':pass' => $_POST['password'], ':mail' => $_POST['mail']);


    $sql = "update users (". implode(", ", $insertCols) .") set(". implode(", ", array_keys($insertAliases) ) .") where username=".$_SESSION['username']."";
    $sql .= " on duplicate key update ";
    for($i=0; $i < count($insertCols); $i++){
      $sql .= (($i == 0)?"":", ");
      $sql .= " ". $insertCols[$i] ."=". array_keys($insertAliases)[$i];

      
    }
    $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    if($sth->execute($insertAliases)){
//GG
      $lastInsertId = $dbh->lastInsertId();
      //echo $lastInsertId;
      //var_dump($_FILES);
      if(!empty($_FILES['img']['name']) ){

        $image_info = pathinfo($_FILES['img']['name']);
        //on construit le nouveau nom du fichier image
        $nom = "promo-". $lastInsertId .'.'.strtolower($image_info['extension']);

        //on deplace le fichier temporaire vers le dossier data avec le nouveau nom
        if (move_uploaded_file($_FILES['img']['tmp_name'], UPLOAD_FILE_PATH . $nom)){
          $sql = " update promo set imgTitle=:image where id=:id ";

          $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          if($sth->execute(array(
              ":id" => $lastInsertId,
              ":image" => $nom
            ))){
        //echo 'PROUTdddddd';
          }
        }else{
         echo 'impossible de faire upload';
          // pas d'image
        }
      }
      //echo 'GG'. 
      
      $dbh->lastInsertId();
      header('Location: ../réussi.php');
    }else{
      
//FILSDEP
      //echo 'FILSDEP';
    }

/*

        //requete qui doit retourner des resultats
        $results = $dbh->query("select * from message");
        // recupere les messages dans le connecteur
        $messages = $results->fetchAll();
*/



    //on recupere l'id ajoute automatiquement
    $id = $mysql -> lastInsertId();

    if($_FILES['img']['imgSize'] > 0){
      //on construit le nouveau nom du fichier image
      $nom = $id.'.'.$extension_minuscule;

      //on deplace le fichier temporaire vers le dossier data avec le nouveau nom
      move_uploaded_file($_FILES['img']['tmp_name'], '../data/slide/'.$nom);

      //on modifie la ligne dans la base de donnees
      $modif = $mysql -> prepare('UPDATE users SET img=:c WHERE username= :i');
      $modif -> execute(array(':c' => $nom, ':i' => $id));
    }

    //on redirige vers la fiche du livre avec un message de confirmation
    header('Location: etster.php');


  }















