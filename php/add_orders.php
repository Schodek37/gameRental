<?php
require_once "sqlStrings.php";
require_once "dbConnectionData.php";

     if (isset($_POST['client_id'])){
         $client_id = $_POST['client_id'];
         $start_date = $_POST['start_date'];
         $end_date = "1970-01-01";
       
       $products_value = 0.0;
      
    foreach($_POST['products'] as $selectedOption){
        $getValue = "SELECT price as price FROM products where id =".$selectedOption;
        $result = $conn->query($getValue);
        $conn->query("UPDATE products SET available = 0 WHERE id =".$selectedOption);
  
        if($row = $result->fetch_assoc()) {
            $products_value += $row["price"];
        }
        
    }
     
    $order = "INSERT INTO orders(client, start_date, end_date, total_price)
    VALUES 
    ('$client_id', '$start_date', '$end_date', '$products_value')";
    
    
    
    if ($conn->query($order) === TRUE) {
        echo "New record created successfully ";
         $last_id = $conn->insert_id;
         
         foreach($_POST['products'] as $selectedOption){ 
         $order = "INSERT INTO partial_order (id_zam, id_produktu)
         VALUES 
         ('$last_id', '$selectedOption')";
         
           
            if ($conn->query($order) === TRUE) {
                //echo "New partial order created successfully ";
            }else{
                echo "Error: " . $order . "<br>" . $conn->error;
            }

             
         }
          
         
    }else{
        echo "Error: " . $order . "<br>" . $conn->error;
    }
    
        
    }
        
   

?>

<h1 style="text-align: center">Dodaj zamówienie</h1>
<form name="add_order_form"  action="index.php?subpage=4" method="POST">

    <div class="form-group col-md-2">
        <label for="client_id">ID Klienta</label>
        <select id="client_id" name="client_id" class="form-control">
            <option disabled selected value> -- select an option -- </option>
            <?php
            $result = $conn->query($getClients);
            while ($row = $result->fetch_assoc()){
                ?>
                <option value="<?php echo $row['id']; ?>"  ><?php echo $row['id']." ".$row['name']." ".$row['surname'] ?></option>
                <?php
            }
            ?>
        </select>
    </div>

   
    <div class="form-row" style="margin-left: 10px">
        <div class="form-group col-md-2">
            <label for="products">Produkty<br>(aby dodać wiele, zaznaczaj z CTRL)</label>
            <select id="products"  name="products[]" class="form-control"  multiple>
                <?php
                $prodWhere = "SELECT products.id as id,gry.title as title,products.price as price,products.available as available from products,gry where products.game=gry.id and products.available=1";
                $result = $conn->query($prodWhere);
                while ($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['id']; ?>"  ><?php echo $row['title'];?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group col-md-2">
        <label for="start_date">Data wypożyczenia:</label>
        <input type="date" id="start_date" name="start_date">
    </div>
    
  <!-- <div class="form-group col-md-2">
        <label for="end_date">Data oddania:</label>
        </br>
        <input type="date" id="end_date" name="end_date">
    </div>
   --> 

    <button type="submit" class="btn btn-primary" style="margin-left: 15px">Złóż zamówienie</button>
     
</form>
