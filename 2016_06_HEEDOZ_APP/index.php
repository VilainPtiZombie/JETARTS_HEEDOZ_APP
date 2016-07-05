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
            <h1 class="page_profil">heedoz</h1>
        </div>
  
    <div class="swipe_indice">
    <img src="img/icone_swipe.png">
  </div>

  <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active">
        </li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="active item"></div>
        <div class="item"></div>
        <div class="item"></div>
    </div>
   
  </div>



  <div class="explore">
    <ul>
      <li>
        <a href="categories.php">
        <img src="img/categories.png" style="width:10%">
        Les offres par catégories</a>
      </li>
      <li>
        <a href="favoris.php">
        <img src="img/favoris.png" style="width:10%">
        Favoris</a>
      </li>
      <li>
        <a href="map.php">
        <img src="img/autour.png" style="width:10%">
        Autour de vous</a>
      </li>
    </ul>
  </div>

<?php include('footer.php'); ?>
