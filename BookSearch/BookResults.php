<?php
require_once("../Template/Template.php");

$page = new Template("Book Results");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
print "<header class='nav'>";
print "<h1>Book Results</h1>\n";
print "<ul>";
Print "<li><a href='../HomePage/HomePage.php' title='Home Page'>Home Page</a></li>";
print "<li><a href='../AboutUs/AboutUs.php' title='About Us'>About US</a></li>";
print "<li><a href='../ContactUs/ContactUs.php' title='Contact Us'>Contact Us</a></li>";
print "<li><a href='../BookSearch/Books.php' title='Book Search'>Book Search</a></li>";
print "</ul>";
print "</header>";

if (isset($_POST['name']) && isset($_POST['ISBN']) && isset($_POST['author'])){
	//var_dump($_POST['url']);
	$url = $_POST['name'];
	$number = $_POST['ISBN'];
	$address = $_POST['author'];

try {
require_once("generateMappingTable.php");
	var_dump($e);
	
} catch (Exception $e){
	var_dump($e);
}
}
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