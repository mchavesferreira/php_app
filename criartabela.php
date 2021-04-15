<?php
// arquivo de conexao
include("connect.php");

$link = Connection();

//criar uma tabela no database
$querynovo = "CREATE TABLE tempLoga (   timeStamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, temperature int(11) NOT NULL,  humidity int(11) NOT NULL, PRIMARY KEY (timeStamp) ) ";



$result = mysqli_query($link, $querynovo);
echo "sql executado";
?>