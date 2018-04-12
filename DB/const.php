<?php

require_once("db-creds.php");

define("MUSER", $_username_);
define("MPASS", $_password_);
define("MSERVER", $_server_);
define("MDB", $_db_);

if (basename($_SERVER['PHP_SELF']) == "const.php") {
  die(header("HTTP/1.0 404 Not Found"));
}

?>
