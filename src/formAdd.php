<?php
$inputVal = [
  "title" => "",
  "projectType" => "",
  "projectScope" => "",
  "imgUrl" => "",
];

$validErr = ["title" => ""];

if(isset($_POST['addWork'])){
  
  $inputVal['title'] = htmlspecialchars($_POST['title']);
  $inputVal['projectType'] = htmlspecialchars($_POST['projectType']);
  $inputVal['projectScope'] = htmlspecialchars($_POST['projectScope']);
  $inputVal['imgUrl'] = htmlspecialchars($_POST['imgUrl']);

  ### POST CHECK ###
  if(empty($_POST['title'])){
    $validErr['title'] = 'YOURE TITLE MISSING';
  }

  if(array_filter($validErr)){ // Loop Array. Default value to be loose true.

  }else{
    // $inputVal = [
    //   "title" => "",
    //   "projectType" => "",
    //   "projectScope" => "",
    //   "imgUrl" => "",
    // ];
  }
  ### (END) POST CHECK ###
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Work</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <?php require('header.php') ?>
  
  <section class="m-4 max-w-md m-auto">
    <h2>FORM</h2>
    <form action="formAdd.php" method="POST">
      
      <div>
        <label for="title" class="block text-gray-900">Title:</label>
        <input type="text" name="title" value="<?php echo $inputVal['title'] ?>" class="block bg-slate-100 w-full flex-1 border-0 ring-1 ring-gray-300 py-1.5 rounded pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0">
        <?php if($validErr['title']) echo "<p class='text-red-500'>{$validErr['title']}</p>"; ?>
      </div>
      <div>
        <label for="projectType" class="block text-gray-900">Project Type:</label>
        <select name="projectType" id="projectType" value="<?php echo $inputVal['projectType'] ?>" class="block bg-slate-100 w-full flex-1 border-0 ring-1 ring-gray-300 py-1.5 rounded pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0">
          <option value="Freelance">Freelance</option>
          <option value="Blueplanet Inc.">Blueplanet Inc.</option>
          <option value="Master Degree">Master Degree</option>
        </select>
      </div>
      <div>
        <label for="projectScope" class="block text-gray-900">Project Scope:</label>
        <select name="projectScope" id="projectScope" value="<?php echo $inputVal['projectScope'] ?>" class="block bg-slate-100 w-full flex-1 border-0 ring-1 ring-gray-300 py-1.5 rounded pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0">
          <option value="Front-end">Front-end</option>
          <option value="UX">UX</option>
        </select>
      </div>
      <div>
        <label for="imgUrl" class="block text-gray-900">Image Url:</label>
        <input type="text" name="imgUrl" value="<?php echo $inputVal['imgUrl'] ?>" class="block bg-slate-100 w-full flex-1 border-0 ring-1 ring-gray-300 py-1.5 rounded pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0">
      </div>
      <div class="text-center">
        <button type="submit" name="addWork" class="border-0 ring-1 ring-gray-300 p-1.5 mt-5 rounded">Submit</button>
      </div>
    </form>
  </section>
</body>
</html>
