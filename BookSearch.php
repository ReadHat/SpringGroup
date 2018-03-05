<?php
/*---------------------------
-- Book info search engine --
------------------------------------------------------
-- Consumes user-entered string. Blah blah blah...  --
--                                                  --
-- NOTE: see if you can force encapsulation without --
++ oject-orientation.                               --
----------------------------------------------------*/

require_once("DB.class.php");

function searchBooks()
{
	// set up new database connection
	// (connections specs in db-creds.json)
	$db_con = new DB();
	
	// keep a log of how searching goes
	$log = [];

	if(!$db_con->getConnStatus()) {
		
	}
	
}

?>
