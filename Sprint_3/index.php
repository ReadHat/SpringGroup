<?php
require_once("Template.php");

$page = new Template("Lab 4");
$page->setHeadSection("");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
print "<form method='POST' action='client.php'>Username: <input type='text' name='usr'><br><br>\n";
print "Password: <input type='password' name='passwd'><br><br>\n";
print "<input type='submit' name='Log in'>\n";
print "</form>\n";
print $page->getBottomSection();
?>