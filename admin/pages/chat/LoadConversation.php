<?php
 require '../../../php/Functions.php';


$data = $_GET['idUser'];


echo json_encode(getConversationforAdmin($data));

