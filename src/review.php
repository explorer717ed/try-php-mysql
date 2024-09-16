<?php
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
$slogan = 'hello from "dockereerer phppp myyyysql"'; // single quote
$slogan[4]; // o
strlen($slogan); // string length
strtoupper($slogan); //uppercase
str_replace('e', '_', $slogan);

#### INTEGER & FLOAT ####
$r = 10;
$pi = 3.14;

$pi * $r**2; // ** is square and no space.

$pi * $r * 2; // times two~

//echo $r++; // echo $r first, and then increment by 1.

ceil($pi);
floor($pi);
pi(); // Return precies PI

#### Array(indexd) ####
$people = ['717','7214','7321'];
$people = array('717','7214','7321');

$people[1] = '8216';
$people[] = '7428';
array_push($people, '7535');
$people = array_merge($people, ['7642','7749']);

#### Array(associated) ####
$data = [ 'name' => '717', 'age' => 45 ];
$data['occupation'] = "Mage";

$list = [
  [ 'name' => '717', 'age' => 14 ],
  [ 'name' => '7214', 'age' => 21 ]
];
$list[] = [ 'name'=>'7321', 'age => 28'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
</head>
<body>
  <?php 
    echo "<p> $people[2] </p>";
    print_r($people);
    echo "<br><br>";
    echo count($people);
    echo "<br><br>";
    print_r(array_pop($list));
    echo "<br><br>";
    print_r($list);
    // echo $data['name'];
  ?>
  <h2>For</h2>
  <?php
    for ($i=0; $i < count($list); $i++) { 
      print_r("<p> {$list[$i]['name']} </p>");
    }
    $i = 0;
    while($i < count($list)){
      print_r($list[$i]);
      $i ++;
    }
  ?>
  <ol>
    <?php foreach($list as $item){ ?>
      <li>
        <?php echo $item['name'] ?>
        -
        <?php if($item['age'] >= 18) echo "<small>" ?>
          <?php echo $item['age'] ?>
        <?php if($item['age'] >= 18) echo "</small>" ?>
      </li>
    <?php } ?>

  </ol>
    
  <h2>Boolean</h2>
  <?php
    echo 'a' < 'b'; // true: alphabetical order
    echo '5' === 5;
  ?>

  <h2>Function</h2>
  <?php
    $haha = "haha";
    function sayHello($name = "there"){
      global $haha; // when using global variable in a function, otherwise php only use local variables.
      $haha = "hehe"; // will change the value of global variable
      echo "hello $name $haha!";
    }
    sayHello($haha); // invoke the function
  ?>
  <p><?php sayHello(717) ?></p>
  <?php
    $prefix = "me";
    function globalHello(&$globalName = "Sir/Madam"){
      $globalName = "you";
      return "Hey $globalName.";
    }
    echo globalHello($prefix);
    echo $prefix;
  ?>
</body>
</html>