<?php
require_once "dbConnectionData.php";
require_once "sqlStrings.php";

   if (isset($_POST['name'])){
    
    echo "<p>Content variables $_POST is:</p>";
   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $address_details = $_POST['address_details'];
   $address = $_POST['address'];
   $email = $_POST['email'];
   $phone_number = $_POST['phone_number'];
   
   
   
   $sql = "INSERT INTO clients (name, surname, address, address_details, email, phone)
   VALUES
   ('$name', '$surname', '$address', '$address_details', '$email', '$phone_number' )";
   
  if ($conn->query($sql) === TRUE) {
      $last_id = $conn->insert_id;
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "<br><br>";

    
    
}
        
?>

<h1 style="text-align: center">Dodaj Klienta</h1>
<form name="add_clients_form" action="index.php?subpage=5" method="POST">

    <div class="form-row">
        <div class="form-group col-md-2" style="margin-left: 15px">
            <label for="name">Imię</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Imię">
        </div>

        <div class="form-group col-md-2" style="margin-left: 35px">
            <label for="surname">Nazwisko</label>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Nazwisko">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2" style="margin-left: 15px">
            <label for="city">Adres (kod pocztowy, miasto)</label>
            <input type="text" class="form-control" id="city" name="address_details" placeholder="11-111, Szczecin">
        </div>


        <div class="form-group col-md-2" style="margin-left: 35px">
            <label for="street">Ulica</label>
            <input type="text" class="form-control" id="street" name="address" placeholder="Ulica">
        </div>
    </div>

    <div class="form-group col-md-2">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
    </div>


    <div class="form-group col-md-2">
        <label for="phone_number">Numer Telefonu</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Numer Telefonu">
    </div>


    <button type="submit" class="btn btn-primary" style="margin-left: 15px">Dodaj klienta</button>
</form>
