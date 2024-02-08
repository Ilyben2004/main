<?php
require 'Functions.php';
$idUSER = $_POST['user_id'] ?? '';
$message = $_POST['message'] ?? '';

if(insertMessage($message,$idUSER,0)){



echo "success";
}
else{
    echo "no";

}

?>
