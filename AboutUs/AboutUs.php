<?php

require_once("../Template/Discover.php");

$page = new Discover("About Us");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setTopSection();
$page->setBottomSection();
$page->setNavSection();
$page->setFootSection();

print $page->getTopSection();
print $page->getNavSection();

Print "<p class='f'>Thank you for your buissness. All email request will be handled as soon as possible. Expect a reply within 48 to 72 hours normal buissness hours monday through friday.</p>";
Print "<p class='e'>Contacts</p>";
Print "<p class='g'>Landrath, Steven</p>";
Print "<p class='h'>The Big Guy</p>";
Print "<p class='g'>Rodriguez, Derek</p>";
Print "<p class='h'>The guy next to the big guy</p>";
Print "<p class='g'>Chen, Yiwen</p>";
Print "<p class='h'>The guy next to the guy, next to the big guy</p>";
Print "<p class='g'>Kolodzik, Joseph</p>";
Print "<p class='h'>The New Guy</p>";

print $page->getFootSection();
print $page->getBottomSection();
?>