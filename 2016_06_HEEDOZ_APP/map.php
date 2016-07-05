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
    <div id='listings' class='listings'></div>

  <div id='map' class='map'> </div>
  <a href='#' id='geolocate' class='ui-button'>Find me</a>


  
<?php 
  include('footer.php');
?>