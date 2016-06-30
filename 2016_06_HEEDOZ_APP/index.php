<!DOCTYPE html>
<html>
<?php 
  include('header.php');
?>
<body>
<?php include('menu_swipe.php'); ?>

  <h1 class="page_name">HEEDOZ</h1>

  <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
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
        <a href="categories.php">Les offres par catégories</a>
      </li>
      <li>
        <a href="favoris.php">Favoris</a>
      </li>
      <li>
        <a href="index.php">Autour de vous</a>
      </li>
    </ul>
  </div>
<?php include('footer.php'); ?>
