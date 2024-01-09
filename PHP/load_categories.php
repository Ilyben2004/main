<?php
include "./config.php";



$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

$products_query = "SELECT * FROM products WHERE id_Category = (SELECT id FROM category WHERE Category_Name LIKE '$categoryFilter')";

$result = mysqli_query(db(), $products_query);

$products = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

header('Content-Type: application/json');

echo json_encode($products);
?>
