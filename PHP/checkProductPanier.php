<?php 
include "config.php";

$userId = $_POST['user_id'];
$productId = $_POST['product_id'];


$mysqli = db();

$res = $mysqli->query("SELECT 
*
FROM 
panier
WHERE id_user='$userId' AND id_product='$productId' ;
");

 if ($res->num_rows > 0){
    echo 1;
}
else{
    echo 0;
}

