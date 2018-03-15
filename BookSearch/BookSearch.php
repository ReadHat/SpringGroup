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
define('RESULT_MAX', '10');

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

	// Check 1: exact match
	// TODO: return more than just one result
	//+(do top five alike for other two checks)
	$map_query_result = $db_con->dbCall("SELECT * FROM bookinfo_map WHERE entry = '{$search_string}';");

	// check query
	if(!$map_query_result) {
		throw new Exception('query error');
	}

	$query_result_size = count($map_query_result);

	$book_query_result = [];
	$books = [];
	$book_count = 0;

	foreach($map_query_result as $book_query) {
		$book_query_result = $db_con->dbCall("SELECT * FROM bookinfo\n" .
			"WHERE {$book_query['type']} = '{$search_string}';"
		);

		// check query
		if(!$book_query_result) {
			throw new Exception('query error');
		}

		$queried_books = count($book_query_result);

		for($i = 0; $i < $queried_books; ++$i, ++$book_count) {
			if($book_count == RESULT_MAX) {
				goto book_query_breakout;
			}

			$books[$book_count] = $book_query_result[$i];
		}
	}// end of foreach

	// breakout point to stop querying
	book_query_breakout:

	return $books;


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
