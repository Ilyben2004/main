<?php
 require '../../../php/Functions.php';


$data = $_GET['idUser'];
$message = $_GET['message'];



echo json_encode(insertMessage($message , 0,$data));

