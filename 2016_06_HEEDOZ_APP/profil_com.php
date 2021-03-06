<?php 
	//INPORT SETTINGS
	include("auth.php"); //include auth.php file on all secure pages 
	require('db.php');
	

	// si l'utilisateur n'est pas connecté
	if(empty($_SESSION['username'])){


		//on le renvoi vers la page de connexion
		header('Location: logIn.php');
	}
 ?>
<!DOCTYPE html>


<?php 
  include('header.php');
?>



<!-- BODY -->
<body class="wrapper">
<?php 
  include('menu.php');
?>
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
                <a href="#"><img src="img/fleche_retour-02.png"></a>
                <h1 class="page_profil">heedoz</h1>
            </div>
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

 <?php
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>   
    <!-- Promo_EnCours --> 
    <section class="Promo_EnCours col-xs-12">
        <h2 class="Title_EnCours col-xs-12">Actuellement Chez Vous</h2>
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
$rep = $bdd->query('SELECT * FROM promo WHERE author=\'' . $_SESSION['username'] . '\'');

// On affiche chaque entrée une à une
while ($promo = $rep->fetch())
{
?>
        <ul class="col-xs-12 prod_com" style="padding-left: 0px;padding-right: 0px;"> 
            <?php echo '<li class="col-xs-6">'. $promo['title'], $promo['timer'], $promo['timerS'] .'</li>' ?>
        </ul>
    </section>
 <?php
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>
    <!-- Fin_Promo_EnCours --> 

    <!-- Add_Promo_Commerçant --> 
    <section class="col-xs-12 Add_Promo">
    <div class=" content_prod ">
    <div class=" admin-text">
        <img class="more_promo" src="img/more_promo.png">
	<h2 class="page-header col-xs-12">Créer une Nouvelle Promo</h2>
	</div>
	</div>	

	<form class="menu_promo" action="traitement/addPromo.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="author" value="<?php echo $_SESSION['username'] ?>">
		<h3 class="col-xs-8">Titre</h3>
		<p class="col-xs-8">
			<input class="create_promo_custom" type="text" name="title" placeholder="Titre francais"/>
		</p>

		<h3 class="col-xs-8">Détails</h3>
		<p class="col-xs-8">
			<textarea class="create_promo_custom_details" name="text" placeholder="paragraphe francais"></textarea>
		</p>

		<h3 class="col-xs-12">Durée</h3>
                    <p class="col-xs-8">
                    <input type="date" class="create_promo_custom" name="timer" placeholder="ddddmmyyyy">
                    <input type="time" class="create_promo_custom" name="timerS" placeholder="00:00:00">
                    </p>

                <h3 class="col-xs-8">Catégories</h3>
		<p class="col-xs-8">
			<input class="create_promo_custom" list="categorie" name="categorie" placeholder="Choisir une Catégorie">
			<datalist id="categorie">
			    <option value="Informatique">
			    <option value="Vetement">
			    <option value="Alimentaire">
			    <option value="Meuble">
			    <option value="HIFI">
  			</datalist>
		</p>

		<h3 class="col-xs-8">Image</h3>
		<p class="col-xs-8">
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			<!-- value est la taille en octet ici 1mo -->
			<input type="file" name="img">
			(1Mo max, format autorisé : jpg, jpeg, png ou gif)
		</p>
		
		<p class="col-xs-8 ajout_promo">
			<input class="ajout_promo_button" type="submit" value="Ajouter"/>
		</p>
		
	</form>
	</div>
    </section>
   <!-- Fin_add_Promo_Commerçant --> 
   

<?php include('footer.php'); ?>
























