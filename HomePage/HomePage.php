<?php

require_once("../Template/Discover.php");

$page = new Template("HomePage");
$page2 = new Discover("Discover Books");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();
$page2->setNavSection();
$page2->setFootSection();

print $page->getTopSection();
print $page2->getNavSection();

print $page2->getFootSection();
print $page->getBottomSection();
?>