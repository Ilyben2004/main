<?php
require '../../PHP/Functions.php';

$data = $_GET['data'];
$genre = $_GET['genre'];
echo json_encode(allProductsLikesChart($data,$genre));
?>
