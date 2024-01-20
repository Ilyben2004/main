<?php
require '../../PHP/Functions.php';

// Retrieve the variable from JavaScript
$data = $_GET['data'];




echo json_encode(GetOneCategoryInfo($data));
?>
