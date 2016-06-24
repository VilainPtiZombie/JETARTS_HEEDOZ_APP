<?php 
	$path = $_SERVER['PHP_SELF']; // $path = /home/httpd/html/index.php
	$file = basename ($path); // index.php
   ?>
<head>
  <meta charset=utf-8 />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo"$file"; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css'>
    <link rel="stylesheet" href="css/style.css">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.js'></script>
      
    <script src="js/index.js"></script>
    <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
</head>

