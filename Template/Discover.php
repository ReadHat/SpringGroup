<?php
require_once("Template.php");

// login status header code
require_once("../LogOn/LoginStatusHeader.php");

class Discover extends Template {
	private $_nav;
	private $_foot;
	private $_title;
	
function __construct($title = "Default") {
	$this->_title = $title;
}

function setNavSection() {
$returnVal = "<header class='nav'>\n";
$returnVal .= "<div class='location'>\n";
$returnVal .= "<div class='l3'>\n";
$returnVal .= printLogonStatus();
$returnVal .= "</div>\n";
$returnVal .= "</div>\n";
$returnVal .= "<h1>";
$returnVal .= $this->_title;
$returnVal .= "</h1>\n";
$returnVal .= "<ul>\n";
$returnVal .= "<li><a href='../HomePage/HomePage.php' title='Home Page'>Home Page</a></li>\n";
$returnVal .= "<li><a href='../AboutUs/AboutUs.php' title='About Us'>About US</a></li>\n";
$returnVal .= "<li><a href='../ContactUs/ContactUs.php' title='Contact Us'>Contact Us</a></li>\n";
$returnVal .= "<li><a href='../BookSearch/Books.php' title='Book Search'>Book Search</a></li>\n"; 
if(isset($_SESSION['usrname']) && in_array('admin', $_SESSION['role'], TRUE)){
	$returnVal .= "<li><a href='../ContactData/ContactDataPage.php' title='Contact Data'>Contact Data</a></li>\n";
}
$returnVal .= "</ul>\n";
$returnVal .= "</header>\n";

$this->_nav = $returnVal;
}

function setFootSection() {
$returnVal = "<footer>\n";
$returnVal .= "<p>Contact Us</p>\n";
$returnVal .= "<p> | </p>\n";
$returnVal .= "<p> Privacy Policy </p>\n";
$returnVal .= "<p> | </p>\n";
$returnVal .= "<p> Terms of Service </p>\n";
$returnVal .= "<a href = 'https://www.facebook.com/'>\n";
$returnVal .= "<img src = '../Pictures/facebook.png' alt='facebook'>\n";
$returnVal .= "</a>\n";
$returnVal .= "<a href = 'https://twitter.com/?lang=en'>\n";
$returnVal .= "<img src = '../Pictures/twitter.png' alt='twitter'>\n";
$returnVal .= "</a>\n";
$returnVal .= "<a href = 'https://www.instagram.com/?hl=en'>\n";
$returnVal .= "<img src = '../Pictures/instagram.png' alt='instagram'>\n";
$returnVal .= "</a>\n";
$returnVal .= "</footer>\n";

$this->_foot = $returnVal;
}


function getNavSection() {
	return $this->_nav;
}

function getFootSection() {
	return $this->_foot;
}

}



?>
