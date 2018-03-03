<?php

require_once("Template.php");

$page = new Template("My Page");
$page->setHeadSection("<link rel='stylesheet' href='style.css'>");
$page->setHeadSection("<script src='script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
print "<header class='nav'>";
print "<h1>Hulkamania Gym</h1>";
print "<ul>";
print "<li><a href='AboutUs.php' title='About Us'>About US</a></li>";
print "<li><a href='ContactUs.php' title='Contact Us'>Contact Us</a></li>";
print "</ul>";
print "</header>";
print "<footer>";
print "<p>Home Page</p>";
print "<p> | </p>";
print "<p> Privacy Policy </p>";
print "<p> | </p>";
print "<p> Terms of Service </p>";
print "</footer>";
print $page->getBottomSection();
?>