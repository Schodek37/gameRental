<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";

$result = $conn->query($sql_showGames);
echo "<table><th>ID</th><th>Tytuł</th><th>Developer</th><th>Gatunek</th><th>Ocena</th><th>Okładka</th><th>PEG</th><th>Rok</th>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. 
        "</td><td>" . $row["title"]. 
        "</td><td>" . $row["dev"]. 
        "</td><td>" . $row["genre1"]."/".$row["genre2"]."/".$row["genre3"].
        "</td><td>".$row["rat"].
        "</td><td>"."<img src=".$row[url]." style='width:100px;height:150px;'>".
        "</td><td>".$row["peg"].
        "</td><td>".$row["year"].
        "</td></tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?>
