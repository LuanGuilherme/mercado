<?php

require "cnx.php";

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
	echo "Foi inserido com sucesso!";
} else {
	echo "Errou!";
}


?>