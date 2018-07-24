<?php 
$comando = "SELECT * FROM produtos";
$retorno = mysqli_query(conexao(), $comando);
$produtos = array();
while($registro = mysqli_fetch_assoc($retorno)) {
	$produtos[] = $registro;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Corpo</title>
	<meta charset="utf-8">
</head>
<body>
	<h1 id="tituProdutos">Produtos em destaque</h1>
	<div id="produtos">
		<marquee behavior="alternate" direction="left">
			<img id="marquinhos" src="img/s1.jpg">
			<img id="marquinhos" src="img/s2.jpg">
			<img id="marquinhos" src="img/s3.jpg">
			<img id="marquinhos" src="img/s4.jpg">
			<img id="marquinhos" src="img/s5.jpg">
		</marquee>
		<?php foreach ($produtos as $produto) : ?>

		<?php 
			$idimg = $produto["idimg"];
			$comando2 = "SELECT * FROM imagens WHERE idimg = $idimg";
			$retorno2 = mysqli_query(conexao(), $comando2);
			$registro2 = mysqli_fetch_assoc($retorno2);
		?>

		<?php if ($idimg <= 12) : ?>
		<figure id="prod1">
			<a href="detalharProduto.php?idproduto=<?=$produto['idproduto']?>&registro2=<?=$registro2['idimg'] ?>"><img src="<?=$registro2['img'] ?>"></a>
			<figcaption><strong><?=$produto["nomeproduto"]?>:<?=$produto["preco"]?></strong> <br> <?=$produto["descproduto"]?></figcaption>
		</figure>
		<?php 
		endif;
		endforeach; 
		?>
	</div>
</body>
</html>