<?php

require_once("../Template/Discover.php");

$page = new Template("Book Search");
$page2 = new Discover("Book Search");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();
$page2->setNavSection();
$page2->setFootSection();

print $page->getTopSection();
print $page2->getNavSection();

Print "<p class='f'>Thank you for your buissness. All email request will be handled as soon as possible. Expect a reply within 48 to 72 hours normal buissness hours monday through friday.</p>";
Print "<p class='e'>GET IN TOUCH</p>";
Print "<p class='i'>Location:</p>";
Print "<p class='h'>1234 Gym Park Way Ave, Plover, WI 54467</p>";
Print "<p class='g'>Phone Number:</p>";
Print "<p class='h'>111-222-3333</p>";
Print "<p class='j'>Email:</p>";
Print "<p class='h'>email@email.com///</p>";
Print "<form method='post' action='BookResults.php'>";
Print "<fieldset>";
Print "<p><label class='b'> Book Inform: <input type = 'text' id = 'myText' name = 'bookinfo'></label></P>";
Print "<input type = 'submit' onclick='myFunction()'>";
Print "</fieldset>";
Print "</form>";

print $page2->getFootSection();
print $page->getBottomSection();
?>