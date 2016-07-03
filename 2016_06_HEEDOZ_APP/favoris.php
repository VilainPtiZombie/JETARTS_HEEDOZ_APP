<!DOCTYPE html>
<html>
<?php 
include('header.php');
?>
<body>

<a class="arrow-wrap" href="#">
  <img class="arrow" src="img/chevron_favoris.png"></img>
</a>

  <div class="back_map back_categories">
    <a href="#"><img src="img/fleche_retour-02.png"></a>
    <h1 class="page_categories">Favoris</h1>
  </div>
  <div class="search_icon">
    <img src="img/search_favoris.png">
  </div>

  <div class="border_sample">
    <div class="sample">
      <img id="sample_logo" src="img/logo_pimkie.png">
      <p id="timer_offre_favoris">Fin de l'offre dans 14 min !</p>
      <img class="sample_icon_timer" src="img/sablier_white.png" style="width: 13%;">
      <p id="sample_montant"">8€ de réduction dès 30% d'achat !</p>
    </div>
    <div class="link_infos">
      <a href="#" class="more_infos">Plus d'informations</a>
    </div>
  </div>


  <div class="border_sample">
    <div class="sample">
      <img id="sample_logo" src="img/logo_pimkie.png">
      <p id="timer_offre_favoris">Fin de l'offre dans 14 min !</p>
      <img class="sample_icon_timer" src="img/sablier_white.png" style="width: 13%;">
      <p id="sample_montant"">8€ de réduction dès 30% d'achat !</p>
    </div>
    <div class="link_infos">
      <a href="#" class="more_infos">Plus d'informations</a>
    </div>
  </div>

  <div class="border_sample">
    <div class="sample">
      <img id="sample_logo" src="img/logo_pimkie.png">
      <p id="timer_offre_favoris">Fin de l'offre dans 14 min !</p>
      <img class="sample_icon_timer" src="img/sablier_white.png" style="width: 13%;">
      <p id="sample_montant"">8€ de réduction dès 30% d'achat !</p>
    </div>
    <div class="link_infos">
      <a href="#" class="more_infos">Plus d'informations</a>
    </div>
  </div>

  <div class="border_sample">
    <div class="sample">
      <img id="sample_logo" src="img/logo_pimkie.png">
      <p id="timer_offre_favoris">Fin de l'offre dans 14 min !</p>
      <img class="sample_icon_timer" src="img/sablier_white.png" style="width: 13%;">
      <p id="sample_montant"">8€ de réduction dès 30% d'achat !</p>
    </div>
    <div class="link_infos">
      <a href="#" class="more_infos">Plus d'informations</a>
    </div>
  </div>

  <div class="border_sample">
    <div class="sample">
      <img id="sample_logo" src="img/logo_pimkie.png">
      <p id="timer_offre_favoris">Fin de l'offre dans 14 min !</p>
      <img class="sample_icon_timer" src="img/sablier_white.png" style="width: 13%;">
      <p id="sample_montant"">8€ de réduction dès 30% d'achat !</p>
    </div>
    <div class="link_infos">
      <a href="#" class="more_infos">Plus d'informations</a>
    </div>
  </div>



<script>
  //this is where we apply opacity to the arrow
  $(window).scroll( function(){

    //get scroll position
    var topWindow = $(window).scrollTop();
    //multipl by 1.5 so the arrow will become transparent half-way up the page
    var topWindow = topWindow * 1;

    //get height of window
    var windowHeight = $(window).height();

    //set position as percentage of how far the user has scrolled
    var position = topWindow / windowHeight;
    //invert the percentage
    position = 1 - position;

    //define arrow opacity as based on how far up the page the user has scrolled
    //no scrolling = 1, half-way up the page = 0
    $('.arrow-wrap').css('opacity', position);

  });

</script>
<script src="js/index.js"></script>

</body>
</html>
