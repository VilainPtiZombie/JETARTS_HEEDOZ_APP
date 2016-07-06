<?php
include('db.php'); // Import BDD
include('auth.php'); // Obligatoire pour les zone sécurisés

?>
<!DOCTYPE html>
<html>
   <?php include('header.php'); ?>
    <body>
        <?php include('menu.php'); ?>
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
    <div class="back_map">
        <a href="index.php"><img src="img/fleche_retour-02.png"></a>
        <h1 class="page_profil">heedoz</h1>
    </div>
   
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
        </ul>
    </section>
<?php } ?>
    <!-- Fin_Profil_Commerçant --> 
     <!-- Modif_Profil -->
     <section>
      <form class="menu_promo" method="post" action="traitement/modif_mdp.php">
        <div class="col-xs-12 modif_com">
            <label for="pseudo">Votre nouveau mot de passe :</label>
            <input class="create_promo_custom" type="password" name="mdp" id="mdp" required/>

            <label for="pseudoConfirm">Retapez votre nouveau mot de passe :</label>
            <input class="create_promo_custom" type="password" name="mdpConfirm" id="mdpConfirm" required/>
       <input class="ajout_promo_button" type="submit" value="Valider">
       </div>
     </form>
     <form class="menu_promo" method="post" action="traitement/modif_mail.php">
       <div class="col-xs-12 modif_com">
            <label for="mail">Votre nouvelle adresse mail :</label>
            <input class="create_promo_custom" type="email" name="mail" id="mdp" required/>

            <label for="mailconfirm">Retapez votre nouvelle adresse mail  :</label>
            <input class="create_promo_custom" type="email" name="mailConfirm" id="mdpConfirm" required/>
       <input class="ajout_promo_button" type="submit" value="Valider">
       </div>
     </form>


     <!-- Fin_Modif_Profil -->
     
<?php include('footer.php'); ?>
