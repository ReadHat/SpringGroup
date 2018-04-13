<?php
/*---------------------------
-- Book info search engine --
------------------------------------------------------
-- Consumes user-entered string. Blah blah blah...  --
--                                                  --
-- NOTE: see if you can force encapsulation without --
++ oject-orientation.                               --
----------------------------------------------------*/

require_once("../DB/DB.class.php");
require_once("tools.php");

// maximum fields to return
define('RESULT_MAX', '10');

function searchBooks($search_string = null)
{
	// set up new database connection
	// (connections specs in db-creds.json)
	$db_con = new DB();

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

	// query for rows containing $search_string
	//+as either a book title, author, or isbn
	$books = $db_con->dbCall("SELECT * FROM bookinfo " .
		"WHERE booktitle = '{$search_string}' OR isbn = '{$search_string}' OR author = '{$search_string}';");

	// check query
	if(!$books) {
		throw new Exception('query error');
	}

	return $books;
}// end of search books
?>
