</main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mocha/1.13.0/mocha.min.js"></script>
    <script>
      mocha.setup('bdd');
      var exports = null;
      function assert(expr, msg) {
        if (!expr) throw new Error(msg || 'failed');
      }
    </script>
    <script src="js/dist/slideout.js"></script>
    <script src="swipe/test.js"></script>
    <script>
      window.onload = function() {
        document.querySelector('.js-slideout-toggle').addEventListener('click', function() {
          slideout.toggle();
        });

        document.querySelector('.menu').addEventListener('click', function(eve) {
          if (eve.target.nodeName === 'A') { slideout.close(); }
        });

        var runner = mocha.run();
      };

      

$( ".admin-text" ).on( "click", function()
{
    $( ".menu_promo" ).stop().fadeToggle( "fast" );
});
    </script>
  </body>
</html>