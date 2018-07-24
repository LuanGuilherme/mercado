<?php
function conexao() {
	$cnx = mysqli_connect("localhost", "root", "", "LOJA"); 
	return $cnx;
}
?>