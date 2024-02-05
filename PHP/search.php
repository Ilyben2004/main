<?php
include "./config.php";
include "./Functions.php";



$searchTerm = $_GET['term'] ?? '';
$idUser = $_GET['idUser'] ?? '';


$search_query = "
    SELECT p.*,
        CASE WHEN lp.idProduct IS NULL THEN 0 ELSE 1 END AS isLiked
    FROM products p
    LEFT JOIN (
        SELECT idProduct
        FROM likedproducts
        WHERE idUser = $idUser
    ) lp ON p.id = lp.idProduct
    WHERE p.title LIKE '%$searchTerm%'
";
$result = mysqli_query(db(), $search_query);

$products = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $row['title'] =  truncateString($row['title']);

        $products[] = $row;
    }
}

echo json_encode($products);
?>
