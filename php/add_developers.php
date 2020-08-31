<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";
  if (isset($_POST['dev_name'])){
    
   $dev_name = $_POST['dev_name'];
   $url = $_POST['url'];
   $est = $_POST['est'];
   $closed = $_POST['closed'];
   $country = $_POST['country'];
  
  $sql = "INSERT INTO img (url) VALUES ('$url')";
   
  if ($conn->query($sql) === TRUE) {
      $last_id = $conn->insert_id;
      //echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "<br><br>";

    $sql2 = "INSERT INTO developers(name, img, est, closed, country) 
    VALUES
    ('$dev_name','$last_id','$est','$closed','$country')";
    
    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
    }else{
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
      
      
    }
?>

<h1 style="text-align: center">Dodaj developera</h1>
<form id="add_dev" action="index.php?subpage=2" method="POST">
    <div class="form-group col-md-2">
        <label for="dev_name">Nazwa wydawcy</label>
        <input type="text" class="form-control" id="dev_name" name="dev_name" placeholder="Nazwa wydawcy">
    </div>

    <div class="col-md-4 mb-3">
        <label for="url">Zdjęcie wydawcy</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="img link">
    </div>


    <div class="col-md-4 mb-2">
        <label for="est">Data założenia firmy</label>
        <input type="text" class="form-control" id="est" name="est" placeholder="15 marca 2010">
    </div>


    <div class="col-md-4 mb-2">
        <label for="closed">Data zamknięcia firmy</label>
        <input type="text" class="form-control" id="closed" name="closed"  placeholder=" - ">
    </div>
    
    <div class="form-group col-md-2">
        <label for="country">Kraj</label>
        <select id="country" name="country" class="form-control">
            <?php
                    $result = $conn->query($getCountry);
        
                    while ($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id']; ?>"  ><?php echo $row["country"];?></option>
        
                        <?php
                    }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left: 15px">Dodaj producenta</button>
</form>
