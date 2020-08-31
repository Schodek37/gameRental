<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";
$result = $conn->query($sql_showClients);
    echo "<table><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Adres</th><th>Email</th><th>Telefon</th>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"].
        "</td><td>".$row["name"].
        "</td><td>" .$row["surname"].
        "</td><td>" .$row["address"]." ".$row["address_details"].
        "</td><td>".$row["email"].
        "</td><td>".$row["phone"].
        "</td></tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?>