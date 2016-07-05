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
        <h1 class="page_profil"  style="color: #fff;background-color: #ea384d;font-size: 17px; height: 49px; padding-top: 15px; margin-bottom: 0px;">heedoz</h1>
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
      <form  method="post" action="traitement/modif_mdp.php">
        <p class="form-group">
            <label for="pseudo">Votre nouveau mot de passe :</label><input class="form-control" type="password" name="mdp" id="mdp" required/>
        <br/>
            <label for="pseudoConfirm">Retapez votre nouveau mot de passe :</label><input class="form-control" type="password" name="mdpConfirm" id="mdpConfirm" required/>
        <br/>
       <input type="submit" value="Changer mon mot de passe">
     </form>
     <form  method="post" action="traitement/modif_mail.php">
        <p>
            <label for="mail">Votre nouvelle adresse mail :</label><input class="form-control" type="email" name="mail" id="mdp" required/>
        <br/>
            <label for="mailconfirm">Retapez votre nouvelle adresse mail  :</label><input class="form-control" type="email" name="mailConfirm" id="mdpConfirm" required/>
        <br/>
       <input type="submit" value="Changer d'email">
     </form>

     <!-- Fin_Modif_Profil -->
     
<?php include('footer.php'); ?>
