<?php 
include "config.php";
include "Functions.php";


$conn = db();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $orderID = isset($_POST['orderID']) ? intval($_POST['orderID']) : 0;
    $canceled = "Cancelled";
    $stmt = $conn->prepare("UPDATE orders SET STATUS ='$canceled' WHERE id= ?");
    $stmt->bind_param("i", $orderID);

    // **************
$query = "select username from users where id in (select id_user from orders where id=$orderID);";
$user= executeSingleValueQuery($query);
$currentDateTime = new DateTime();

// Extract year, month, hour, and minutes
$formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

$message = "the command passed by ".$user." has been cancelled "; 
$notiQuery = "INSERT INTO notifications (message,dateMessage,type) values ('$message','$formattedDateTime','command')";
mysqli_query($conn, $notiQuery);

//**************** */

    if ($stmt->execute()) {
        echo "Order canceled successfully";
    } else {
        echo "Error canceling order: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}


?>