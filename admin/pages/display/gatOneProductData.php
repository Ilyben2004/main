<?php
$someVariable = $_POST['idP'];

require '../../../PHP/Functions.php';

$connection = connect();

$sql = "SELECT 
p.id, 
p.title, 
p.PRIX, 
p.Quantity, 
p.DESCREPTION, 
p.image_file, 
c.Category_name FROM 
   products p 
   LEFT JOIN 
   category c ON c.id = p.id_category
   WHERE p.id = '$someVariable'";
$result = $connection->query($sql); // Change $conn to $connection here

if ($result->num_rows > 0) {
    // Fetch the entire row as an associative array
    $row = $result->fetch_assoc();

    // Convert the row to JSON format
    $jsonResponse = json_encode($row);

    // Output the JSON response
    echo $jsonResponse;
} else {
    echo "No results found";
}

$connection->close(); // Change $conn to $connection here
?>
