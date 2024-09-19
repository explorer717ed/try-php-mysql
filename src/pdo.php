<?php
require 'connectDB.php';

$title = "PDO";
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
  <?php echo "<h1> $title </h1>"; ?>
  <h2>fetch</h2>
  <?php
    $sql = "SELECT * FROM works";
    $stmt = $db->query($sql);
    // fetch one row at a time. more query
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  ?>
    <p><?php print_r($row) ?></p>
  <?php } ?>

  <h2>fetchAll</h2>
  <?php
    $stmt = $db->query($sql);
    // fetch all rows. consume more memory
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($res as $row2){
  ?>
    <p><?php print_r($row2) ?></p>
  <?php } ?>

  <h2>prepare</h2>
  <?php
    $workId = 1;
    $workIdTitle = 'Kronos_Research';
    // use ? --- number OR use :id --- ':id'
    $stmt = $db->prepare("SELECT * FROM works WHERE id = :id && idTitle = :idTitle");
    $stmt->bindValue(':id', $workId);
    $stmt->bindValue(':idTitle', $workIdTitle);
    $stmt->execute();
    // fetch one row at a time. more query
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  ?>
    <p><?php print_r($row) ?></p>
  <?php } ?>
  
  ?>

</body>
</html>