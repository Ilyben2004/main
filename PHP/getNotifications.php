<?php

require "Functions.php"; 


$notifications = getAllNotifications();

$jsonData = json_encode($notifications);

// Echo the JSON data
echo $jsonData;

      


?>
