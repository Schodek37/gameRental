<?php
$sql_showGames = "SELECT gry.id as id, \n"

    . "gry.title as title, \n"

    . "developers.name as dev, \n"

    . "g1.name as genre1, \n"

    . "g2.name as genre2, \n"

    . "g3.name as genre3,\n"

    . "ratings.rating as rat, \n"

    . "img.url as url,\n"

    . "pegi.rating as peg, \n"

    . "gry.year \n"

    . "from gry\n"

    . "join developers on(developers.id=gry.dev_id)\n"

    . "join genre g1 on(g1.id=gry.genre_1)\n"

    . "join genre g2 on(g2.id=gry.genre_2)\n"

    . "join genre g3 on(g3.id=gry.genre_3)\n"

    . "join ratings on (ratings.id=gry.rating)\n"

    . "join img on (img.id=gry.img)\n"

    . "join pegi on (pegi.id=gry.pegi)";


$sql_showProducts = "SELECT products.id as id,gry.title as title,products.price as price,products.available as available from products,gry where products.game=gry.id";
$sql_showDevelopers = "SELECT developers.id as id,developers.name as name,im.url as url,developers.est as est,developers.closed as closed,countries.name as country FROM developers join countries on (developers.country = countries.id) join img im on(developers.img=im.id)";
$sql_showClients = "SELECT id,name,surname,address,address_details,email,phone FROM `clients`";
$sql_showOrders ="SELECT orders.id as id, clients.name as imie, clients.surname as nazwisko, clients.id as id_client, orders.start_date as starts, orders.end_date as ends,orders.total_price as total FROM `orders`\n"

    . "join clients on(clients.id=orders.client)";

$getGenres = "SELECT id as id,name as name from genre LIMIT 18";
$getPegi = "SELECT id as id,rating as rat from pegi";
$getDevs = "SELECT id as id,name as name from developers";
$getRating = "SELECT id as id,rating as rat from pegi";
$getClients = "select id as id, name as name, surname as surname from clients";


