<?php
include('db.php'); // Import BDD
include('auth.php'); // Obligatoire pour les zone sécurisés

?>
<!DOCTYPE html>
<html>
   <?php include('header.php'); ?>
    <body>
        <?php include('menu_swipe.php'); ?>
        <?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=register;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table users
$reponse = $bdd->query('SELECT * FROM users WHERE username=\'' . $_SESSION['username'] . '\'');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <h1 class="page-header col-xs-12"> heedoz </h1>
   <!-- Profil_Commerçant --> 
   
    <section class="Commercant_profile col-xs-12">
        <ul class="#">
            <li  class="col-xs-8">
                <p><?php echo $donnees['username']?></p>
            </li>
            <li  class="col-xs-8">
                <p><?php echo $donnees['adress'] ?></p>
            </li>
            <li  class="col-xs-8">
                <a><?php echo $donnees['email'] ?></a>
            </li>
            <li   class="col-xs-4">
                <a href="#" class="col-xs-4">Modifier</a>
            </li>
        </ul>
    </section>
    <!-- Fin_Profil_Commerçant --> 
        
    </body>
</html>
