<?php
/*------------------------------------------------
-- Contains my toolchain.                       --
-- (hopefully I will find a neater alternative) --
------------------------------------------------*/

//===========================================
//= Returns lexicographical value of string =
//+ as a string (since base256 is waybig)   =
//===========================================
function lex_val($string){
	for($i = 0; $i < strlen($string); ++$i) {
		$lex_val <<= 8;
		$lex_val += ord($string[$i]);
	}

	return $lex_val;
}
?>
