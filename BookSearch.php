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
require_once("tools.php");

// maximum fields to return
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

	// exception messages
	$query_error = 'query error';

/*------------------------------------------------------
--               check important stuff                --
------------------------------------------------------*/

	// check argument string
	if($search_string == null) {
		throw new Exception('null argument');
	}

	// check database connection
	if(!$db_con->getConnStatus()) {
		throw new Exception('connection error');
	}

/*------------------------------------------------------
--             Begin: Search Engine Code              --
------------------------------------------------------*/

	// trim and sanatize input
	trim($search_string);
	$search_string = $db_con->dbEsc($search_string);

	// DEBUG
	print "Sanatized search string is: {$search_string}\n";

	// Check 1: exact match
	// TODO: return more than just one result
	//+(do top five alike for other two checks)
	$map_query_result = $db_con->dbCall("SELECT * FROM bookinfo_map WHERE entry = '{$search_string}';");

	// check query
	if(!$map_query_result) {
		throw new Exception('query error');
	}

	// DEBUG
	print "Map query result:\n";
	var_dump($map_query_result);

	// DEBUG
	print "Search string: {$search_string}\n";

	// DEBUG
	print "bookinfo entry type: {$map_query_result[0]['type']}\n";

	$query_result_size = count($map_query_result);

	if($map_query_result) {
		$book_query_result = [];

		foreach($map_query_result as $book_query) {
			$book_query_result += $db_con->dbCall("SELECT * FROM bookinfo\n" .
				"WHERE {$book_query['type']} = '{$search_string}';"
			);

			// check query
			if(!$book_query_result) {
				throw new Exception('query error');
			}
		}// end of foreach

		// DEBUG
		print "Bookinfo Query Result: \n";
		var_dump($book_query_result);

		// Breakout and return HERE
		// TODO: move this to better location
		$books = [];

		if($query_result_size > RESULT_MAX) {
			$query_result_size = RESULT_MAX;
		}

		for($i = 0; $i < $query_result_size; ++$i) {
			$books[$i] = $book_query_result[$i];
		}

		// DEBUG
		print "Array to be returned:\n";
		var_dump($books);

		return $books;
		// end of breakout
	}


/*----------------------------------------------------------------------------
	// Check 2: if string is probably an attempted ISBN
	if(preg_match('/^[^a-z]+/i', $search_string) == 1) {
		$lex_val = lex_val($search_string);

*/
		/*$book_query_result = $db_con->dbCall("SELECT * FROM bookinfo_map" .
			"WHERE 'entry' = '{$lex_val}';");*/
/*	}

	// Check 3: none (best guess)
----------------------------------------------------------------------------*/
}// end of search books

?>
