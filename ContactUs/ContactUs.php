<?php
require_once("../Template/Discover.php");

$page = new Discover("ContactUs");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();
$page->setNavSection();
$page->setFootSection();

print $page->getTopSection();
print $page->getNavSection();
Print "<p class='f'>Thank you for your buissness. All email request will be handled as soon as possible. Expect a reply within 48 to 72 hours normal buissness hours monday through friday.</p>";
Print "<p class='e'>GET IN TOUCH</p>";
Print "<p class='i'>Location:</p>";
Print "<p class='h'>1234 Gym Park Way Ave, Plover, WI 54467</p>";
Print "<p class='g'>Phone Number:</p>";
Print "<p class='h'>111-222-3333</p>";
Print "<p class='j'>Email:</p>";
Print "<p class='h'>email@email.com///</p>";
Print "<form method='post' action='ContactUsResults.php'>";
Print "<fieldset>";
Print "<p><label class='b'> TO: <input type = 'text' value='email@email.com///'></label></P>";
Print "<p><label class='b'> Email Address: <input type = 'text' id = 'myText' name = 'name' required></label></P>";
Print "<p><label class='b'> Phone Number: <input type = 'text' name = 'Phone' required></label></p>";
Print "<fieldset class='fieldset1'>";
Print "<legend> Additional Comments:</legend>";
Print "<label><textarea rows='10' cols='120' id='myText2' name = 'Comment'></textarea></label>";
Print "</fieldset>";
Print "<input type = 'submit' onclick='myFunction()'>";
Print "</fieldset>";
Print "</form>";
print $page->getFootSection();
print $page->getBottomSection();
?>
