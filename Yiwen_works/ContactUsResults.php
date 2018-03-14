<?php
require_once("../Template/Template.php");
require_once("../BookSearch/DB.class.php");

$db = new DB();
$page = new Template("My Page");

$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
print "<header class='nav'>";
print "<h1>Contact Us Results</h1>\n";
print "<ul>";
print "<li><a href='HomePage' title='Home Page'>Home Page</a></li>";
print "<li><a href='AboutUs.php' title='About Us'>About US</a></li>";
print "<li><a href='ContactUs.php' title='Contact Us'>Contact Us</a></li>";
print "<li><a href='../BookSearch/Books.php' title='Book Search'>Book Search</a></li>";
print "</ul>";
print "</header>";

#if (isset($_POST['name'])) {
#	print "<h1>Thank you for contacting us, someone will get back to you soon</h1>";
#}
# do we use isset here frist?
#CHECKING DATABASE STATUS
if (!$db->getConnStatus()){
	print "<h1>An error has occurred while trying connect to database!</h1>\n";
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
		 
#CHECKING DATA THAT SHOULD NOT CONTAIN AT DATABASE

$query_CHECK = "SELECT EmailAddress FROM contactdata";

$result = $db->dbCall($query_CHECK);
$exist = false;

foreach($result as $email){
	if ($email['EmailAddress'] == $safe_email){
		$exist = true;
	}		
}
#FINAL RESULTS
if ($exist == false){
	$db->dbCall($query_INSERT); #insert satement
	print "<h1>Thank you for contacting us, someone will get back to you soon</h1>";
}else{
	print "<h1>You already contact us once!</h1>\n";
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
