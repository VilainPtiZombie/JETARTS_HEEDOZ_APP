<?php
  include('db.php');
  session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    $username = stripslashes($username);
    $username = mysql_real_escape_string($username);
    $password = stripslashes($password);
    $password = mysql_real_escape_string($password);
  //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
    $result = mysql_query($query) or die(mysql_error());
    $rows = mysql_num_rows($result);
        if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php"); // Redirect user to index.php
            }else{
        echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<!DOCTYPE html>
<html>
<?php 
include('header.php');
?>
<body>
  
  <h1 class="page_name">HEEDOZ</h1>
      <div class="logmod">
  <div class="logmod__wrapper">
      <div class="logmod__container">
      <ul class="logmod__tabs">
        <li data-tabtar="lgm-2"><a href="#">Créer un compte</a></li>
        <li data-tabtar="lgm-1"><a href="#">S'identifier</a></li>
      </ul>
      <!-- Fin de la tab/menu -->
      
      <!-- Form Login -->
      <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">
        <form action="" method="post" name="login">
          <div class="login__row">
            <img src="img/profil.png" style="width:7%">
            <input type="text" name="username" class="login__input name" placeholder="Pseudo"/>
          </div>
          <div class="login__row">
            <img src="img/password.png" style="width:5%">
            <input type="password" name="password" class="login__input pass" placeholder="Mot de passe"/>
          </div>
                  <input class="btn" name="submit" type="submit" value="Login" />
        </form>
      <div class="connect">
        <p class="login__signup">
          <a href="explore.php">Passer cette étape</a>
        </p>
        <a href="#">Terms and conditions</a>
      </div>
      </div>


      <!-- Form Inscription -->
      <form name="registration" action="traitement/registration.php" method="post">
        <div class="logmod__tab lgm-2">
          <div class="login__form">
          <div class="login__row">
            <img src="img/profil.png" style="width:7%">
            <input type="text" name="username" class="login__input name" placeholder="Pseudo"/>
          </div>
          <div class="login__row">
            <img src="img/mail.png" style="width:7%">
            <input type="text" name="email" class="login__input mail" placeholder="Mail"/>
          </div>
          <div class="login__row">
            <img src="img/password.png" style="width:5%">
            <input type="password" name="password" class="login__input pass" placeholder="Password"/>
          </div>
        </div>
          <input class="btn" name="submit" type="submit" value="Inscription" />
      </form>
      <div class="connect">
        <p class="login__signup">
          <a href="explore.php">Passer cette étape</a>
        </p>
        <a href="#">Terms and conditions</a>
      </div>
          </div>
      </div>
    </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.js'></script>
  
<script src="js/index.js"></script>
<?php } ?>
</body>
</html>
