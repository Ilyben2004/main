<?php 
require '../../../PHP/Functions.php';

$newEtat = $_POST['Etat'];
$idUser = $_POST['user_id'];
$updateQuery="UPDATE users SET Suspended=$newEtat WHERE ID =$idUser ;";

echo executeUpdateQuery($updateQuery);



?>