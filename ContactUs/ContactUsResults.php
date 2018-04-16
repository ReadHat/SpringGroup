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

print "\n<header class='nav'>";

print "<h1>Contact Us Results</h1>";

print "<ul>";

print "<li><a href='../HomePage/HomePage.php' title='Home Page'>Home Page</a></li>";

print "<li><a href='../AboutUs/AboutUs.php' title='About Us'>About US</a></li>";

print "<li><a href='../ContactUs/ContactUs.php' title='Contact Us'>Contact Us</a></li>";

print "<li><a href='../BookSearch/Books.php' title='Book Search'>Book Search</a></li>";

print "</ul>";

print "</header>";

#ENSURE FORM FIELDS ARE SET

if (
	!isset($_POST['name'])    ||
	!isset($_POST['Phone'])   ||
	!isset($_POST['Comment'])
) {

	print "\n<h1 class='f'>ERROR: Not all form fields are set server-side. Malformed HTTP request or other error.</h1>";

	goto print_footer;	// Don't have time to restructure someone elses code right now... TODO: make a function

}

#ENSURE NECESSARY FIELDS ARE NOT EMPTY

// TODO: find a less shitty name
$bad_empty = false;

if(empty($_POST['name'])) {

	$bad_empty = true;

	$empty_error_message += "\nEmail field cannot be empty.";
}

if($bad_empty) {

	print "\n<h1 class='f'>The following fields are required for submission. Please fill them in:</h1>" .

		// TODO: Figure out what class this should be so the CSS works...
		"\n<p>" . $empty_error_message  . "</p>";

}

#CHECKING DATABASE STATUS

if (!$db->getConnStatus()){

	print "\n<p class='f'>An error has occurred while trying connect to database!</p>";

	goto print_footer;
}

#INSERTTING DATA

$safe_email = $db->dbEsc($_POST['name']);

if (empty($_POST['Phone'])){

	$safe_phone = $db->dbEsc("null");

}else{

	$safe_phone = $db->dbEsc($_POST['Phone']);

}

$safe_comment = $db->dbEsc($_POST['Comment']);

$query_INSERT = "INSERT INTO contactdata VALUES (null, '{$safe_email}', '{$safe_phone}', '{$safe_comment}');";

$db->dbCall($query_INSERT); #insert satement

#FINAL RESULTS

print "\n<p class='f'>Thank you for contacting us, someone will get back to you soon</p>";

print_footer:	// Don't have time to restructure someone elses code right now... TODO: make a function

print "\n<footer>";

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
