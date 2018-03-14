<?php

require_once("../Template/Template.php");

$page = new Template("HomePage");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
print "<header class='nav'>";
print "<div class='location'>";
print "<div class='l3'><form id='frmSearch' class='search2' method='get' action='default.html'>";
print "<input id='txtSearch' type='text' name='serach_bar' size='31' maxlength='255' value='Search' style='width: 225px; height: 10px;'/>";
print "<input type='hidden' name='sitesearch' value='gymHomePage.html'/></form>";
print "</div>";
print "</div>";
print "<h1>Discover Books</h1>\n";
print "<ul>";
print "<li><a href='../AboutUs/AboutUs.php' title='About Us'>About US</a></li>";
print "<li><a href='../ContactUs/ContactUs.php' title='Contact Us'>Contact Us</a></li>";
print "<li><a href='../BookSearch/Books.php' title='Book Search'>Book Search</a></li>";
print "</ul>";
print "</header>";
print "<footer>";
print "<p>Home Page</p>";
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