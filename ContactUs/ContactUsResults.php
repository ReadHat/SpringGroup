<?php

require_once("../Template/Template.php");

require_once("../DB/DB.class.php");



$db = new DB();

$page = new Template("My Page");



$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");

$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");

$page->setTopSection();

$page->setBottomSection();



print $page->getTopSection();

print "<br /><header class='nav'>";

print "<br /><h1>Contact Us Results</h1>";

print "<br /><ul>";

print "<br /><li><a href='../HomePage/HomePage.php' title='Home Page'>Home Page</a></li>";

print "<br /><li><a href='../AboutUs/AboutUs.php' title='About Us'>About US</a></li>";

print "<br /><li><a href='../ContactUs/ContactUs.php' title='Contact Us'>Contact Us</a></li>";

print "<br /><li><a href='../BookSearch/Books.php' title='Book Search'>Book Search</a></li>";

print "<br /></ul>";

print "<br /></header>";


if (
	!(
		isset($_POST['name'])    &&
		isset($_POST['Phone'])   &&
		isset($_POST['Comment']) &&
	 )
) {

	print "<br /><h1>ERROR: Not all form feilds are set server-side. Malformed HTTP POST or other error.</h1>";

	goto: print_footer;	// Don't have time to restructure someone elses code right now... TODO: make a function

}

# do we use isset here frist?

#CHECKING DATABASE STATUS

if (!$db->getConnStatus()){

	print "<p class='f'>An error has occurred while trying connect to database!</p>\n";

}

#INSERTTING DATA

$safe_email = $db->dbEsc($_POST['name']);

if (empty($_POST['Phone'])){

	$safe_phone = $db->dbEsc("null");

}else{

	$safe_phone = $db->dbEsc($_POST['Phone']);

}

$safe_comment = $db->dbEsc($_POST['Comment']);



$query_INSERT = "INSERT INTO contactdata (EmailAddress,PhoneNumber,AdditionalComments) " . 

				"VALUES ('{$safe_email}', '{$safe_phone}', '{$safe_comment}')";

#FINAL RESULTS

print "<br /><p class='f'>Thank you for contacting us, someone will get back to you soon</p>";

print_footer:	// Don't have time to restructure someone elses code right now... TODO: make a function

print "<br /><footer>";

print "<br /><p>Home Page</p>";

print "<br /><p> | </p>";

print "<br /><p> Privacy Policy </p>";

print "<br /><p> | </p>";

print "<br /><p> Terms of Service </p>";

print "<br /><a href = 'https://www.facebook.com/'>";

print "<br /><img src = '../Pictures/facebook.png' alt='facebook'>";

print "<br /></a>";

print "<br /><a href = 'https://twitter.com/?lang=en'>";

print "<br /><img src = '../Pictures/twitter.png' alt='twitter'>";

print "<br /></a>";

print "<br /><a href = 'https://www.instagram.com/?hl=en'>";

print "<br /><img src = '../Pictures/instagram.png' alt='instagram'>";

print "<br /></a>";

print "<br /></footer>";

print $page->getBottomSection();

?>
