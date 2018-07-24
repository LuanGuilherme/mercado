<?php require 'menu.php';

$idproduto = $_GET["idproduto"];
$registro2 = $_GET["registro2"];

$comando = "SELECT * FROM produtos WHERE idproduto = $idproduto";
$retorno = mysqli_query(conexao(), $comando);

$sql = "SELECT * FROM imagens WHERE idimg = $registro2";
$retorno2 = mysqli_query(conexao(), $sql);

$registro2 = mysqli_fetch_assoc($retorno2); 
$registro = mysqli_fetch_assoc($retorno);

$registro["idproduto"] = $idproduto;
?>
<!DOCTYPE html>
<html>
<head>
	<title>detalhar produto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<div id="detalhar">
		<h1><?=$registro["nomeproduto"];?></h1>
		<img id="img" src="<?=$registro2['img']?>">
		<div id="valor">
			<a href="carrinho.php?idproduto=<?=$idproduto?>"><img id="comprar" src="img/botao-comprar.png"></a>
			<br><p><?=$registro["preco"]?></p>
		</div>
		<br><p><?=$registro["descproduto"]?></p> <br><br>
		<a href="listarProduto.php">Retornar aos produtos</a>
	</div>
	<?php require 'rodape.php'; ?>
</body>
</html>