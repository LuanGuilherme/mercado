<?php
function conexaum() {
	$cnx = mysqli_connect(
		"localhost", 
		"root",
		"", 
		"LOJA"); 

	return $cnx;
}

?>