<?php
require 'Functions.php';


// Get the value of 'orderId' from the URL
$orderId = $_GET['orderId'] ?? null;



$updateQuery = "UPDATE orders SET STATUS = 'Completed' WHERE id = '$orderId';";
executeUpdateQuery($updateQuery);
// Now you can use $orderId in your script

// Rest of your PHP code...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    #container{
        width:100%;
        height: 100%;
        padding-top:4%;
        
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed</title>
</head>
<body>

<div class="container">
<center>
<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10L12.2581 12.4436C12.6766 12.7574 13.2662 12.6957 13.6107 12.3021L20 5" stroke="#267e25" stroke-linecap="round"></path> <path d="M21 12C21 13.8805 20.411 15.7137 19.3156 17.2423C18.2203 18.7709 16.6736 19.9179 14.893 20.5224C13.1123 21.1268 11.187 21.1583 9.38744 20.6125C7.58792 20.0666 6.00459 18.9707 4.85982 17.4789C3.71505 15.987 3.06635 14.174 3.00482 12.2945C2.94329 10.415 3.47203 8.56344 4.51677 6.99987C5.56152 5.4363 7.06979 4.23925 8.82975 3.57685C10.5897 2.91444 12.513 2.81996 14.3294 3.30667" stroke="#267e25" stroke-linecap="round"></path> </g></svg>
<h2>YOUR ORDER HAS BEEN CONFIRMED SUCCESSFULLY </h2>
</center>
</div>
    
</body>
</html>