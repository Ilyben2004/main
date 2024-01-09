<?php 
require 'Functions.php';

$var1 = $_POST['idU'] ?? '';

addLikedProductsToCart($var1);


echo 'products added to the cart ';



?>