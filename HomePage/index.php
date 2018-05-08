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

print $page->getFootSection();
print $page->getBottomSection();
?>