<?php
require 'Functions.php';
$idUSER = $_POST['user_id'] ?? '';



$messages = getMessagesForUser($idUSER);

$jsonData = json_encode($messages);

// Echo the JSON data
echo $jsonData;

?>
