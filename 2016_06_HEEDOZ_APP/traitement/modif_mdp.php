<?php // script de traitement ajout de promo commerçant
  //INPORT SETTINGS
  include('../config.php');
  include('../db.php');
  include('../auth.php');



if (!(isset($_SESSION['username']) || $_SESSION['username'] == '')) {
    header("location:login.php");
}

$dbcon = mysqli_connect('localhost', 'root', 'root', 'register') or die(mysqli_error($dbcon));

$password1 = mysqli_real_escape_string($dbcon, md5($_POST['mdp']));
$password2 = mysqli_real_escape_string($dbcon, md5($_POST['mdpConfirm']));
$username = mysqli_real_escape_string($dbcon, $_SESSION['username']);

if ($password1 <> $password2) { echo "Your passwords do not match.";}

else if (mysqli_query($dbcon, "UPDATE users SET password='$password1' WHERE username='$username'"))
    {header('Location: ../login.php');
    }

else { mysqli_error($dbcon); }

mysqli_close($dbcon);

?>









