<?php 
$user = "root";
$pass = "root";
$host = "db";
$mysql = new PDO("mysql:host=$host;port=3306;dbname=portfolio2024", $user, $pass);

if(!$mysql){
  echo 'Connection Error';
}
?>