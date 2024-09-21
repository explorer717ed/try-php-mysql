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

  # SQL #
  $stmt = $db->prepare("SELECT COUNT(id) AS count FROM Members WHERE username = ?");
  $stmt->bindValue(1, $data['username']);
  $stmt->execute();

  $count = $stmt->fetch(PDO::FETCH_ASSOC);
  $rsp['is_unique'] = $count['count'] == 0;
  
  $stmt->close();

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