<?php

echo "hello from dockererererer";

$mysql = new mysqli("db", "root", "root", "protfolio2024");

$sql = "SELECT * FROM works";

if($result = $mysql->query($sql)){
  while($data = $result->fetch_object()){
    $works[] = $data;
  }
}

foreach ($works as $work) {
  echo "<br>";
  echo $work->title . " " . $work->projectType;
  echo "<br>";
}

?>