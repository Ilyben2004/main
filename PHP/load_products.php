<?php


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 0;
}
$userQuery = "SELECT id FROM users WHERE USERNAME = '$username'";
$userResult = mysqli_query(db(), $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
}
else{
  $userId=0;
}


$all_products_query = "SELECT * FROM products";
$result = mysqli_query(db(), $all_products_query);

$count = 0;
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {?>
   <td>
  <a href="product_page.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">
    <div class="card"
      data-price="<?php echo $row['PRIX']; ?>"
      data-product-id="<?php echo $row['id']?>"
      onmouseover="this.style.borderColor='#007bff'; this.style.transform='scale(1.1)';"
      onmouseout="this.style.borderColor='transparent'; this.style.transform='scale(1)';"
      style="border: 1px solid transparent; transition: border-color 0.4s ease-in-out; overflow: hidden;">
      <img src="./product_images/<?php echo $row['image_file']; ?>" alt="<?php echo $row['image_file']; ?>" style="width:75%;">
      <?php $isLiked =doesUserLikeProduct( $userId,$row['id']); ?>
      <div 
      data-user-id="<?php echo $userId; ?>"
       data-product-id="<?php echo $row['id']?>" 
        isLiked="<?php echo $isLiked ; ?>"
         class="svgContainer" id="svgContainer" >
        <?php $imageSource = "./product_images/heart.png";
        if ($username == 0) {
          $imageSource = "./product_images/heart.png";
      }          elseif ($isLiked) {
          $imageSource = "./product_images/hearted.png";
      }
      ?>
<img src="<?php echo $imageSource; ?>" alt="">
 
   </div>
      <h2><?php echo $row['title']; ?></h2>
      <p class="PRIX"><b><?php echo $row['PRIX']; ?> MAD</b></p>
    </a>
    <p>
      <button class="addToCartButton"
        data-product-id="<?php echo $row['id']; ?>"
        data-user-id="<?php echo $userId; ?>"
        data-price="<?php echo $row['PRIX']; ?>"
        <?php if ($username == 0) { echo 'onclick="showSignUpMessage();"'; } ?>
      >
        Add to Cart
      </button>
    </p>
  </div>
</td>


        <?php
        $count++;

        if ($count % 4 === 0) {
            echo '</tr><tr>';
        }
    }
} else {
    echo "<td colspan='4'>No products found</td>";
}

?>


