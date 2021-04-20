<?php
echo "<PRE>";

//https://api.hgbrasil.com/weather?woeid=455943    
//https://api.hgbrasil.com/geoip?key=50e8fbdd&address=remote&precision=false
//https://api.hgbrasil.com/finance/stock_price?key=50e8fbdd&symbol=bbas3


//$json_str = file_get_contents('https://api.hgbrasil.com/weather?woeid=455943');   // chama uma requisicao
$json_str = file_get_contents('http://15.228.78.221/php_app/temperaturasendjson.php');
// converte um retorno para uma string     
 
 //print_r($json_str);

$jsonObj = json_decode($json_str);   // retorna objetos
$clientes = $jsonObj->wheater;
print_r($clientes->temperatura);
//echo $clientes->description;
//print_r($clientes->forecast);
//print_r($clientes->forecast[0]);

/*
foreach ( $clientes->forecast as $linha )
    {
	echo "data: $linha->date - desc: $linha->description - min: $linha->min<br>";
    }
*/

?>