<?php
require_once("Template.php");

$page = new Template("My Page");
$page->setHeadSection("<link rel='stylesheet' href='style.css'>");
$page->setHeadSection("<script src='script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
Print "<header class='nav'>";
Print "<h1>Hulkamania Gym</h1>";
Print "<ul>";
Print "<li><a href='HomePage.php' title='Home Page'>Home Page</a></li>";
Print "<li><a href='AboutUs.php' title='About Us'>About US</a></li>";
Print "</ul>";
Print "</header>";
Print "<p class='f'>Thank you for your buissness. All email request will be handled as soon as possible. Expect a reply within 48 to 72 hours normal buissness hours monday through friday.</p>";
Print "<p class='e'>GET IN TOUCH</p>";
Print "<p class='i'>Location:</p>";
Print "<p class='h'>1234 Gym Park Way Ave, Plover, WI 54467</p>";
Print "<p class='g'>Phone Number:</p>";
Print "<p class='h'>111-222-3333</p>";
Print "<p class='j'>Email:</p>";
Print "<p class='h'>email@email.com///</p>";
Print "<form method='post' action='testform2.php'>";
Print "<fieldset>";
Print "<p><label class='b'> TO: <input type = 'text' value='email@email.com///'></label></P>";
Print "<p><label class='b'> Email Address: <input type = 'text' id = 'myText' name = 'name'></label></P>";
Print "<p><label class='b'> Phone Number: <input type = 'text' name = 'Phone'></label></p>";
Print "<fieldset class='fieldset1'>";
Print "<legend> Additional Comments:</legend>";
Print "<label><textarea rows='10' cols='120' id='myText2' name = 'Comment'></textarea></label>";
Print "</fieldset>";
Print "<input type = 'submit' onclick='myFunction()'>";
Print "</fieldset>";
Print "</form>";
Print "<footer>";
Print "<p>Home Page</p>";
Print "<p> | </p>";
Print "<p> Privacy Policy </p>";
Print "<p> | </p>";
Print "<p> Terms of Service </p>";
Print "</footer>";
print $page->getBottomSection();
?>