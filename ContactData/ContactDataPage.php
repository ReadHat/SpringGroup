<?php
if(isset($_SESSION['usrname']) && in_array('admin', $_SESSION['role'], FALSE)){
	if (!empty($_POST['usr']) && !empty($_POST['passwd'])){
		
require_once("../Template/Discover.php");
require_once("../DB/DB.class.php");

$db = new DB();
$page = new Template("Sprint 2");
$page2 = new Discover("Contact Info");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("");
$page->setTopSection();
$page->setBottomSection();
$page2->setNavSection();
$page2->setFootSection();


print $page->getTopSection();
print $page2->getNavSection();



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
	
print $page2->getFootSection();
print $page->getBottomSection();

	}else{
?>
<html>
  <title>404</title>
  <body>
    <h1>404 Access Denied !!</h1>
  </body>
</html>

<?php
	}

}else{
			print "Session Has not been set";
	}
?>
