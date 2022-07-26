<?php
if ($_SERVER["SERVER_NAME"] === "localhost" || $_SERVER["SERVER_NAME"] === "127.0.0.1") {
  $database_type = "mysql";
  $server_name = "localhost";
  $database_name = "CV";
  $username = "saleh";
  $password = "";
} else {
  $database_type = "mysql";
  $server_name = "sql207.gigfa.com";
  $database_name = "gigfa_28951606_cv";
  $username = "gigfa_28951606";
  $password = "saleh9731";
}
set_root();




function set_root() {
  if ($_SERVER["SERVER_NAME"] === "localhost" || $_SERVER["SERVER_NAME"] === "127.0.0.1") {
    // ROOT: localhost:8080/dir1/dir2/
    // or
    // ROOT: 127.0.0.1:8080/dir1/dir2/
    $root = $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]);
  } else {
    // ROOT: http(s)://example.com/dir1/dir2/
    $root = $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]);
  }
  $root = explode('/', $root);
  // come back one directory
  array_pop($root);
  $r = '';
  foreach ($root as $dir) {
    $r .= $dir . '/';
  }
  define("ROOT", $r);
}


define("DONE", "success");
define("WARN", "warn");
define("FAILED", "failed");
define("ERROR", "error");

function send_response($response_status, $response_message) {
  $RESPONSE = [];
  $RESPONSE["status"] = $response_status;
  $RESPONSE["message"] = $response_message;
  die(json_encode($RESPONSE));
}

$conn = connect_to_database($database_type, $server_name, $database_name, $username, $password);
function connect_to_database($database_type, $server_name, $database_name, $username, $password) {
  try {
    $conn = new PDO("$database_type:host=$server_name;dbname=$database_name", $username, $password);
    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    return $conn;
  } catch(PDOException $e) {
    return "Connection failed: " . $e -> getMessage();
  }
}

function debug_r($input) {
  echo '<pre style="color:red;">'; print_r($input); echo '</pre>';
}
function debug_dump($input) {
  echo '<pre style="color:red;">'; var_dump($input); echo '</pre>';
}

function array_remove_item($array, $key) {
  $new_arr = array();
  foreach ($array as $k => $value) {
    if ($k != $key) array_push($new_arr, $value);
  }
  return $new_arr;
}