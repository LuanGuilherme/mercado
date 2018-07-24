<?php

require "cnx.php";

$nomeproduto = $_POST["nomeproduto"];
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];
$descproduto = $_POST["descproduto"];
$idimg = $_POST["idimg"];
$idproduto = $_POST["idproduto"];

$comando = "UPDATE produtos
SET nomeproduto= '$nomeproduto',preco= '$preco',quantidade= '$quantidade',descproduto= '$descproduto',idimg= '$idimg'
WHERE idproduto= '$idproduto'";

$retorno = mysqli_query(conexao(), $comando);

if($retorno) {
	header("refresh:2; url=../listarProduto.php");
	echo "Foi ALTERADO com sucesso!";
} else {
	echo "Errou!";
}

?>