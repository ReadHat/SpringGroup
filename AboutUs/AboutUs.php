<?php

require_once("../Template/Template.php");

$page = new Template("AboutUs");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
print "<header class='nav'>";
print "<div class='location'>";
print "<div class='l3'>";
Print "<input type = 'submit' onclick='myFunction()' value='Log On'>";
Print "<input type = 'submit' onclick='myFunction()' value='Log Off'>";
print "</div>";
print "</div>";
print "<h1>About Us</h1>";
print "<ul>";
Print "<li><a href='../HomePage/HomePage.php' title='Home Page'>Home Page</a></li>";
print "<li><a href='../ContactUs/ContactUs.php' title='Contact Us'>Contact Us</a></li>";
print "<li><a href='../BookSearch/Books.php' title='Book Search'>Book Search</a></li>";
print "<li><a href='../ContactData/contactdatapage.php' title='ContactDate'>UserData</a></li>";
print "</ul>";
print "</header>";
Print "<p class='f'>Thank you for your buissness. All email request will be handled as soon as possible. Expect a reply within 48 to 72 hours normal buissness hours monday through friday.</p>";
Print "<p class='e'>Contacts</p>";
Print "<p class='g'>Landrath, Steven</p>";
Print "<p class='h'>The Big Guy</p>";
Print "<p class='g'>Rodriguez, Derek</p>";
Print "<p class='h'>The guy next to the big guy</p>";
Print "<p class='g'>Chen, Yiwen</p>";
Print "<p class='h'>The guy next to the guy, next to the big guy</p>";
print "<footer>";
print "<p>About Us</p>";
print "<p> | </p>";
print "<p> Privacy Policy </p>";
print "<p> | </p>";
print "<p> Terms of Service </p>";
print "<a href = 'https://www.facebook.com/'>";
print "<img src = '../Pictures/facebook.png' alt='facebook'>";
print "</a>";
print "<a href = 'https://twitter.com/?lang=en'>";
print "<img src = '../Pictures/twitter.png' alt='twitter'>";
print "</a>";
print "<a href = 'https://www.instagram.com/?hl=en'>";
print "<img src = '../Pictures/instagram.png' alt='instagram'>";
print "</a>";
print "</footer>";
print $page->getBottomSection();
?>