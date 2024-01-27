<?php
require '../../../../PHP/Functions.php';

$connection = connect();

    $id = $_GET['id']; // Ensure variable name matches what you're sending

    $deleteQuery = "DELETE FROM products  WHERE id = '$id'"; // Use $id here, not $pid

    // Execute the delete query
    if (mysqli_query($connection, $deleteQuery)) {
        echo "Delete successful!";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }


?>
