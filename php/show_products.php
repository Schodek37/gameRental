<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";
$result = $conn->query($sql_showProducts);
echo "<table><th>ID</th><th>Gra</th><th>Cena</th><th>Dostępne sztuki</th>";
if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. 
        "</td><td>" . $row["title"]. 
        "</td><td>" . $row["price"]. 
        "</td><td>". $row["available"].
        "</td><tr>";
    }
} else {
    echo "0 results";
}
    echo "</table>";

$conn->close();
?>
