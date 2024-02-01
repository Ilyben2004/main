<?php 
include "Functions.php";

$userId = $_POST['user_id'];


$query =  " SELECT COUNT(*) FROM PANIER WHERE id_user=$userId";


echo executeSingleValueQuery($query);
