 
<?php
require "./php/config.php";
require "./php/Functions.php";

session_start();
$conn = db();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 0;
}

$userQuery = "SELECT id, EMAIL FROM users WHERE USERNAME = '$username'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
    $email = $userRow['EMAIL'];
} else {
    echo "Error: User ID not found";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();

    header("Location: login.php"); 
    exit();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProFitFuel</title>

        <script src="https://kit.fontawesome.com/aafa25b911.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>


        <link rel="stylesheet" href="css/index.css">

        <link rel="stylesheet" href="css/edit_profile.css">
        

</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<div class="super_container">
	
	<!-- Header -->
	
	<header class="header" >

		
		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png" alt=""></div>+212 64-277-6368</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png" alt=""></div><a href="mailto:ProFitFuel@gmail.com">ProFitFuel@gamil.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_user">
              <?php if($username == 0) { ?>
    <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
    <div style="display: inline-block; margin-top: 10px;"><a href="signup.php">Register</a></div>
    <div style="display: inline-block; margin-top: 10px;"><a href="login.php">Sign in</a></div>
<?php } else { ?>
  
    <form method="post" style="display: inline-block;">
        <button type="submit" class="btn btn-light" style="margin-top: 10px;" name="logout">
        <i class="fa-solid fa-arrow-right-from-bracket" ></i>
      </button>
    </form>
   

<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

	
		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="index.php">ProFitFuel</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
                <form action="#" class="header_search_form clearfix" id="searchForm">
    <input type="search" required="required" class="header_search_input" id="searchInput" placeholder="Search for products...">
    <button type="button" class="header_search_button trans_300" id="searchButton">
        <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt="">
    </button>
</form>

								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
							<!-- Cart -->
              <div class="cart">
                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                      <div class="cart_icon">
                        <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                          <div class="cart_count"><span id="cartCount"><?php echo executeSingleValueQuery("SELECT count(*) FROM panier WHERE id_user = '$userId'"); ?></span></div>
                      </div>
                      <div class="cart_content">
                        <div class="cart_text"><a href="cart.php">Cart</a></div>
                          
                      </div>
                    </div>
                  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		    <div id="intro"><p>At <b>ProFitFuel</b>, we're dedicated to fueling your fitness journey with excellence. </p></div>
	
  </header>
  <body>
  <div id="editProfileSection" class="container rounded bg-white mt-5" style="display: none;">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <div class="circle">
              <i class="fa-regular fa-user"></i>
            </div>
                <span class="font-weight-bold" style="margin-top: 15px;" ><h5><?php echo $username ?></h5></span>
                <span class="text-black-50" style="margin-top: 15px;"><h6><?php echo $email ?></h6></span>
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back">
                        <i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <a href="index.php" id="ayman">
                            <h6>Back to home</h6>
                        </a>
                    </div>
                    <h6 class="text-right">Edit Profile</h6>
                </div>
                <form id="editProfileForm" method="POST" action="./php/edit_profile.php">
          <div class="row mt-2">
        <div class="col-md-6">
            <input type="text" name="newFirstName" class="form-control" placeholder="Enter new first name" value="">
        </div>
        <div class="col-md-6">
            <input type="text" name="newLastName" class="form-control" placeholder="Enter new last name" value="">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">

            <input type="text" name="newUsername" class="form-control" placeholder="Enter new username" value="">
        </div>
        <div class="col-md-6">

            <input type="text" name="newEmail" class="form-control" placeholder="Enter new email" value="">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <input type="password" name="newPassword" class="form-control" placeholder="Enter new password" value="">
        </div>
        <div class="col-md-6">
            <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm new password" value="">
        </div>
    </div>
    
    <div class="mt-5 text-right">
    <button id="saveProfileBtn" class="btn btn-primary profile-button" type="submit" name="saveProfile">Save Profile</button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>
  

  
<section class="h-100 h-custom">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
            
        <div class="table-responsive">
          <table class="table" >
            <thead>
              <tr>
                <th scope="col" class="h5" >Shopping Bag</th>
                <th scope="col" style="width:300px;text-align:center;">Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
            <?php
$query = "SELECT pr.* FROM panier p JOIN products pr ON p.id_product = pr.id where p.id_user=$userId ORDER BY `pr`.`id` ASC";
$cartResult = mysqli_query($conn, $query);
foreach ($cartResult as $row) {
?>
    <tr Quantity="<?php echo $row['Quantity']; ?>" id="productRow_<?php echo $row['id']; ?>">
        <th scope="row" >
        <div class="d-flex align-items-center position-relative">
            <img src="./product_images/<?php echo $row['image_file']; ?>" class="img-fluid rounded-3 product-image" style="max-width: 200px;margin-left:18px" alt="">
            <button class="btn btn-link delete-icon" data-product-id="<?php echo $row['id']; ?>" data-user-id="<?php echo $userId; ?>" style="position: absolute; top: 0; right: 0; background-color:royalblue; color: white; padding: 5px; cursor: pointer; display: block;"onmouseover="this.style.backgroundColor='darkblue'" onmouseout="this.style.backgroundColor='royalblue'" 
                  onclick="removeProduct(<?php echo $row['id']; ?>, <?php echo $userId; ?>, 'productRow_<?php echo $row['id']; ?>',<?php echo getQuantity($userId, $row['id']); ?>)">
                <i class="fas fa-times" style="width: 50px;"></i>
            </button>
        </div>
        </th>
        <td class="align-middle">
            <p class="mb-0" style="font-weight:bolder; text-align:center;"><?php echo $row['title']; ?> </p>
        </td>
        <td class="align-middle">
            <div class="d-flex flex-row">
                <button class="btn btn-link px-2" data-product-id="<?php echo $row['id']; ?>" data-user-id="<?php echo $userId; ?>" >
                    <i class="fas fa-minus"></i>
                </button>

                <input readonly id="form1" min="0" name="quantity" value="<?php echo getQuantity($userId, $row['id']); ?>" type="number" class="form-control form-control-sm" style="width: 50px;" data-product-id="<?php echo $row['id']; ?>"
                      data-user-id="<?php echo $userId; ?>" data-price-id="<?php echo $row['PRIX'];?>">

                      <button class="btn btn-link px-2" data-product-id="<?php echo $row['id']; ?>" data-user-id="<?php echo $userId; ?>">
                        <i class="fas fa-plus"></i>
                      </button>
            </div>
        </td>
        <td class="align-middle">
            <p class="mb-0" style="font-weight:bolder"><?php echo $row['PRIX']; ?> MAD</p>
        </td>
      </tr>
<?php } ?>

            </tbody>
          </table>
        </div>


       
              <div class="col-lg-4 col-xl-3" style="margin-left: 80%;"> 
                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-2">Subtotal</p>
                  <p class="mb-2" id="subtotalValue"><?php echo number_format(executeSingleValueQuery("SELECT  SUM(p.quantity * pr.PRIX) AS total_price FROM panier p JOIN products pr ON p.id_product = pr.id  WHERE p.id_user =$userId GROUP BY p.id_user;
")) ?> MAD</p>
                </div>

                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-0">Shipping</p>
                  <p class="mb-0">20 MAD</p>
                </div>

                <hr class="my-4">
                <button type="button" class="btn btn-primary btn-block btn-lg" style="width: 245px; margin-top:38px"; id="checkoutButton" data-user-id="<?php echo $userId ?>">
                  <div class="d-flex justify-content-between">
                    <span>Total bill :</span>
                    <span style="margin-left: 8px;" id="totalValue"> <?php echo number_format(executeSingleValueQuery("SELECT SUM(p.quantity * pr.PRIX) + 20 AS total_price FROM panier p JOIN products pr ON p.id_product = pr.id WHERE p.id_user=$userId GROUP BY p.id_user"), 2) ?> MAD</span>
                  </div>

                </button>
                <div id="paypal-button-container"></div>


              </div>
            <div id="designsContainer">
              <div class="iconMessageContainer">
                <div class="imagecontainer">
                  <img src="images/cashchanges.png" alt="">
                </div>
                <div class="textsConteiner">

                <div class="title">Secure Payments</div>
                <div class="textDescreption">
                100% Secure Payment Powered with Paypal Gateway 
                </div>

                </div>

              </div>
              <div class="iconMessageContainer">
              <div class="imagecontainer">    <img src="images/travel.png" alt=""></div>
              <div class="textsConteiner">

                <div class="title">Worldwide Shipping
</div>
                <div class="textDescreption">
                Available as standard or express delivery from 5 to 20 Days 
                </div>

                </div>
                
              </div>
              <div class="iconMessageContainer">
                 <div class="imagecontainer">    <img src="images/service.png" alt=""></div>
              <div class="textsConteiner">

                <div class="title">Super Service
</div>
                <div class="textDescreption">
                Hassle-free returns and friendly customer support
                </div>

                </div>
                </div>
                <div class="iconMessageContainer">
                <div class="imagecontainer">    <img src="images/carbon.png" alt=""></div>
              <div class="textsConteiner">

                <div class="title">Remises Systeme 
</div>
                <div class="textDescreption">
                A System that makes you get remises from Promo Codes
                </div>

                </div>
             
                
                </div>
            </div>
            
            </div>

          </div>
        </div>
        

      </div>
    </div>
  </div>
</section>

<!-- ========================================================================= -->
  <footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
   </section>
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
          <i class="fa-solid fa-dumbbell"></i> ProFitFuel   
          </h6>
          <p>
              ProFiFuel is dedicated to providing high-quality gym supplements to enhance your fitness journey
          </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Protein Supplements</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Pre-Workout Boosters</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Hydration and Electrolytes</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vitamins and Minerals</a>
          </p>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> Sidi Bennoure, Fathe-10012, MR</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            ProFitFuel@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 212 64-277-6368</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="index.php">ProFitFuel.com</a>
  </div>
</footer>

<div class="popup" id="myPopup">
    <div class="popup-content">
   
        <p id="MessageQuantity">  <i class="fa-solid fa-xmark"></i> Sorry But we don't have this quantity now in the stock!</p>
    </div>
</div>

<div class="popup" id="getAdresse">
<div class="popup-content" id="getAdress"  >
<label for=""> Please enter Your adresse :  </label><input id="adresseInput" type="text">


</div>
</div>

<script src="js/index.js" ></script>        

 <!-- Replace the "test" client-id value with your client-id -->
 <script src="https://www.paypal.com/sdk/js?client-id=Abp56uKdqvMqNs3jnMBkcdGnBKdzzx8DEwtZXrBypqNYGarM6dSCzM689I7n1y3VmacbHtscXEQh_Nry&currency=USD"></script>

<script>
    var userId = $('#checkoutButton').data('user-id');

paypal.Buttons({
    createOrder: function(data, actions) {
        
        
        // Use Promise to handle asynchronous call to getBillFromDatabase
        return new Promise(function (resolve, reject) {
            getBillFromDatabase(userId, function (price) {
                console.log("total price is : " + price);

                // Check if the price is a valid number
                if (isNaN(price) || price <= 0) {
                    reject('Invalid price');
                }

                // Resolve the Promise with the order details
                resolve(actions.order.create({
                    purchase_units: [{
                        amount: {
                            currency_code: 'USD',
                            value: price.toFixed(2) // Ensure two decimal places
                        }
                    }]
                }));
            });
        });
    },
    onApprove: function(data, actions) {

        // Capture the funds from the transaction
        return actions.order.capture().then(function(details) {
          checkout(userId);

        });
    }
}).render('#paypal-button-container');

</script>

</body>
</html>