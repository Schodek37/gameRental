<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    
    
        </head>

<body>
<div id="container">
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dodaj...
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?subpage=1">...gry</a>
                            <a class="dropdown-item" href="index.php?subpage=2">...producentów</a>
                            <a class="dropdown-item" href="index.php?subpage=3">...produkty</a>
                            <a class="dropdown-item" href="index.php?subpage=4">...zamówienia</a>
                            <a class="dropdown-item" href="index.php?subpage=5">...klientów</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pokaż...
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?subpage=6">...gry</a>
                            <a class="dropdown-item" href="index.php?subpage=7">...producentów</a>
                            <a class="dropdown-item" href="index.php?subpage=8">...produkty</a>
                            <a class="dropdown-item" href="index.php?subpage=9">... aktualne zamówienia</a>
                            <a class="dropdown-item" href="index.php?subpage=12">... historyczne zamówienia</a>
                            <a class="dropdown-item" href="index.php?subpage=10">...klientów</a>
                        </div>
                    </li>
                    
                    <a class="nav-link" href="index.php?subpage=11" id="navbarDropdown3" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            Zakończ zamówienie (zwrot)
                    </a>

                </ul>

            </div>
        </nav>
    </div>


    <div id="container" style="margin: 15px">
        <?php
        if (isset($_GET['subpage'])) {
            if ($_GET['subpage'] == 1) {
                include 'php/add_games.php';
            } else if ($_GET['subpage'] == 2) {
                include 'php/add_developers.php';
            } else if ($_GET['subpage'] == 3) {
                include 'php/add_products.php';
            } else if ($_GET['subpage'] == 4) {
                include 'php/add_orders.php';
            } else if ($_GET['subpage'] == 5) {
                include 'php/add_clients.php';
            } else if ($_GET['subpage'] == 6) {
                include 'php/show_games.php';
            } else if ($_GET['subpage'] == 7) {
                include 'php/show_developers.php';
            } else if ($_GET['subpage'] == 8) {
                include 'php/show_products.php';
            } else if ($_GET['subpage'] == 9) {
                include 'php/show_orders.php';
            } else if ($_GET['subpage'] == 10) {
                include 'php/show_clients.php';
            }else if ($_GET['subpage'] == 11) {
                include 'php/update_products.php';
            }else if ($_GET['subpage'] == 12) {
                include 'php/show_historic.php';
            }
        } else {
            echo "<h1> To jest strona główna </h1> ";
            echo "Wybierz funkcjonalność z górnego menu";
        }
        ?>
    </div>
 <div class="container p-3 my-3"></div>

    <!-- Footer -->
    <footer class="page-footer font-small blue fixed-bottom  bg-light">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            Rent a Game!
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

</div>
</body>

</html>