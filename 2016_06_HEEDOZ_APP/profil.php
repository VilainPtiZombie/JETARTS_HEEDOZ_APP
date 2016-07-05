<?php 
  include('auth.php');
?>
<!DOCTYPE html>
<html>
<?php 
include('header.php');
?>
<body>
  <?php 
  include('menu.php');
?>
  <div class="back_map">
        <a href="index.php"><img src="img/fleche_retour-02.png"></a>
          <h1 class="page_profil"  style="color: #fff;background-color: #ea384d;font-size: 17px; height: 49px; padding-top: 15px; margin-bottom: 0px;">heedoz</h1>
      </div>

  <div class="profil_infos">
    <p>
      Samantha Jones
    </p>
    <img class="avatar" src="img/photo_profil.jpg" style="width:22%">
    <img id="settings" src="img/settings_white.png" style="width:4%">
    <a href="modif_Profil.php">modifier</a>
  </div>

  <div class="historique">
    <h2>Historique de mes achats</h2>
    <ul class="timeline">
        <li class="event">
          <h3>Jeudi 9 Juin 2016</h3>
          <p class="article">FNAC paris 17ème - Offre -50 % sur les cables HDMI / micro HDMI pour tablette & smartphone 1.5m</p>
          <p class="price">3,50€</p>
        </li>
        <li class="event">
          <h3>Jeudi 9 Juin 2016</h3>
          <p class="article">FNAC paris 17ème - Offre -50 % sur les cables HDMI / micro HDMI pour tablette & smartphone 1.5m</p>
          <p class="price">3,50€</p>
        </li>
        <li class="event">
          <h3>Jeudi 9 Juin 2016</h3>
          <p class="article">FNAC paris 17ème - Offre -50 % sur les cables HDMI / micro HDMI pour tablette & smartphone 1.5m</p>
          <p class="price">3,50€</p>
        </li>
        <li class="event">
          <h3>Jeudi 9 Juin 2016</h3>
          <p class="article">FNAC paris 17ème - Offre -50 % sur les cables HDMI / micro HDMI pour tablette & smartphone 1.5m</p>
          <p class="price">3,50€</p>
        </li>
        <li class="event">
           <h3>Jeudi 9 Juin 2016</h3>
           <p class="article">FNAC paris 17ème - Offre -50 % sur les cables HDMI / micro HDMI pour tablette & smartphone 1.5m</p>
           <p class="price">3,50€</p>
        </li>
      </ul>
  </div>

<?php 
  include('footer.php');
?>