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

define('RESULT_MAX', '5');

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
	// TODO: return more than just one result
	//+(do top five alike for other two checks)
	$query_result = $db_con->dbCall("SELECT * FROM bookinfo_map WHERE entry = '{$search_string}';");
	if(!$query_result) {
		throw new Exception('query error');
	}

	if($query_result->num_rows > 0) {
		$query_result = $db_con->dbCall("SELECT * FROM bookinfo" .
			"WHERE {$query_result->fetch_array()['type']} = '{$search_string}';"
		);

		// Breakout and return HERE
		// TODO: move this to better location
		$return = [];

		for($i = 0; $i < RESULT_MAX; ++$i) {
			$return[$i] = $query_result->fetch_array();

			// get next link in list
			$query_result = $query_result->fetch_field;
		}

		return $return;
		// end of breakout
	}

	// Check 2: if string is probably an attempted ISBN
	if(preg_match('/^[^a-z]/i', $search_string) == 1) {
		$query_result = $db_con->dbCall("SELECT * FROM

		);
	}

	// Check 3: none (best guess)
}

?>
