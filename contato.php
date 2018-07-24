<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<div class="contato">
		<h1>Fale conosco</h1><br>
		<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7312.6077810732!2d-48.01972181563719!3d-23.593431923232547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1530096273241" width="500" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
		<form>
			<br>

			<label for="nome">Nome: </label>
			<input type="text" name="nome" id="name"><br>
			<br>
			<label for="email">E-mail: </label>
			<input type="email" name="email" id="email"><br>
			<br>
			<label for="msg">Mensagem: </label>
			<textarea id="msg" rows="10" cols="50" name="msg"></textarea><br>
			<input type="submit" id="botao" name="VAI" onclick="mail()">
		</form>
	</div>
	<?php require 'rodape.php'; ?>
</body>
</html>
<script>
	function mail(){
		<?php
		mail("luangandrade10@gmail.com, gabriel.hdda@gmail.com", "Projeto WEB", $_GET["msg"], "De: ".$_GET["email"]); 
		?>
	}
</script>