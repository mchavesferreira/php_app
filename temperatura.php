
<?php
/*
https://randomnerdtutorials.com/esp32-esp8266-mysql-database-php/

Adaptacao Marcos Chaves // imprimindo ultima temperatura
*/


include("connect.php");

$link = Connection();


$sql = "SELECT temperature FROM tempLog ORDER BY timeStamp DESC limit 1";

$result = mysqli_query($link, $sql);

 mysqli_close($link);

if (mysqli_num_rows($result)) {     
    while ($row = $result->fetch_assoc()) {
        $row_value1 = $row["temperature"];
        echo  "$row_value1";
    }
    $result->free();
}

$conn->close();
?> 
