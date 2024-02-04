<?php 
include "Functions.php";

$userId = $_POST['user_id'];
echo executeSingleValueQuery("SELECT SUM(p.quantity * pr.PRIX) + 20 AS total_price FROM panier p JOIN products pr ON p.id_product = pr.id and p.id_user=$userId;");