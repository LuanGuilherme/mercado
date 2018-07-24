<?php 
session_start();
require 'cnx.php';
$idcliente = $_SESSION["idcliente"];
$id = $idcliente["idcliente"];

$comando = "DELETE FROM clientes WHERE idcliente = $id";
$retorno = mysqli_query(conexao(), $comando); 
if ($retorno) {
	header("location:logout.php");
}
?>