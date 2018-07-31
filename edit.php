<?php
session_start();
if (@$_SESSION["adm"]) {
 	header("location:PHP/logout.php");
 } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<?php require 'menu.php'; ?>
	<div class="edit">
	<h1>Editar cadastro</h1>
		<?php require 'dados_user.php'; ?><a href="PHP/delete.php">Desistir da conta</a>
	</div>
	<?php require 'rodape.php'; ?>
</body>
</html>
<script>
function validacao(){
	senha = document.form.senha.value
	senhad = document.form.senhad.value
	if (senha != senhad){
		alert ('As senhas devem ser iguais!');
		document.form.getElementById('senhad').focus();
		document.getElementById('form').action = "";
	}else{
		document.getElementById('form').action = "PHP/clienteModelo.php";
	}
}
</script>
