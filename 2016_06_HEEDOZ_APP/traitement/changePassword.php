<?php
//Script de traitement du changement de mot de passe

//on import la config
require('../db.php');

// si l'utilisateur n'est pas connecté
if(empty($_SESSION['username'])){

	//on le renvoi vers la page de connexion
	header('Location: login.php');
}

//si on arrive sur cette page sans passer par le formulaire
if( empty($_POST) ){

	//on renvoi vers la page de changement de mot de passe
	header('Location: profil.php');
	exit();

}

//on verifie que l'utilisateur a bien donné l'ancien mot de passe
$verif = $mysqli_query->prepare('SELECT * FROM users WHERE id = :i AND password = :p');
$verif -> execute(array(
		':i' => $_SESSION['id'],
		':p' => md5($_POST['oldPass'])
	));

//si il n'y a pas eu de resultat
if( $verif->rowCount() ==  0 ){

	//on le renvoi a la page de connexion avec un message d'erreur 
	header('Location: profile.php?passwordUnknow');
	exit();
}

//si le nouveau mot de passe est vide
if(empty($_POST['password'])){
	header('Location: profile.php?passwordEmpty');
	exit();
}

//on verifie que le nouveau mot de passe et la confirmation sont identique
if($_POST['password']{
	header('Location: profile.php?confirmationPassword');
	exit();
}else{

//on modifie la bd
$modif = $mysqli_query->prepare('UPDATE users SET password=:p WHERE id=:i');
$modif->execute(array(':i'=>$_SESSION['id'],':p' => md5($_POST['password'])));

//on le renvoi vers la page d'accueil du back office
header('Location: profil.php?&passwordchanged');
exit();

}//fin du script






















