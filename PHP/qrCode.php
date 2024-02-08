<?php
declare(strict_types=1);
require 'Functions.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once('./../vendor/autoload.php');

$var2 = $_POST['idCommand'] ?? '';

$updateQuery = "UPDATE orders SET STATUS = 'Delevring' WHERE id = '$var2';";
executeUpdateQuery($updateQuery);

$query = "select username from users where id in (select id_user from orders where id=$var2);";
$user= executeSingleValueQuery($query);
$conn = connect();
$currentDateTime = new DateTime();

// Extract year, month, hour, and minutes
$formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

$message = "the command passed by ".$user." has been confirmed "; 
$notiQuery = "INSERT INTO notifications (message,dateMessage,type) values ('$message','$formattedDateTime','command')";
mysqli_query($conn, $notiQuery);

$options = new QROptions(
    [
        'eccLevel'   => QRCode::ECC_L,
        'outputType' => QRCode::OUTPUT_IMAGE_PNG, // change this option
        'version'    => 5,
    ]
);

$qrcode = (new QRCode($options))->render('http://192.168.0.158:80/main/php/ConfirmOrder.php?orderId='.$var2, 'fileQR.png'); // change the file extension
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #container{
            border : 2px solid black;
            width:800px;
            height: 1000px;

        }
      img{
        height: 100px;
        width:100px;

      }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create QR Codes in PHP</title>
    <link rel="stylesheet" href="/css/styles.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>
<body>
<div id="container">
    
    <h1>Creating QR Codes in PHP hh</h1>
    <img src='fileQR.png' alt='QR Code' width='800' height='800'>
</div>
<button id="download" >Download</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script type="text/javascript">
  let doc = new jsPDF('p','pt','letter');

doc.addHTML(document.body,function() {
    doc.save('html.pdf');
});
</script>
</body>
<?php echo "yeees"; ?>

</html>
