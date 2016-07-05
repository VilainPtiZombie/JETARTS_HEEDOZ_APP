$(function(){
  $("[data-toggle]").click(function(){
    var toggle_el = $(this).data("toggle");
    $(toggle_el).toggleClass("open-sidebar");
  });
  $(".main-content").swipe({
    swipeStatus: function(event, phase, direction, distance, duration, fingers){
      if (phase == "move" && direction == "right"){
        $(".container").addClass("open-sidebar");
        $("#sidebar").fadeIn().addClass("shadow_sb");
        return false;
      }
      if (phase == "move" && direction == "left"){
        $(".container").removeClass("open-sidebar");
        $("#sidebar").fadeOut().removeClass("shadow_sb");
        return false;
      }
    }
  });
});