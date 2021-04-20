
<?php
/*

Adaptacao Marcos Chaves // imprimindo ultima temperatura e humidade em json
*/


include("connect.php");

$link = Connection();


$sql = "SELECT temperature, humidity FROM tempLog ORDER BY timeStamp DESC limit 1";

$result = mysqli_query($link, $sql);

 mysqli_close($link);

if (mysqli_num_rows($result)) {     
    while ($row = $result->fetch_assoc()) {
        $temperatura = $row["temperature"];
        $humidade = $row["humidity"];
    }
  //  $result->free();
}


$dadoswheather = array( 'RA' => 'CT120893',
          'temperatura' => $temperatura,
          'humidade' => $humidade );

 // Atribui os 3 arrays apenas um array
$dados = array($cliente1);

// Adiciona o identificador "Contatos" aos dados
$dados_identificador = array('wheater' => $dadoswheather); //dados

header('Content-type: application/json');
$body = file_get_contents('php://input');

// Tranforma o array $dados_identificador em JSON
$dados_json = json_encode($dados_identificador);

print_r($dados_json);
// Escreve o conteúdo JSON no arquivo

?> 
