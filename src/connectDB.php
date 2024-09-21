<?php 
$user = "root";
$pass = "root";
$host = "db"; // docker container name 
try {
  $db = new PDO("mysql:host=$host;port=3306;dbname=demo_totara", $user, $pass);
  // var_dump($db); // see if db connect success
} catch (PDOException $e) {
  echo "(´⊙ω⊙`) db error: " . $e->getMessage();
}

?>