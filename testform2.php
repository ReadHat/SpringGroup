<?php
require_once("Template.php");

$page = new Template("My Page");
$page->setHeadSection("<link rel='stylesheet' href='style.css'>");
$page->setHeadSection("<script src='script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
print "<header class='nav'>";
print "<h1>Book Results</h1>\n";
print "<ul>";
print "<li><a href='AboutUs.php' title='About Us'>About US</a></li>";
print "<li><a href='ContactUs.php' title='Contact Us'>Contact Us</a></li>";
print "</ul>";
print "</header>";

if (isset($_POST['name'])) {
	print "<h1>Thank you for contacting us, someone will get back to you soon</h1>";
}
print "<footer>";
print "<p>Home Page</p>";
print "<p> | </p>";
print "<p> Privacy Policy </p>";
print "<p> | </p>";
print "<p> Terms of Service </p>";
print "</footer>";
print $page->getBottomSection();
?>