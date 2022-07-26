<?php
require_once('config.php');

//$table = $_POST['table'];
$query = $_POST['query'];
//if ($table == "" || $query == "") {
if ($query == "") {
  send_response(ERROR, "query or table dosen't sent");
}

//die($query);
$stmt = $conn -> prepare($query);
$stmt -> execute();
$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
send_response(DONE, $result);