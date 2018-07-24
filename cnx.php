<?php
function conexa() {
	$cnx = mysqli_connect(
		"localhost", 
		"root",
		"", 
		"LOJA"); 

	return $cnx;
}

?>