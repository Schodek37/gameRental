<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";
$result = $conn->query($sql_showDevelopers);
echo "<table><th>ID</th><th>Developer</th><th>Założone</th><th>Zamknięte</th><th>Kraj</th><th>Zdjęcie</th>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. 
        "</td><td>" . $row["name"]. 
        "</td><td>" . $row["est"]. 
        "</td><td>" . $row["closed"].
        "</td><td>" . $row["country"].
        "</td><td>" ."<img src=".$row[url]." style='width:100px;height:100px;'>".
        "</td></tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?>