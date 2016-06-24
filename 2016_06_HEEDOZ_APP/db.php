<?php
$connection = mysql_connect('localhost', 'root', 'root');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('register');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}

// connection base mysql
$dbhost = 'localhost'; // machine, la machine locale s'appelle par convention "localhost"
$dbname = 'register'; // nom de la base de donn�es
$dbuser = 'root'; // nom d'utilisateur base de donn�es
$dbpassword = 'root'; // mot de passe base de donn�es

// on se connecte avec les acces,  IL FAUT QUE LA BASE EXISTE POUR MANIPULER
$dbh = new PDO(
    'mysql:host='. $dbhost .';dbname='. $dbname,
    $dbuser,
    $dbpassword
);
?>