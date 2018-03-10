<?php
/*-------------------------------------------------
-- Patch script to create database mapping table --
--                                               --
-- It will create the mapping table, check the   --
-- state of your bookinfo table and populate     --
-- everything for you.                           --
-------------------------------------------------*/

	// for top-down pathing
	require_once("../main_include.php");

	// for managing database connections
	require_once("{$PATH_}/DB.class.php");

	// for calculating lex_val
	require_once("{$PATH_}/tools.php");

	$db_con = new DB();

	// Purge old mapping table (if it exists)
	$db_con->dbCall("DROP TABLE bookinfo_map CASCADE;");

	// Create mapping table
	$db_con->dbCall("CREATE TABLE bookinfo_map\n" .
					"(lex_val int(100) primary key not null,\n" .
					"entry varchar(100) not null,\n".
					"type varchar(20) not null);"
	);

	// Check "bookinfo" table; populate mapping table
	// (this is a for-loop at heart)
	$i = 0;
	while(true) {
		$query_result = $db_con->dbCall("SELECT * FROM bookinfo LIMIT {$i},1;");

		// if null or false
		if(!$query_result) {
			break;
		}

		//DEBUG
		/*var_dump($query_result);
		exit;*/

		//====================================
		//= Calculate lexicographical values =
		//====================================
		$strings = $query_result[0];

		$title_str	= $strings['booktitle'];
		$isbn_str	= $strings['isbn'];
		$author_str	= $strings['author'];

		$title_lex	= 0;
		$isbn_lex	= 0;
		$author_lex	= 0;

		// title lex_val
		$title_lex = lex_val($title_str);

		// isbn lex_val
		$isbn_lex = lex_val($isbn_str);

		// author lex_val
		$author_lex = lex_val($author_str);

		//====================================
		//= Insert lex_val, string, and type =
		//====================================

		// book title
		$db_con->dbCall("INSERT INTO bookinfo_map VALUES(\n" .
							"{$title_lex},\n" .
							"'{$title_str}',\n" .
							"'title'\n" .
						");"
		);

		// isbn
		$db_con->dbCall("INSERT INTO bookinfo_map VALUES(\n" .
						"{$isbn_lex},\n" .
						"'{$isbn_str}',\n" .
						"'isbn'\n" .
						");"
		);

		// author
		$db_con->dbCall("INSERT INTO bookinfo_map VALUES(\n" .
						"{$author_lex},\n" .
						"'{$author_str}',\n" .
						"'author'\n" .
						");"
		);

		++$i;
	}// end of while loop (that is really a for loop)
?>
