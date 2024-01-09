<?php
require 'Functions.php';
$var1 = $_POST['idU'] ?? '';
$var2 = $_POST['idP'] ?? '';





if (deleteUserLikeProduct($var1, $var2)){


echo 'product removed successfully';
}
else{
    echo 'error';
}

?>
