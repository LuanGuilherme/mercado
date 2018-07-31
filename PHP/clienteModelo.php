<?php 
session_start();
require 'cnx.php';

function adicionarCliente() {
	function cadastra ($nome, $email, $idade, $endereco, $senha, $cpf){
		$busca = "SELECT idcliente FROM clientes";
		if (mysqli_query(conexao(), $busca) == NULL) {
			$sql = "INSERT INTO clientes(idcliente, nomecliente, email, idade, endereco, senha, cpf)
		values (1 , '$nome', '$email', '$idade', '$endereco', '$senha', '$cpf')";
		}else{
			$sql = "INSERT INTO clientes(nomecliente, email, idade, endereco, senha, cpf)
		values ('$nome', '$email', '$idade', '$endereco', '$senha', '$cpf')";
		}
		echo mysqli_query(conexao(), $sql)? "<script> alert('Cadastrado com sucesso'); </script>" : "<script> alert('Não foi possível efetuar o cadastro'); </script>";
		header("refresh:1;url=../index.php");
	}
	foreach ($_POST as $aux){
		$aux = trim(htmlentities($aux));	
	}
	$count = 1;
	if (!empty($_POST)){
		if (empty($_POST["nome"])){
			echo "<script>alert('Preencha o campo Nome!');</script>";
			$count += 1;
		}
		if (empty($_POST["senha"]) or strlen($_POST["senha"]) < 8){
			echo "<script>alert('Preencha corretamente o campo Senha!');</script>";
			$count += 1;
		}
		if (empty($_POST["email"]) or !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			echo "<script>alert('Preencha o campo E-mail corretamente!');</script>";
			$count += 1;
		}
		if (empty($_POST["dia"]) or !filter_var($_POST["dia"], FILTER_VALIDATE_FLOAT) or strlen($_POST["dia"]) < 1){
			echo "<script>alert('Preencha o campo Dia!');</script>";
			$count += 1;
		}
		if (empty($_POST["mes"]) or !filter_var($_POST["mes"], FILTER_VALIDATE_FLOAT) or strlen($_POST["mes"]) < 1){
			echo "<script>alert('Preencha o campo Mês!');</script>";
			$count += 1;
		}
		if (empty($_POST["ano"]) or !filter_var($_POST["ano"], FILTER_VALIDATE_FLOAT) or strlen($_POST["ano"]) < 4){
			echo "<script>alert('Preencha o campo Ano!');</script>";
			$count += 1;
		}
		if (empty($_POST["estado"])){
			echo "<script>alert('Preencha o campo Estado!');</script>";
			$count += 1;
		}
		if (empty($_POST["Cidade"])){
			echo "<script>alert('Preencha o campo Cidade!');</script>";
			$count += 1;
		}
		if (empty($_POST["Rua"])){
			echo "<script>alert('Preencha o campo Rua!');</script>";
			$count += 1;
		}
		if (empty($_POST["numero"]) or !filter_var($_POST["numero"], FILTER_VALIDATE_FLOAT)){
			echo "<script>alert('Preencha o campo Número com um número inteiro!');</script>";
			$count += 1;
		}
		if (empty($_POST["cpf"]) or !filter_var($_POST["cpf"], FILTER_VALIDATE_FLOAT) or strlen($_POST["cpf"]) <> 11){
			echo "<script>alert('Preencha o campo Cpf com números inteiros!');</script>";
			$count += 1;
		}
		if (!$_POST["Sexo"]){
			echo "<script>alert('Preencha o campo Sexo!');</script>";
			$count += 1;
		}
		if ($count == 1) {
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$idade = (date("Y") - $_POST["ano"]);
			$endereco = $_POST["Cidade"]. " - ". $_POST["estado"];
			$senha = $_POST["senha"];
			$cpf = $_POST["cpf"];
			cadastra ($nome, $email, $idade, $endereco, $senha, $cpf);
		}else{
			echo "<script>alert('Preencha corretamente os campos anteriormente listados'); </script>";
			header("refresh:2;url=../cadastro.php");
		}
	}else{
		print("Você deve preencher o formulário!");
	}

}

function removerCliente() {
	$idcliente = $_SESSION["idcliente"];
	$id = $idcliente["idcliente"];
	$comando = "DELETE FROM clientes WHERE idcliente = $id";
	$retorno = mysqli_query(conexao(), $comando); 
	if ($retorno) {
		session_destroy();
		header("location:../index.php");
	}

}

function atualizarCliente() {
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$idade = (date("Y") - $_POST["ano"]);
	$endereco = $_POST["Cidade"]. " - ". $_POST["estado"];
	$senha = $_POST["senha"];
	$cpf = $_POST["cpf"];
	extract($_SESSION["idcliente"], EXTR_OVERWRITE);
	$comando = "UPDATE clientes
	SET nomecliente = '$nome', email = '$email', idade = '$idade', endereco = '$endereco', senha = '$senha', cpf = '$cpf'
	WHERE idcliente ='$idcliente'";
	echo mysqli_query(conexao(), $comando) ? "<script> alert('Dados alterados com sucesso'); </script>" : "<script> alert('Ocorreu um erro, tente novamente'); </script>";
	header("refresh:1;url=../index.php");

}

function logarCliente() {
	function logar($nome, $senha){
		$sql = mysqli_query(conexao(), "SELECT * FROM clientes WHERE nomecliente='$nome' AND senha='$senha'");
		if (mysqli_num_rows($sql) != 0) {
			$_SESSION["idcliente"] = mysqli_fetch_assoc(mysqli_query(conexao(), "SELECT idcliente FROM clientes WHERE nomecliente='$nome' AND senha='$senha'"));
			extract($_SESSION["idcliente"], EXTR_OVERWRITE);
			header("location:../index.php");
		}else{
			echo "<script> alert('Usuário ou senha invalidos!'); </script>";
			header("refresh:1;url=../login.php");
		}
	}
	$nome = htmlentities(trim(preg_replace('/[^[:alpha:]_]/', '',$_POST["nome"])));
	$senha = htmlentities(trim($_POST["senha"]));
	if ($nome == "Administrador"  && $senha == "rodartsinimda") {
		$_SESSION["adm"] = true;
		header("location:../index.php");
	}else{
		logar($nome, $senha);
	}	
}

function selecionarCliente() {
	
}
?>
