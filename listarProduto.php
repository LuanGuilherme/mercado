<?php
require "cnx.php";

$comando = "SELECT * FROM produtos";
$retorno = mysqli_query(conexa(), $comando);
$produtos = array();
while($registro = mysqli_fetch_assoc($retorno)) {
	$produtos[] = $registro;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>lista dos produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<?php require "menu.php";  ?>
	<div id="produtos">
		<h1 id="tituProdutos">Todos os Produtos</h1>
		<?php foreach ($produtos as $produto) : ?>

		<?php 

			$idimg = $produto["idimg"];
			$comando2 = "SELECT * FROM imagens WHERE idimg = $idimg";
			$retorno2 = mysqli_query(conexa(), $comando2);
			$registro2 = mysqli_fetch_assoc($retorno2);
		?>


		<figure id="prod1">
			<a href="detalharProduto.php?idproduto=<?=$produto['idproduto']?>&registro2=<?=$registro2['idimg'] ?>"><img src="<?=$registro2['img'] ?>"></a>
			<figcaption><strong><?=$produto["nomeproduto"]?>:<?=$produto["preco"]?></strong> <br> <?=$produto["descproduto"]?></figcaption>
		</figure>
		<?php endforeach; ?>
	</div>
<?php require "rodape.php"; ?>
</body>
</html>
