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
        </ul>
    </section>
<?php } ?>
    <!-- Fin_Profil_Commerçant --> 
     <!-- Modif_Profil -->
     <section>
     <form action="traitement/modif_profil.php" method="POST">
         <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
         <div class="col-xs-8">
            <label>Modifier votre Mot de Passe</label>
                <input class="form-control" name="password" type="password" placeholder="Changez Votre password">
            <label>Modifier votre E-Mail</label>
                <input class="form-control" name="mail" type="text" placeholder="Changez Votre mail">
            <label>Modifier votre Avatar</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			<!-- value est la taille en octet ici 1mo -->
            <input type="file" name="img">
			(1Mo max, format autorisé : jpg, jpeg, png ou gif)
            <input type="submit" value="Update"/>
         </div>
     </form>      
     </section>
     <!-- Fin_Modif_Profil -->
    </body>
</html>
