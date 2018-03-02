<?php
require_once("Template.php");

print "<link rel='stylesheet' href='style.css'>";
//var_dump($_GET);
if (isset($_POST['name'])) {
	print "<h1>Thank you for contacting us, someone will get back to you soon</h1>";
}

?>