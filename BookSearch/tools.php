<?php
/*------------------------------------------------
-- Contains my toolchain.                       --
-- (hopefully I will find a neater alternative) --
------------------------------------------------*/

//===========================================
//= Returns lexicographical value of string =
//+ as a string.                            =
//===========================================
function lex_val($string){
	$lex_val = 0;

	for($i = 0; $i < strlen($string); ++$i) {
		$lex_val += ord($string[$i]);
	}

	return $lex_val;
}
?>
