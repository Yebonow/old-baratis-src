<?php
$dsn = "mysql:host=mysql0.serv00.com;dbname=m2210_baratisDB";
$username = "m2210_baratisDB";
$password = "UC*yAQ1]Q3o9K5y2MAcY:b4Bn.WKi3";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$dbh = new PDO($dsn, $username, $password, $options);
?>