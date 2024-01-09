<?php
include "./config.php";


$searchTerm = $_GET['term'] ?? '';

$search_query = "SELECT * FROM products WHERE title LIKE '%$searchTerm%'";
$result = mysqli_query(db(), $search_query);

$products = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

echo json_encode($products);
?>
