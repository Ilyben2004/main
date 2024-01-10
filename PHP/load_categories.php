<?php
include "./config.php";



$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$your_user_id = isset($_GET['Userid']) ? $_GET['Userid'] : '';


$products_query = "
    SELECT p.*,
        CASE WHEN lp.idProduct IS NULL THEN 0 ELSE 1 END AS isLiked
    FROM products p
    LEFT JOIN (
        SELECT idProduct
        FROM likedproducts
        WHERE idUser = $your_user_id
    ) lp ON p.id = lp.idProduct
    WHERE p.id_Category = (
        SELECT id
        FROM category
        WHERE Category_Name LIKE '$categoryFilter'
    )
";

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
