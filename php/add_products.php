<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";
$getTitle = "SELECT id as id, title as title FROM gry";

if (isset($_POST['product_name'])){
    
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO products (game, price, available)
    VALUES
    ('$product_name', '$price', '1')";
   
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "<br><br>";
    
    
}

?>
<h1 style="text-align: center">Dodaj Produkt</h1>
<form name="add_game_form" action="index.php?subpage=3" method="POST">

    <div class="form-group col-md-2">
        <label for="product_name">Nazwa produktu</label>
        <select id="product_name" name="product_name" class="form-control">
            <option disabled selected value> -- select an option -- </option>
            <?php


            $result = $conn->query($getTitle);

            while ($row = $result->fetch_assoc()){
                ?>
                <option value="<?php echo $row['id']; ?>"  ><?php echo $row["title"];?></option>

                <?php
            }
            ?>
        </select>
    </div>


    <div class="form-group col-md-2">
        <label for="price">cena</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Cena">
    </div>
    
   

    <button type="submit" class="btn btn-primary" style="margin-left: 15px">Dodaj produkt</button>
</form>

