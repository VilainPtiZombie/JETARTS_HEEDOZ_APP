<?php 
// On commence par récupérer les champs 

if(isset($_POST['email']))      
    $email=$_POST['email'];

// On vérifie si les champs sont vides 
if(empty($email)) 
    { 
    $message = '<font color="red">Attention, votre mail est incorrect !</font>'; 
    } 

// Aucun champ n'est vide, on peut enregistrer dans la table 
else      
    { 
    // on affiche le résultat pour le visiteur 
    $message =  '<font color="green">Merci, votre mail est enregistré !</font>'; 
       // connexion à la base
$db = mysql_connect('heedozcocpmail.mysql.db', 'heedozcocpmail', 'Jetarts2016')  or die('Erreur de connexion '.mysql_error());
// sélection de la base  

    mysql_select_db('heedozcocpmail',$db)  or die('Erreur de selection '.mysql_error()); 
     
    // on écrit la requête sql 
    $sql = "INSERT INTO `heedozcocpmail`.`email` (`id`, `mail`) VALUES (NULL, '$email');"; 
     
    // on insère les informations du formulaire dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 



    mysql_close();  // on ferme la connexion 
    header('location: index.html');
    }  
?>