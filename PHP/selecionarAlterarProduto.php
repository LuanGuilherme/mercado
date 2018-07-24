<?php
require "cnx.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>alterar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<div class="edit">
		<h1>Alterar Produto</h1>
		<form action="selecionarAlterarProduto.php" method="GET">
			Digite o nome do produto a ser alterado: <input class="alterar" type="text" name="nomeproduto"> <br>
			<input type="submit" id="botao" name="Enviar">
		</form>
	</div>
</body>
</html>

<?php
$nomeproduto = @$_GET["nomeproduto"];

$comando = "SELECT * FROM produtos WHERE nomeproduto = '$nomeproduto'";
$retorno = mysqli_query(conexao(), $comando);

$registro = mysqli_fetch_assoc($retorno);
$idproduto = $registro["idproduto"];

if ($idproduto) {
	echo "foi";
	header("refresh:0; url=../alterarProduto.php?idproduto=$idproduto");	
}

?>