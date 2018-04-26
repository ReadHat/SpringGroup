<?php
require_once("../Template/Discover.php");
require_once("../BookSearch/BookSearch.php");

$page = new Discover("Book Search Results");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();
$page->setNavSection();
$page->setFootSection();

print $page->getTopSection();
print $page->getNavSection();

if (isset($_POST['bookinfo'])){
	
try {
	
	$bookinfo = $_POST['bookinfo'];
print "<p class='f'>";
	$results = searchBooks($bookinfo);
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
	print "The book was not located";
}
}
print $page->getFootSection();
print $page->getBottomSection();
?>