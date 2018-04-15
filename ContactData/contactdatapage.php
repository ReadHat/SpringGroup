<?php
require_once("../Template/Template.php");
require_once("../BookSearch/DB.class.php");

$db = new DB();
$page = new Template("Sprint 2");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("");
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


if(isset($_POST['usr']) && isset($_POST['passwd'])){
	if (!empty($_POST['usr']) && !empty($_POST['passwd'])){
		
	$db = new DB();
		
	if (!$db->getConnStatus()){
	print "<p class='f'>An error has occurred while trying connect to database!</p>\n";
	}
	$query = "select username, userpass, email, creationdate, realname, userstatus, rolename
		from user, user2role, role
		where user.userid = user2role.userid
		and user2role.roleid = role.roleid";
	$result = $db->dbCall($query);	
?>

<div id="main-table">
	<table>
	<tr>
		<th>ID</th>
		<th>User Name</th>
		<th>Book Title</th>
		<th>Email</th>
		<th>Created On</th>
		<th>Real Name</th>
		<th>User Status</th>
		<th>User Role</th>
	</tr>
		
	 <?php

	 foreach($results as $row){
		 print "<tr>\n";
		 foreach ($row as $cell){
			 print "<td>";
			 print "$cell";
			 print  "</td>\n";
		 }
		 print "</tr>\n";
	 }
	 ?>
	 
	 </table>
</div>
<?php
	}else{
			print "Could Not Display Any Contact Information";
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