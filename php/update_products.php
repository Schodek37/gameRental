<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";
$getOrders = "SELECT id as id, client as client FROM orders WHERE end_date='1970-01-01'";
$today = date("Y-m-d");

if(isset($_POST['order_list'])){
    $selected_id = $_POST['order_list'];
    $sql = "update products \n"

    . "join partial_order on(partial_order.id_produktu=products.id)\n"

    . "join orders on(orders.id=partial_order.id_zam)\n"

    . "set available=1\n"

    . "where orders.id=".$selected_id;
    
    $today = date("Y-m-d");
    $sql2 = "UPDATE orders SET end_date=now() where orders.id=".$selected_id;
    
     if ($conn->query($sql) === TRUE) {
       // echo "Products have been updated ";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    if ($conn->query($sql2) === TRUE) {
        echo "Products have been updated ";
    }else{
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
    
}

echo "<br><br>";

?>

<form name="update_products" action="index.php?subpage=11" method="POST">
    <div class="form-row" style="margin-left: 10px">
            <div class="form-group col-md-2">
                <label for="order_list">Lista Zamówień</label>
                <select id="order_list" name="order_list" class="form-control">
                    <option disabled selected value> -- Wybierz numer zamówienia -- </option>
                    <?php
    
                        $result = $conn->query($getOrders);
            
                        while ($row = $result->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['id']; ?>"  ><?php echo $row["id"];?></option>
            
                            <?php
                        }
                     ?>
                </select>
            </div>
    </div>
    
    <br><br>
     <button type="submit" class="btn btn-primary" style="margin-left: 15px">Zaktualizuj produkt</button>
</form>