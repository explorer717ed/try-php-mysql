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
  if(!$data['password']) throw new Exception("Need password.", 1);
  if(!$data['name']) throw new Exception("Need name.", 1);
  
  # SQL #
  $stmt = $db->prepare("INSERT INTO Members (username, password, name, oauth_type) VALUES (?,?,?,?)");
  $stmt->bindValue(1, $data['username']);
  $stmt->bindValue(2, $data['password']);
  $stmt->bindValue(3, $data['name']);
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