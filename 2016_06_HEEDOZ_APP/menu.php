<!DOCTYPE html>
<html>
<?php 
include('header.php');
?>
<body>
  
  <h1 class="page_name">HEEDOZ</h1>

  <body>
    <div class="cbp-spmenu-push">
    
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <div class="menu_icon">
        <img src="img/profil.png" style="width:30%">
        <a href="profil.php">Mon Profil</a>
      </div>
      <div class="menu_icon">
        <img src="img/profil.png" style="width:30%">
        <a href="explore.php">Explorer</a>
      </div>
      <div class="menu_icon">
        <img src="img/profil.png" style="width:30%">
        <a href="categories.php">Catégories</a>
      </div>
      <div class="menu_icon">
        <img src="img/profil.png" style="width:30%">
        <a href="parametre.php">Paramètres</a>
      </div>
      <div class="menu_icon">
        <img src="img/profil.png" style="width:30%">
        <a href="#">Effacer la mémoire cache</a>
      </div>
      <div class="menu_icon">
        <img src="img/profil.png" style="width:30%">
        <a href="logout.php">Déconnexion</a>
      </div> 
    </nav>
      
    <div>
      
      <div class="button_menu">
        <section>
          <!-- Class "cbp-spmenu-open" gets applied to menu -->
          <button id="showLeft">Menu</button>
        </section>
      </div>
    </div>
    </div>

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
        Les offres par catégories
      </li>
      <li>
        Favoris
      </li>
      <li>
        Autour de vous
      </li>
    </ul>
  </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.js'></script>
<script src="js/classie.js"></script>
    <script>
      var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        menuRight = document.getElementById( 'cbp-spmenu-s2' ),
        menuTop = document.getElementById( 'cbp-spmenu-s3' ),
        menuBottom = document.getElementById( 'cbp-spmenu-s4' ),
        showLeft = document.getElementById( 'showLeft' ),
        showRight = document.getElementById( 'showRight' ),
        showTop = document.getElementById( 'showTop' ),
        showBottom = document.getElementById( 'showBottom' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        showRightPush = document.getElementById( 'showRightPush' ),
        body = document.body;

      showLeft.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeft' );
      };
      showRight.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuRight, 'cbp-spmenu-open' );
        disableOther( 'showRight' );
      };
      showTop.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuTop, 'cbp-spmenu-open' );
        disableOther( 'showTop' );
      };
      showBottom.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuBottom, 'cbp-spmenu-open' );
        disableOther( 'showBottom' );
      };
      showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
      };
      showRightPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toleft' );
        classie.toggle( menuRight, 'cbp-spmenu-open' );
        disableOther( 'showRightPush' );
      };

      function disableOther( button ) {
        if( button !== 'showLeft' ) {
          classie.toggle( showLeft, 'disabled' );
        }
        if( button !== 'showRight' ) {
          classie.toggle( showRight, 'disabled' );
        }
        if( button !== 'showTop' ) {
          classie.toggle( showTop, 'disabled' );
        }
        if( button !== 'showBottom' ) {
          classie.toggle( showBottom, 'disabled' );
        }
        if( button !== 'showLeftPush' ) {
          classie.toggle( showLeftPush, 'disabled' );
        }
        if( button !== 'showRightPush' ) {
          classie.toggle( showRightPush, 'disabled' );
        }
      }
    </script>
  
<script src="js/index.js"></script>

</body>
</html>
