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

function searchBooks($search_string = null)
{
	// set up new database connection
	// (connections specs in db-creds.json)
	$db_con = new DB();
	
	// keep a log of how searching goes
	$log = [] ;

	// event log members
	// (makes changes potentially easier if needed)
	//$general_error = 'general_error';

/*------------------------------------------------------
--             check important stuff                  --
------------------------------------------------------*/

    if($search_string == null) {
        throw new Exception('null argument');
    }

	if(!$db_con->getConnStatus()) {
		throw new Exception('connection error');
	}

/*------------------------------------------------------
--             Begin: Search Engine Code              --
------------------------------------------------------*/

	// trim and sanatize input
	trim($search_string);
	$search_string = $db_con->dbEsc($search_string);

	// Check 1: exact match
	$query_result = $db_con->dbCall("SELECT * FROM bookinfo_map WHERE entry = '{$search_string}';");
	if(!$query_result) {
		throw new Exception('query error');
	}

	if($query_result->num_rows > 0) {
		$query_result = $db_con->dbCall("SELECT * FROM bookinfo" .
			"WHERE {$query_result->fetch_array['type']} = '{$search_string}';"
		);
	}

	// Check 2: if string is probably an ISBN
	if(preg_match('/^[^a-z]/i', $search_string) == 1) {
		
	}

	// Check 3: none (best guess)
}

?>
