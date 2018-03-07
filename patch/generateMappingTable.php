<?php
/*-------------------------------------------------
-- Patch script to create database mapping table --
--                                               --
-- It will create the mapping table, check the   --
-- state of your bookinfo table and populate     --
-- everything for you.                           --
-------------------------------------------------*/

	/* Does not support CREATE
	++ (probably a security feature) */
	require_once("../DB.class.php");

	$db_con = new DB();

	// Purge old mapping table (if it exists)
	$db_con->dbCall("DROP TABLE bookinfo_map CASCADE;");

	// Create mapping table
	$db_con->dbCall("CREATE TABLE bookinfo_map\n" .
					"(lex_val varchar(100) primary key not null,\n" .
					"entry varchar(100) not null,\n".
					"type varchar(20) not null);"
	);

	// Check "bookinfo" table; populate mapping table
	// TODO: maybe I should create a while loop instead
	while(true) {
		$query_result = $db_con->dbCall("SELECT * FROM bookinfo LIMIT {$i},1;");

		// if null or false
		if(!$query_result) {
			break;
		}

		// Calculate lexicographical values
		$strings = $query_result->fetch_array();

		$title_str	= $strings['title'];
		$isbn_str	= $strings['isbn'];
		$author_str	= $strings['author'];

		$title_lex	= 0;
		$isbn_lex	= 0;
		$author_lex	= 0;

		for($i = 0; $i < strlen($title_str); ++$i) {
			$title_lex <<= 8;
			$title_lex += ord($title_str[$i]);
		}

		for($i = 0; $i < strlen($isbn_str); ++$i) {
			$isbn_lex <<= 8;
			$isbn_lex += ord($isbn_str[$i]);
		}

       	for($i = 0; $i < strlen($author_str); ++$i) {
			$author_lex <<= 8;
			$author_lex += ord($author_str[$i]);
		}

		// Insert lex_val, string, and type

		// book title
		$db_con->dbCall("INSERT INTO bookinfo_map VALUES(\n" .
							"'{$title_lex}',\n" .
							"'{$title_str}',\n" .
							"'title'\n"
						");"
		);

		// isbn
		$db_con->dbCall("INSERT INTO bookinfo_map VALUES(\n" .
						"'{$isbn_lex}',\n" .
						"'{$isbn_str}',\n" .
						"'isbn'\n"
						");"
		);

		// author
		$db_con->dbCall("INSERT INTO bookinfo_map VALUES(\n" .
						"'{$author_lex}',\n'" .
						"'{$author_str}',\n" .
						"'author'\n" .
						");"
		);
	}
?>
