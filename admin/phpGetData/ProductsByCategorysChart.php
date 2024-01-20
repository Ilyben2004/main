<?php
require '../../PHP/Functions.php';
$data = $_GET['data'];

// Retrieve the variable from JavaScript


echo json_encode(ProductsByCategorysChart());
?>
