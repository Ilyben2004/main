<?php  


function connect(){
    $mysqli = new mysqli('localhost', 'root', '', 'moukhliss_store');
    if($mysqli->connect_errno != 0){
       return $mysqli->connect_error;
    }else{
       $mysqli->set_charset("utf8mb4");	
    }
    return $mysqli;
 }

function get_all_cate(){
   $mysqli = connect();
   $res = $mysqli->query("select * from category ");
   if ($res->num_rows > 0){
   while($row = $res->fetch_assoc()){
      $cate[] = $row;
   }}
   
   return $cate;

 }

 function insertIntoP($title, $description, $price, $id_category,$qt,$imageName) {
   $mysqli = connect();

   if ($mysqli->connect_errno) {
       return false;
   }

   $query = "INSERT INTO products (title, DESCREPTION, prix, id_category,Quantity,image_file) VALUES (?, ?, ?, ?,?,?)";

   if ($stmt = $mysqli->prepare($query)) {
       $stmt->bind_param("ssdiis", $title, $description, $price, $id_category,$qt,$imageName);

       if ($stmt->execute()) {
           $stmt->close();
           $mysqli->close();
           return true;
       } else {
           $stmt->close();
           $mysqli->close();
           return false;
       }
   } else {
       $mysqli->close();
       return false;
   }
}



function getidbycate($category){

   $mysqli = connect();

   if ($mysqli->connect_errno) {
       return false;
   }

   $sql = "SELECT id FROM category WHERE Category_name = '$category'";
   $result = $mysqli->query($sql);
   $row = $result->fetch_assoc();
   $categoryID = $row['id'];

 return $categoryID;
 $mysqli->close();



}

