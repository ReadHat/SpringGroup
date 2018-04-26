 <?php
require_once("../Template/Discover.php");

$page = new Discover("Discover Books");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setTopSection();
$page->setBottomSection();
$page->setNavSection();
$page->setFootSection();


print $page->getTopSection();
print $page->getNavSection();
Print "<body>";
Print "<form class='logon' method='post' action='../authentication/authentication.php'>";
Print "<fieldset>";
Print "<legend>Log In:</legend>";
Print "<p><label class='b'> User Name: <input type = 'text' id = 'usr' name = 'usr' required></label></p>";
Print "<p><label class='b'> Password: <input type = 'password' name = 'passwd' required></label></p>";
Print "<input type = 'submit' onclick='myFunction()'>";
Print "</fieldset>";
Print "</form>";
Print "</body>";
print $page->getFootSection();
print $page->getBottomSection();
