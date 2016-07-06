      </div>
    </div>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>    
    <script type="text/javascript" src='http://cdn.strategiqcommerce.com/ajax/libs/jquery.touchswipe/1.5.1/jquery.touchswipe.min.js'></script>
        <script type="text/javascript" src="js/swipe.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.js'></script>
    <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="js/index.js"></script>
        <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mocha/1.13.0/mocha.min.js"></script>
<?php include_once("analyticstracking.php") ?>

       
    <script>
      mocha.setup('bdd');
      var exports = null;
      function assert(expr, msg) {
        if (!expr) throw new Error(msg || 'failed');
      }
    </script>
  </body>
</html>