<?php


function db() {
    $host = "localhost:3306";
    $username = "root";
    $password = "";
    $db = "moukhliss_store";

    $conn = new mysqli($host, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function getQuantity($userId, $productId) {
    $conn = db();

    $selectQuery = "SELECT quantity FROM panier WHERE id_user = ? AND id_product = ?";
    $stmt = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $resultQuantity);

    if (mysqli_stmt_fetch($stmt)) {
        return $resultQuantity;
    } else {
        return "";
    }

    mysqli_stmt_close($stmt);
}

function addQuantity($userId, $productId) {
    $conn = db();

    $updateQuery = "UPDATE panier SET quantity = quantity + 1 WHERE id_user = ? AND id_product = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if (!$stmt) {
        die("Error in preparing the statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);

    $success = mysqli_stmt_execute($stmt);

    if (!$success) {
        die("Error in executing the statement: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);

    mysqli_close($conn);

    return $success;
}
function doesUserLikeProduct($idUser, $idProduct) {
    $conn = db(); // Assuming db() function returns a mysqli connection

    $query = "SELECT COUNT(*) AS count FROM likedproducts WHERE idUser = ? AND idProduct = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $idUser, $idProduct);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return ($row['count'] > 0);
}



?>