<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";
$result = $conn->query($sql_showOrders);

if ($result->num_rows > 0) {
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["ends"] != "1970-01-01"){
            echo "<table><th>ID</th><th>Dane klienta</th><th>ID klienta</th><th>Wypożyczone</th><th>Data zwrotu</th><th>Cena całkowita</th>";
            echo "<tr><td>" . $row["id"].
                "</td><td>" . $row["imie"]." ".$row["nazwisko"].
                "</td><td>" . $row["id_client"].
                "</td><td>" . $row["starts"].
                "</td><td>" . $row["ends"].
                "</td><td>" . $row["total"].
                "</td></tr>";
                $result2=$conn->query("SELECT partial_order.id_produktu as id,gry.title as game from partial_order\n"
    
                    . "join products on(partial_order.id_produktu=products.id)\n"
    
                    . "join orders on (partial_order.id_zam=orders.id)\n"
    
                    . "join clients on (clients.id=orders.client)\n"
    
                    . "join gry on (gry.id=products.game)\n"
    
                    . "where clients.id=".$row["id_client"]." and partial_order.id_zam=".$row["id"]);
            if ($result2->num_rows > 0) {
            // output data of each row
            echo "<tr><table><th>ID produktu</th><th>Gra</th>";
            while($row2 = $result2->fetch_assoc()) {
            echo "<tr><td>" . $row2["id"].
                 "</td><td>" . $row2["game"].
                 "</td></tr>";
            }
            } else {
                echo "0 results";
            }
            echo "</tr></table><br>";
       } 
        
    }
} else {
    echo "0 results";
}
echo "</tr></table>";
$conn->close();
?>
