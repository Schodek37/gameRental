<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";

   if (isset($_POST['title'])){
    
    
   $title = $_POST['title'];
   $dev = $_POST['dev'];
   $genre1 = $_POST['genre1'];
   $genre2 = $_POST['genre2'];
   $genre3 = $_POST['genre3'];
   $rating = $_POST['rating']-1;
   $url = $_POST['url'];
   $pegi = $_POST['pegi']-1;
   $year = $_POST['year'];

   
   $sql = "INSERT INTO img (url) VALUES ('$url')";
   
  if ($conn->query($sql) === TRUE) {
      $last_id = $conn->insert_id;
      //echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "<br><br>";

    $sql2 = "INSERT INTO gry(title, dev_id, genre_1, genre_2, genre_3, rating, img, pegi, year) 
    VALUES
    ('$title','$dev','$genre1','$genre2','$genre3','$rating','$last_id','$pegi','$year')";
    
    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully ";
    }else{
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
    
}
        
?>
<h1 style="text-align: center">Dodaj grę</h1>
<form action="index.php?subpage=1" method="POST" name="add_game_form">

    <div class="form-group col-md-2">
        <label for="title">Tytuł</label>
        <input type="title" class="form-control" id="title" name="title" placeholder="Tytuł">
    </div>
    <div class="form-group col-md-2">
        <label for="dev">Developer</label>
        <select id="dev" name="dev" class="form-control">
            <?php


            $result = $conn->query($getDevs);

            while ($row = $result->fetch_assoc()){
                ?>
                <option value="<?php echo $row['id']; ?>"  ><?php echo $row["name"];?></option>

                <?php
            }
            ?>
        </select>
    </div>

    <div class="form-row" style="margin-left: 10px">
        <div class="form-group col-md-2">
            <label for="genre1">Gatunek1</label>
            <select id="genre1" name="genre1" class="form-control">
                <option value="19">Wybierz Gatunek</option>
                <?php

                    $result = $conn->query($getGenres);
        
                    while ($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id']; ?>"  ><?php echo $row["name"];?></option>
        
                        <?php
                    }
                 ?>
            </select>
        </div>
        <br>
        <div class="form-group col-md-2" style="margin-left: 15px">
            <label for="genre2">Gatunek2</label>
            <select id="genre2" name="genre2" class="form-control">
                    <option value="19">Wybierz Gatunek</option>
                <?php
                    $result = $conn->query($getGenres);
    
                    while ($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id']; ?>"  ><?php echo $row["name"];?></option>
        
                <?php
                    }
                 ?>
            </select>
        </div>
        <div class="form-group col-md-2" style="margin-left: 15px">
            <label for="genre3">Gatunek3</label>
            <select id="genre3" name="genre3" class="form-control">
                    <option value="19">Wybierz Gatunek</option>
                <?php
                    $result = $conn->query($getGenres);
        
                    while ($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id']; ?>"  ><?php echo $row["name"];?></option>
        
                <?php
                    }
                 ?>
            </select>
        </div>
    </div>

    <div class="form-group col-md-2">
        <label for="rating">Ocena gry</label>
        <select id="rating" name="rating" class="form-control">
            <?php
                    $result = $conn->query($getRating);
        
                    while ($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id']; ?>"  ><?php echo $row["rat"];?></option>
        
                        <?php
                    }
            ?>
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="url">Zdjęcie</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="img link">
    </div>

    <div class="form-group col-md-2">
        <label for="pegi">Pegi</label>
        <select id="pegi" name="pegi" class="form-control">
            <?php
                    $result = $conn->query($getPegi);
        
                    while ($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id']; ?>"  ><?php echo $row["rat"];?></option>
        
                        <?php
                    }
            ?>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="year">Rok Produkcji</label>
        <input type="number" class="form-control" id="year" name="year" placeholder="2020">
    </div>

    <button type="submit" class="btn btn-primary" style="margin-left: 15px">Dodaj grę</button>
</form>
