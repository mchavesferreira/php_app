<!DOCTYPE html>
<html><body>
<?php
/*
https://randomnerdtutorials.com/esp32-esp8266-mysql-database-php/

Adaptacao Marcos Chaves // dados no formato tabela
*/


include("connect.php");

$link = Connection();


$sql = "SELECT timeStamp, temperature, humidity FROM tempLog ORDER BY timeStamp DESC limit 10";

$result = mysqli_query($link, $sql);
echo "numero de linhas:";
echo mysqli_num_rows($result);
echo "<BR>";


echo '<table cellspacing="5" cellpadding="5">
      <tr> 
         <td>Value 1</td> 
        <td>Value 2</td>
        <td>Timestamp</td> 
      </tr>';
 
      mysqli_close($link);

if (mysqli_num_rows($result)) {     
    while ($row = $result->fetch_assoc()) {
        $row_value1 = $row["temperature"];
        $row_value2 = $row["humidity"]; 
        $row_value3 = $row["timeStamp"]; 

        echo '<tr> 
                <td>' . $row_value1 . '</td> 
                <td>' . $row_value2 . '</td>
                <td>' . $row_value3 . '</td> 
          
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>
