<?php

require_once("main_include.php");

$my_file = [];

$my_file = file("{$PATH_}/db-creds.json");

$creds = json_decode($my_file[0]);

define("MUSER", $creds->username);
define("MPASS", $creds->password);
define("MSERVER", $creds->server);
define("MDB", $creds->db);


if (basename($_SERVER['PHP_SELF']) == "const.php") {
  die(header("HTTP/1.0 404 Not Found"));
}

?>
