<?php 
require 'menu.php';
@$idproduto = $_GET["idproduto"];
setcookie("$idproduto", $idproduto);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Carrinho</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<div class="carro">
		<h1>Carrinho</h1>
		<?php foreach ($_COOKIE as $exibe) :
		if ($exibe != $_COOKIE["PHPSESSID"]): 
			$sql = "SELECT img FROM imagens WHERE idimg='$exibe'";
			$retorno = mysqli_query(conexao(), $sql);
			$med = mysqli_fetch_assoc($retorno);
			$printa = $med["img"];

			$comando = "SELECT nomeproduto, preco, idproduto FROM produtos WHERE idproduto='$exibe'";
			$return = mysqli_query(conexao(), $comando);
			$inter = mysqli_fetch_assoc($return);
			$nome = $inter["nomeproduto"];
			$preco = $inter["preco"];
			$idproduto = $inter["idproduto"];
			?>
			<img src="<?php echo $printa; ?>"> 
			<p><?php echo $nome." ".$preco; ?></p>
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<?php require 'rodape.php'; ?>
	<?php 
		if($_GET['refreshed'] != 'yes'){ 
			echo "<meta http-equiv=\"refresh\" content=\"0;url={$_SERVER['REQUEST_URI']}&refreshed=yes\">"; 
		}
	?>
</body>
</html>