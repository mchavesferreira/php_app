<?php
//echo "<PRE>";

//http://15.228.78.221/php_app/temperaturasendjson.php

$json_str = file_get_contents('https://api.coindesk.com/v1/bpi/currentprice/BRL.json');   // chama uma requisicao
 
//print_r($json_str);

//echo "<BR><hr><BR>";

$jsonObj = json_decode($json_str);   // retorna objetos

//print_r($jsonObj);  // use para imprimir e entender  hieraquia dos dados


$valor = $jsonObj->bpi->BRL-> rate_float;  // separa os campos json e salva na variavel

$dolar = $jsonObj->bpi->USD-> rate_float;


$dados_identificador = array('Cotacao' => $valor,'CotacaoUS' =>  $dolar ); //dados

header('Content-type: application/json');
$body = file_get_contents('php://input');

// Tranforma o array $dados_identificador em JSON
$dados_json = json_encode($dados_identificador);

print_r($dados_json);

?>