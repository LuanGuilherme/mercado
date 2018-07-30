<?php
require "cnx.php";
require 'produtoModelo.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>deletar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<div class="edit">
		<h1>Deletar Produto</h1> <br>
		<form action="selecionarProduto.php" method="GET">
			Digite o nome do produto a ser deletado: 
			<input class="deletar" type="text" name="nomeproduto"><br>
			<br>
		<input id="botao" type="submit" name="Enviar">
	</form>
</div>
</body>
</html>
<?php 
	deletarProduto();
?>