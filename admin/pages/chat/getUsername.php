<?php
 require '../../../php/Functions.php';


$data = $_GET['idUser'];

$query ="select USERNAME from users where id=$data";

echo json_encode(executeSingleValueQuery($query));

