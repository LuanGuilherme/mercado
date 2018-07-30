<?php require 'produtoModelo.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulário Produto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<?php require "menu.php";  ?>
<div class="edit">
	<h1>Adicionar Produto</h1> <br>
	<form action="" method="POST">
		Nome do Produto: <input class="form" type="text" name="nomeproduto"> <br>
		<br>
		Preço: <input class="form" type="text" name="preco"> <br>
		<br>
		Quantia em estoque: <input class="form" type="text" name="quantidade"> <br>
		<br>
		Descrição: <input class="form" type="text" name="descproduto"> <br>
		<br>
		Imagem: <select name="idimg">
			<option value="1">Tomate</option>
			<option value="2">Pão</option>
			<option value="3">Manteiga</option>
			<option value="4">Chocolate</option>
			<option value="5">Macarrão</option>
			<option value="6">Coca-cola</option>
			<option value="7">OMO</option>
			<option value="8">Sabão</option>
			<option value="9">Costela</option>
			<option value="10">Bife</option>
			<option value="11">Alface</option>
			<option value="12">Danone</option>
			<option value="13">Leite</option>
			<option value="14">Ketchup</option>
			<option value="15">Nutella</option>
			<option value="16">Leite condensado</option>
			<option value="17">gelatina</option>
			<option value="18">Molho de tomate</option>
			<option value="19">Yakult</option>
			<option value="20">Bis</option>
		</select> <br>
		<br>
		<button id="botao" type="submit">Enviar</button>
	</form>
</div>
<?php require "rodape.php"; ?>
</body>
</html>
<?php adicionarProduto(); ?>