function getAllProducts(){
    $mysqli = connect();
   $res = $mysqli->query("SELECT 
   p.id, 
   p.title, 
   p.PRIX, 
   p.Quantity, 
   p.DESCREPTION, 
   p.image_file, 
   c.Category_name, 
   COUNT(DISTINCT op.id_order) AS times_sold,
   COUNT(DISTINCT lp.idUser) AS num_likes
FROM 
   products p
LEFT JOIN 
   category c ON c.id = p.id_category
LEFT JOIN 
   order_product op ON op.id_product = p.id
LEFT JOIN 
   likedproducts lp ON lp.idProduct = p.id
GROUP BY 
   p.id, 
   p.title, 
   p.PRIX, 
   p.Quantity, 
   p.DESCREPTION, 
   p.image_file, 
   c.Category_name
ORDER BY 
   p.title;
");
   if ($res->num_rows > 0){
   while($row = $res->fetch_assoc()){
      $products[] = $row;
   }}
   else{
     $products=0;
   }
   return $products;

}


function getcatebyid($idcategory){

    $mysqli = connect();
 
    if ($mysqli->connect_errno) {
        return false;
    }
 
    $sql = "SELECT Category_name FROM category WHERE id = '$idcategory'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $categoryName = $row['Category_name'];
 
 return   $categoryName;
 $mysqli->close();
 
 
 
 }

 function getProductsByCategory($category){
    $mysqli = connect();
  
    $res = $mysqli->query("SELECT 
    p.id,
    p.title,
    p.DESCREPTION,
    p.PRIX,
    p.Quantity,
    p.image_file,
    c.Category_name,
    COALESCE(s.times_sold, 0) AS times_sold,
    COALESCE(l.num_likes, 0) AS num_likes
FROM 
    products p
INNER JOIN 
    category c ON c.id = p.id_category 
        AND c.Category_name = '$category'
LEFT JOIN (
    SELECT 
        id_product,
        COUNT(*) AS times_sold
    FROM 
        order_product
    GROUP BY 
        id_product
) s ON p.id = s.id_product
LEFT JOIN (
    SELECT 
        idProduct,
        COUNT(*) AS num_likes
    FROM 
        likedproducts
    GROUP BY 
        idProduct
) l ON p.id = l.idProduct
ORDER BY 
    p.title;

  ");
    if ($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
       $products[] = $row;
    }} 
    return $products;
 }



 function executeSingleValueQuery($query) {
    $mysqli = connect(); 
    if ($mysqli->connect_errno) {
        
        return 0;
    }

    $result = $mysqli->query($query);

    if ($result) {
       
        $row = $result->fetch_row();

        if ($row) {
  
            return $row[0];
        }
        else{
            return 0 ;
        }
    }

  
    return 0;
}


function getAllCommandes(){
    $mysqli = connect();
   $res = $mysqli->query("SELECT o.id, u.FN, u.LN, o.STATUS, o.ordate, o.dilivredate, io.icon
   FROM orders o
   JOIN users u ON o.id_user = u.id 
   JOIN icon_order io ON o.STATUS = io.status
   ORDER BY o.ordate DESC
    ");
   if ($res->num_rows > 0){
   while($row = $res->fetch_assoc()){
      $commands[] = $row;
   }}
   else{
     $commands=0;
   }
   return $commands;

}

function getAllCommandesInThisWeek(){
    $mysqli = connect();
   $res = $mysqli->query("SELECT o.id, u.FN, u.LN, o.STATUS, o.ordate, o.dilivredate, io.icon
   FROM orders o
   JOIN users u ON o.id_user = u.id 
   JOIN icon_order io ON o.STATUS = io.status
   and  o.ordate >= DATE_SUB(NOW(), INTERVAL 7 DAY)
   ORDER BY o.id 
    ");
   if ($res->num_rows > 0){
   while($row = $res->fetch_assoc()){
      $commands[] = $row;
   }}
   else{
     $commands=0;
   }
   return $commands;

}

function getAllUsers(){
    $mysqli = connect();
   $res = $mysqli->query("SELECT u.*, COUNT(o.id) AS num_orders
   FROM users u
   LEFT JOIN orders o ON u.id = o.id_user
   GROUP BY u.id;
   ");
    
   if ($res->num_rows > 0){
   while($row = $res->fetch_assoc()){
      $users[] = $row;
   }}
   else{
     $users=0;
   }
   return $users;

}


function getProductsInCommand($id_command) {
    $mysqli = connect();
    $res = $mysqli->query("SELECT p.id , p.title,p.PRIX , op.quantity FROM products p , order_product op WHERE op.id_product=p.id and op.id_order=$id_command;
    ");

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        $products = 0;
    }
    return $products;
}


function GetAllStatusCommands(){

    $mysqli = connect();
 
    $res = $mysqli->query("SELECT `status` FROM icon_order");

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $command_status[] = $row;
        }
    } else {
        $command_status = 0;
    }
    return $command_status;
 
 
 }


 function addUserLikeProduct($idUser, $idProduct) {
    $conn = connect();
    $sql = "INSERT INTO likedproducts (idUser, idProduct) VALUES ('$idUser', '$idProduct')";

    if ($conn->query($sql) === TRUE) {
        return true; // Insertion successful
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false; // Insertion failed
    }

    $conn->close();
}

function deleteUserLikeProduct($idUser, $idProduct) {
    $conn = connect(); // Assuming connect() is a function that returns a database connection

    $sql = "DELETE FROM likedproducts WHERE idUser = '$idUser' AND idProduct = '$idProduct'";

    if ($conn->query($sql) === TRUE) {
        return true; // Deletion successful
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false; // Deletion failed
    }

    $conn->close();
}


function addLikedProductsToCart($userId) {
    $conn = connect(); 
    $sql = "SELECT idProduct FROM likedproducts WHERE idUser = '$userId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Insert liked products into the cart with quantity 1
        while ($row = $result->fetch_assoc()) {
            $idProduct = $row['idProduct'];
            $insertSql = "INSERT INTO panier (id_user, id_product, quantity) VALUES ('$userId', '$idProduct', '1')";
            if ($conn->query($insertSql) !== TRUE) {
                echo "Error inserting product ID: " . $idProduct . " Error: " . $conn->error . "<br>";
            }
        }
        echo "Products added to cart successfully!";
    } else {
        echo "No products liked by the user.";
    }

    $conn->close();
}


function executeUpdateQuery($updateQuery) {
    // Get the database connection
    $conn = connect();

    // Check if the connection is successful
    if ($conn) {
        // Execute the UPDATE query
        if ($conn->query($updateQuery) === TRUE) {
            echo "Update query executed successfully";
        } else {
            echo "Error executing update query: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
}

function getTimeDifference($dateTime) {
    // Convert the given datetime string to a DateTime object
    $givenDateTime = new DateTime($dateTime);

    // Get the current datetime
    $currentDateTime = new DateTime();

    // Calculate the difference between the two datetimes
    $interval = $currentDateTime->diff($givenDateTime);

    // Format the interval
    $formattedInterval = '';

    if ($interval->y > 0) {
        $formattedInterval .= $interval->y . ' year' . ($interval->y > 1 ? 's' : '');
    } elseif ($interval->m > 0) {
        $formattedInterval .= $interval->m . ' month' . ($interval->m > 1 ? 's' : '');
    } elseif ($interval->d > 0) {
        $formattedInterval .= $interval->d . ' day' . ($interval->d > 1 ? 's' : '');
    } elseif ($interval->h > 0) {
        $formattedInterval .= $interval->h . ' hour' . ($interval->h > 1 ? 's' : '');
    } elseif ($interval->i > 0) {
        $formattedInterval .= $interval->i . ' minute' . ($interval->i > 1 ? 's' : '');
    } elseif ($interval->s > 0) {
        $formattedInterval .= $interval->s . ' second' . ($interval->s > 1 ? 's' : '');
    } else {
        return 'Just now';
    }

    return $formattedInterval . ' ago';
}
function getAllNotifications(){
    $mysqli = connect();
    $res = $mysqli->query("SELECT * FROM notifications order by id desc");

    $notifications = array();

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            // Apply the getTimeDifference function to format the date
            $row['dateMessage'] = getTimeDifference($row['dateMessage']);
            $notifications[] = $row;
        }
    } else {
        $notifications = 0;
    }

    return $notifications;
}
function insertNotification($message, $type) {
    $conn = connect();
    $currentDateTime = new DateTime();

    // Extract year, month, hour, and minutes
    $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
    
    $notiQuery = "INSERT INTO notifications (message,dateMessage,type) values ('$message','$formattedDateTime', '$type')";
    mysqli_query($conn, $notiQuery);

    $conn->close();
}

?>

