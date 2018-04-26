<?php
if(isset($_SESSION['usrname']) && in_array('admin', $_SESSION['role'], TRUE)){
		
require_once("../Template/Discover.php");
require_once("../DB/DB.class.php");

$db = new DB();
$page = new Discover("Contact Info");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setTopSection();
$page->setBottomSection();
$page->setNavSection();
$page->setFootSection();


print $page->getTopSection();
print $page->getNavSection();



$query = "SELECT * FROM contactdata";

$results = $db->dbCall($query);
	
if (!$db->getConnStatus()){
	print "<p class='f'>An error has occurred while trying connect to database!</p>\n";
	}
?>

<div>
	<table>
	<tr>
		<th>ID</th>
		<th>Email</th>
		<th>Phone Number</th>
		<th>Additional Comments</th>
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
	
print $page->getFootSection();
print $page->getBottomSection();

	}else{
?>

<html>
<head>
  <title>404</title>
</head>
  <body>
    <h1>404 Web Page Cannot Be Located !!</h1>
  </body>
<footer>
</footer>
</html>

<?php
}

?>
