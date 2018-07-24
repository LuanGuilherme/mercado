<?php
require "cnx.php";

$idproduto = $_GET["idproduto"];


$comando = "DELETE FROM produtos WHERE idproduto = $idproduto";

$retorno = mysqli_query(conexao(), $comando); 

if($retorno) {
	header("refresh:1; url=../listarProduto.php");
	echo "Foi excluido o produto com sucesso!";
} else {
	echo "Errou!";
}
?>