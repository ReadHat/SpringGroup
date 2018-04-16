 <?php
require_once("../Template/Discover.php");

$page = new Template("LogOn");
$page2 = new Discover("Discover Books");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setTopSection();
$page->setBottomSection();
$page2->setNavSection();
$page2->setFootSection();


print $page->getTopSection();
print $page2->getNavSection();
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
print $page2->getFootSection();
print $page->getBottomSection();
