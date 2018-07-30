<?php 
require "cnx.php";

function deletarProduto () {
	$nomeproduto = @$_GET["nomeproduto"];

	$comando = "SELECT * FROM produtos WHERE nomeproduto = '$nomeproduto'";
	$retorno = mysqli_query(conexao(), $comando);

	$registro = mysqli_fetch_assoc($retorno);
	$idproduto = $registro["idproduto"];

	$comando = "DELETE FROM produtos WHERE idproduto = $idproduto";

	$retorno = mysqli_query(conexao(), $comando); 

	if($retorno) {
		header("refresh:1; url=../listarProduto.php");
	}
}

function adicionarProduto () {
	$nomeproduto = $_POST["nomeproduto"];
	$preco = $_POST["preco"];
	$quantidade = $_POST["quantidade"];
	$descproduto = $_POST["descproduto"];
	$idimg = $_POST["idimg"];

	$comando = "INSERT INTO produtos (idproduto, nomeproduto, preco, quantidade, descproduto, idimg)
		values (null, '$nomeproduto', '$preco', '$quantidade', '$descproduto', '$idimg')";

	$retorno = mysqli_query(conexao(), $comando);

	if($retorno) {
		header("refresh:2; url=../listarProduto.php");
	}
}

function alterarProduto () {
	
} 
?>