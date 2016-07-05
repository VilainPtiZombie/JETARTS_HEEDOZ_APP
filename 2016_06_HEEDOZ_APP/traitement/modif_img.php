<?php // script de traitement ajout de promo commerçant
  //INPORT SETTINGS
  include('../config.php');
  include('../db.php');
  include('../auth.php');

$email=$_SESSION["username"];

$filename=basename($_FILES['imgfile']['name']);
$query=mysql_query("UPDATE users SET img='$filename' WHERE email like $email");

$path = "../img/avatar/";                       //path to which images are to be uploaded

$path = $path . basename($_FILES['imgfile']['name']); //create complete 
                                                                            //upload path


if(move_uploaded_file($_FILES['imgfile']['tmp_name'], $path)) //upload file
{
echo "The file has been uploaded";
} 

else                     //if an error occurred
{
echo "There was an error uploading the file, please try again!";
}         
?>