<?php

require '../../connectDB.php';
require '../../core/httpHeader.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$is_success = true;
$msg = "";
$rsp = [];

try {
  # validation #
  if(is_null($data)) throw new Exception("Need request body.", 1);
  if(!$data['username']) throw new Exception("Need username.", 1);
  if (!filter_var($data['username'], FILTER_VALIDATE_EMAIL)) throw new Exception("Wrong username (email) format.", 1);
  if(!$data['password']) throw new Exception("Need password.", 1);
  if(!preg_match("/^(?=.*\d)(?=.*[a-zA-Z]).{8,}$/", $data['password'])) throw new Exception("Wrong password format.", 1);
  if(!$data['name']) throw new Exception("Need name.", 1);
  if (!filter_var($data['username'], FILTER_VALIDATE_EMAIL)) throw new Exception("Invalid email format.", 1);
  
  # Sanitize & Hash #
  // Q: Do I need 'htmlspecialchars' when I'm using JSON api...?
  $username = htmlspecialchars($data['username']);
  $password = password_hash($data['password'], PASSWORD_DEFAULT);
  $name = htmlspecialchars($data['name']);

  # SQL #
  $stmt = $db->prepare("INSERT INTO Members (username, password, name, oauth_type) VALUES (?,?,?,?)");
  $stmt->bindValue(1, $username);
  $stmt->bindValue(2, $password);
  $stmt->bindValue(3, $name);
  $stmt->bindValue(4, "manual");
  
  $stmt->execute();
  $rsp['id'] = $db->lastInsertId();

} catch (\Throwable $th) {
  $msg = $th->getMessage();
  $is_success = false;
}

echo json_encode(array(
  "success" => $is_success,
  "message" => $msg,
  "payload" => $rsp
));

?>