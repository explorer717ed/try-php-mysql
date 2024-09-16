<?php
require 'connectDB.php';

$mysql = new mysqli("db", "root", "root", "portfolio2024");

$sql = "SELECT * FROM works";

// if($result = $mysql->query($sql)){
//   while($data = $result->fetch_object()){
//     $works[] = $data;
//   }
// }

// foreach ($works as $work) {
//   echo "<br>";
//   echo $work->title . " " . $work->projectType;
//   echo "<br>";
// }


#### STRING ####
$title = "Frontal Lobe";

$slogan = "hello from \"dockereerer phppp myyyysql\""; //double quote and escape

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <?php require('header.php') ?>
  <?php 
    echo "<h1> $slogan </h1>";
  ?>
  <a href="/review.php">REVIEW</a>
</body>
</html>