<!DOCTYPE html>
<html>
<head>
	<title>Calcula Frete</title>
	<meta charset="utf-8">
</head>
<body>
<form>
	<input type="" name="cep_o">
	<input type="" name="cep_d">
	<input type="" name="p">
	<input type="" name="a">
	<input type="" name="l">
	<input type="" name="c">
	<input type="submit" name="VAI">
</form>
</body>
</html>
<?php
function calculaFrete($cep_origem, $cep_destino, $peso, $altura, $largura, $comprimento, $valor_declarado='0'){
	$cod_servico = 40010;
	$correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$cep_origem."&sCepDestino=".$cep_destino."&nVlPeso=".
	$peso."&nCdFormato=1&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=n&nVlValorDeclarado=".$valor_declarado.
	"&sCdAvisoRecebimento=n&nCdServico=".$cod_servico."&nVlDiametro=0&StrRetorno=xml";
	$xml = simplexml_load_file($correios);
	var_dump($xml);
	$vet = array();
	$vet["valor"] = $xml;
	print_r($vet["valor"]);
}
$co = $_GET["cep_o"];
$cd = $_GET["cep_d"];
$p = $_GET["p"];
$a = $_GET["a"];
$l = $_GET["l"];
$c = $_GET["c"];
calculaFrete ($co, $cd, $p, $a, $l, $c);
?>