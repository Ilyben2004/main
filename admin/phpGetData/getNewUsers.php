<?php
require '../../PHP/Functions.php';

// Retrieve the variable from JavaScript
$data = $_GET['data'];
$genre = $_GET['genre'];



echo json_encode(getNewUsers($data,$genre));
?>
