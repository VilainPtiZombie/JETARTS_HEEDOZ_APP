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
<body>
<?php include('menu_swipe.php') ?>
	<h2 class="page-header"> Ajouter un article</h2>

	<form action="traitement/addPromo.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="author" value="<?php echo $_SESSION['username'] ?>">
		<h3>Titre</h3>
		<p>
			<input type="text" name="title" placeholder="Titre francais"/>
		</p>

		<h3>Détails</h3>
		<p>
			<textarea name="text" placeholder="paragraphe francais"></textarea>
		</p>

		<h3>Durée</h3>
			<div style="overflow:hidden;">
                <input type="text" class="form-control" id="datetimepicker12">
            </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker12').datetimepicker({
                inline: true,
                sideBySide: true
            });
        });
    </script>
</div>

		<h3>Catégories</h3>
		<p>
			<input list="categorie" name="categorie" placeholder="Choisir une Catégorie">
			<datalist id="categorie">
			    <option value="Informatique">
			    <option value="Vetement">
			    <option value="Alimentaire">
			    <option value="Meuble">
			    <option value="HIFI">
  			</datalist>
		</p>

		<h3>Image</h3>
		<p>
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			<!-- value est la taille en octet ici 1mo -->
			<input type="file" name="img">
			(1Mo max, format autorisé : jpg, jpeg, png ou gif)
		</p>
		
		<p>
			<input type="submit" value="Ajouter"/>
		</p>
		
	</form>
<?php include('footer.php'); ?>
























