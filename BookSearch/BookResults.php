<?php
require_once("../Template/Template.php");
require_once("../BookSearch/BookSearch.php");

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


if (isset($_POST['bookinfo'])){
	
try {
	
	$bookinfo = $_POST['bookinfo'];
print "<p class='f'>";
	$results = searchBooks("HOBBIT");
print "</p>";



?>

<div id="main-table">
	<table>
	<tr>
		<th>ID</th>
		<th>Insert Time</th>
		<th>Book Title</th>
		<th>ISBN</th>
		<th>Author</th>
		<th>Status</th>
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

	//var_dump($results);
} catch (Exception $e){
	echo "Hello World";
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