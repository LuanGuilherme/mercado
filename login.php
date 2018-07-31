<?php require 'clienteModelo.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<?php require 'menu.php'; ?>
	<form method="POST">
	<div class="dados">
		<h1>Login</h1><br>
		<label for="nome">Nome: </label>
		<input type="text" name="nome" placeholder="Nome"><br>
		<br>
		<label for="senha">Senha: </label>
		<input type="password" name="senha" placeholder="Senha"><br>
		<br>
		<input type="submit" id="botao">
	</div>
	<?php require 'rodape.php'; ?>
	</form>
</body>
</html>
<?php   
if (isset($_POST["nome"]) && isset($_POST["senha"])) {
	login();	
}
?>
