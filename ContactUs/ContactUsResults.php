<?php

require_once("../Template/Discover.php");
require_once("../DB/DB.class.php");

$db = new DB();
$page = new Template("My Page");
$page2 = new Discover("Contact Us Results");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();
$page2->setNavSection();
$page2->setFootSection();

print $page->getTopSection();
print $page2->getNavSection();

#ENSURE FORM FIELDS ARE SET

if (
	!isset($_POST['name'])    ||
	!isset($_POST['Phone'])   ||
	!isset($_POST['Comment'])
) {

	print "\n<h1 class='f'>ERROR: Not all form fields are set server-side. Malformed HTTP request or other error.</h1>";

	printBottomAndQuit($page, $page2);

}

#ENSURE NECESSARY FIELDS ARE NOT EMPTY

// TODO: find a less shitty name
$bad_empty = false;

if(empty($_POST['name'])) {

	$bad_empty = true;

	$empty_error_message = "\nEmail field";
}

// Wrote it this way in case more fields need to be checked
if($bad_empty) {

	print "\n<div class='f'><h1>The following fields are required for submission. Please fill them in:</h1>" .
			"\n<p>" . $empty_error_message  . "</p>".
		"</div>";

		printBottomAndQuit($page, $page2);

}

#CHECKING DATABASE STATUS

if (!$db->getConnStatus()){

	print "\n<p class='f'>An error has occurred while trying connect to database!</p>";

	printBottomAndQuit($page, $page2);
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

print $page2->getFootSection();
print $page->getBottomSection();
?>

<?php
	// Locally defined functions

	/*---------------------------------------------------
	-- declared this instead of using a goto...        --
	-- probably should have just left them in,         --
	++ or have the template designer restructure their --
	++ code......                                      --
	---------------------------------------------------*/
	function printBottomAndQuit($page, $page2)
	{
		print $page2->getFootSection();
	        print $page->getBottomSection();
        	exit;

	}
?>
