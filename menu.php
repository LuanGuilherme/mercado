<?php 
@session_start();
if (!function_exists('conexao')){
	require 'PHP/cnx.php';
}
@extract($_SESSION["idcliente"], EXTR_OVERWRITE);
@$sql = "SELECT nomecliente FROM clientes WHERE idcliente='$idcliente'";
if (isset($_SESSION["idcliente"])) {
	$aux = mysqli_fetch_assoc(mysqli_query(conexao(), $sql));
	extract($aux, EXTR_OVERWRITE);
	$nome = $nomecliente;
}elseif (@$_SESSION["adm"]) {
	$nome = "Admin";
}else{
	$nome = "Logar";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="utf-8">
</head>
<body>
	<ul>
		<img id="logo" title="Mercado" src="logo.png">
		<li><a href="index.php">Home</a></li>
		<li><a href="listarProduto.php">Todos os produtos</a></li>
		<?php echo $nome == "Admin" ? "<li><a href='formularioProduto.php'>Adicionar produto</a></li>": ""; ?>
		<?php echo $nome == "Admin" ? "<li><a href='PHP/selecionarAlterarProduto.php'>Alterar produto</a></li>": ""; ?>
		<?php echo $nome == "Admin" ? "<li><a href='PHP/selecionarProduto.php'>Deletar produto</a></li>": ""; ?>
		<?php echo $nome == "Admin" ? "": "<li><a href='contato.php'>Contato</a></li>"; ?>
		<?php echo $nome == "Logar" ? "<li><a href='cadastro.php'>Cadastrar</a></li>": ""; ?>
		<?php if ($nome != "Admin") : ?>
		<form id="busca">
			<input class="pesquisa" type="text" name="busca" placeholder=" Pesquisa">
		</form>
		<?php endif; ?>
		<li id="user"><?php echo $nome == "Logar" ? "<a href='login.php'>Logar</a><!--" : "<a href='edit.php'>$nome</a>"; ?>
			<ul id="sub">
				<?php echo $nome == "Admin" ? "" : "<li><a href='edit.php'>Editar</a></li>"; ?>
				<li><a href="PHP/logout.php">Sair</a></li>
			</ul>
			<?php echo $nome == "Logar" ? "-->" : ""; ?>
		</li>
		<?php echo $nome != "Admin" ? "<a href='carrinho.php'><img id='carrinho' src='img/carrinho.png'></a>": ""; ?>
	</ul>
</body>
</html>
<?php
if (!empty($_GET["busca"])) {
	$busca = $_GET["busca"];
 	$sql = "SELECT * FROM produtos WHERE nomeproduto LIKE '%{$busca}%'"; 
 	$consulta = mysqli_query(conexao(), $sql);
 	$array = mysqli_fetch_assoc($consulta);
 	$idproduto = $array['idproduto'];
 	$registro2 = $array['idimg'];
 	header("refresh:0; url=detalharProduto.php?idproduto=$idproduto&registro2=$registro2");
} 
?>