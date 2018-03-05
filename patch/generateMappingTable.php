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
					"(lex_val int primary key not null,\n" .
					"entry varchar(100) not null,\n".
					"type varchar(20) );"
	);

	// Check "bookinfo" table; populate mapping table
	
?>
