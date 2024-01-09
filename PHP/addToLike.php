<?php
require 'Functions.php';
$var1 = $_POST['idU'] ?? '';
$var2 = $_POST['idP'] ?? '';




if (addUserLikeProduct($var1, $var2)){


echo 'product liked successfully';
}
else{
    echo 'error';
}

?>
