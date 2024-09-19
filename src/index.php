<?php
require 'connectDB.php';



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
  <?php echo "<h1> $slogan </h1>"; ?>
  <ul>
    <li><a href="/review.php" class="text-blue-700 underline">REVIEW</a></li>
    <li><a href="/pdo.php" class="text-blue-700 underline">PDO</a></li>
  </ul>

</body>
</html>