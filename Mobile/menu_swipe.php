    <script type="text/javascript">
      $(window).load(function(){
        $("[data-toggle]").click(function() {
          var toggle_el = $(this).data("toggle");
          $(toggle_el).toggleClass("open-sidebar");
        });
         $(".swipe-area").swipe({
              swipeStatus:function(event, phase, direction, distance, duration, fingers)
                  {
                      if (phase=="move" && direction =="right") {
                           $(".container_nav").addClass("open-sidebar");
                           return false;
                      }
                      if (phase=="move" && direction =="left") {
                           $(".container_nav").removeClass("open-sidebar");
                           return false;
                      }
                  }
          }); 
      });
      
    </script>

    <div class="container_nav">
      <div id="sidebar">
          <ul>
              <li>
              <a href="#"><img src="img/profil.png">Mon Profil</a>
              </li>
              <li>
              <a href="#"><img src="img/profil.png">Explorer</a>
              </li>
              <li>
              <a href="#"><img src="img/profil.png">Catégories</a>
              </li>
              <li>
              <a href="#"><img src="img/profil.png">Paramètres</a>
              </li>
              <li>
              <a href="#"><img src="img/profil.png">Effacer la mémoire cache</a>
              </li>
              <li>
              <a href="#"><img src="img/profil.png">Déconnexion</a>
              </li>
          </ul>
      </div>
      <div class="main-content">
          <div class="swipe-area">
