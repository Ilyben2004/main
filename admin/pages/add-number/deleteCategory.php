<?php
  require '../../../php/Functions.php';

// Retrieve the variable from JavaScript
$Category = $_GET['Category'];




echo json_encode(categoryContainsProducts($Category));
?>
