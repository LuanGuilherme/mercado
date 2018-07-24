<?php 
require 'cnx.php';
session_start();
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
?>