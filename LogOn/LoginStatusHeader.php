<?php

/*==================================================
== Generates header with the propper information: ==
==    - "Log On" link if the user is logged out   ==
==    - "Welcome <name>." and a "Log Off" link    ==
++        if user is logged in                    ==
==================================================*/

function printLogonStatus()
{
	$return_val = "";

	if(isset($_SESSION) && !empty($_SESSION)) {
		$return_val .= "\n<h2>Welcome " . $_SESSION['realname'] .  "</h2>";
		$return_val .= "\n<a href='../LogOn/LogOff.php' title='Log Off'>Log Off</a>";
	} else {
		$return_val .= "\n<a href='../LogOn/LogOn.php' title='Log On'>Log On</a>";
	}

	return $return_val;
}

?>
