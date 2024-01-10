 
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

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

          <!-- Font Awesome CSS -->
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

          <!-- jQuery -->
          <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

          <!-- Bootstrap JS (including Popper.js) -->
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>


          <link rel="stylesheet" href="css/index.css">
          <link rel="stylesheet" href="css/edit_profile.css">

          <script src="js/index.js" defer></script>
          

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
    
  
  <a href="index.php">
    <div style="display: inline-block;">
       <button type="button"  class="btn btn-light" style="margin-top: 10px;">
       <i class="fa-solid fa-house"></i>      </button>
    </div></a>
   
    <form method="post" style="display: inline-block;">
        <button type="submit" class="btn btn-light" style="margin-top: 10px;" name="logout">
        <i class="fa-solid fa-arrow-right-from-bracket" ></i>
      </button>
    </form>
    <script>
    document.getElementById('editProfileBtn').addEventListener('click', function() {
        var editProfileSection = document.getElementById('editProfileSection');
        editProfileSection.style.display = 'block';
    });
</script>


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
                  
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <!-- Cart -->
                <?php if($username!=0){ ?>

                  <div class="cart">
                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                      <div class="cart_icon">
                        <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                        <div class="cart_count"><span id="cartCount"><?php echo executeSingleValueQuery("SELECT count(*) FROM panier WHERE id_user = '$userId'"); ?></span></div>
                      </div>
                      <div class="cart_content">
                        <div class="cart_text"><a href="cart.php">Cart</a></div>
                        <div class="cart_price"><span id="cartPrice"><?php echo executeSingleValueQuery("SELECT FORMAT(ROUND(SUM(p.quantity * pr.PRIX), 2), 2) AS total_price
FROM panier p
JOIN products pr ON p.id_product = pr.id
GROUP BY p.id_user;

"); ?></span> MAD</div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Main Navigation -->

      <nav class="main_nav">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="main_nav_content d-flex flex-row">
                <div class="main_nav_menu">
                 
                              </div>
      </nav>
          <div id="intro"><p>At <b>ProFitFuel</b>, we're dedicated to fueling your fitness journey with excellence. </p></div>
          <div id="successMessage" style="background: #4CAF50;color: white; padding: 10px; border-radius: 5px; width:100%; height:40px;display: none;">
                  <h6 style="text-align: center;">Your order was sent successfully!. Check Your <b>EMAIL!</b></h6>
          </div>
          <?php if ($username == 0): ?>
        <div id="signupAlert" class="alert alert-warning" role="alert" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 10px; border-radius: 5px; width: 600px; text-align: center; z-index: 1000;">
                    You need to sign up to add items to your cart. Please <b>sign up first.</b>
        </div>
    <?php endif; ?>
    </header>
    <!-- ======================================================================= -->  
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


<div id="customConfirmationDialog" class="confirmation-dialog" style="display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index:100000
    ">
    <p id="confirmationMessage">Are you sure you want to cancel this order?</p>
    <button id="yesButton" onclick="cancelOrderConfirmed(true)" class="btn btn-dange" style="background-color: red;color:#ffff";>Yes</button>
    <button onclick="cancelOrderConfirmed(false)" class="btn" style="background-color: royalblue; color:#ffff">No</button>
</div>


<div id="feedback-form-modal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">How likely are you to recommend our gym to your workout buddies?</label>
                        <div class="rating-input-wrapper d-flex justify-content-between mt-2">
                            <label><input type="radio" name="rating" onclick="changeRatingColor(this)" style="display: none;" /><span class="border rounded px-3 py-2">1</span></label>
                            <label><input type="radio" name="rating" onclick="changeRatingColor(this)" style="display: none;" /><span class="border rounded px-3 py-2">2</span></label>
                            <label><input type="radio" name="rating" onclick="changeRatingColor(this)" style="display: none;" /><span class="border rounded px-3 py-2">3</span></label>
                            <label><input type="radio" name="rating" onclick="changeRatingColor(this)" style="display: none;" /><span class="border rounded px-3 py-2">4</span></label>
                            <label><input type="radio" name="rating" onclick="changeRatingColor(this)" style="display: none;" /><span class="border rounded px-3 py-2">5</span></label>
                        </div>
                        <div class="rating-labels d-flex justify-content-between mt-1">
                            <label style="color: #C21807;">Bad Service</label>
                            <label style="color: #00755E;">Good Service</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-two">Shape the Supplement:  </label>
                        <textarea class="form-control" id="feedbackId" rows="3" placeholder="Share Your Feedback" name="feedback"></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="submitFeedback()">Submit</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>




<div class="" id="beforeProducts">
    <h3>Liked Products</h3>
    <button id="addAll" id-user="<?php echo $userId ?>" onclick="addAllToCart()">
    <i class="fa-solid fa-cart-plus"></i>
        Add All To The Cart</button>
</div>

    <table class="products-table" id="originalTable">
      <tbody id="productsRow">
              <?php include "php/load_liked_products.php"; ?>
      </tbody>
    </table>



      
  <!-- ======================================================================= -->
  <!-- Footer -->
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
  <script>
    // Select all elements with class 'svgContainer' and attach event listeners
    var svgContainers = document.querySelectorAll('.svgContainer');
    svgContainers.forEach(function(container) {
        container.addEventListener('click', function(event) {
             var isliked = this.getAttribute('isLiked');
             var idUser = this.getAttribute('data-user-id');
             var idProduct = this.getAttribute('data-product-id');

             console.log(idUser);
             console.log(idProduct);

             if(idUser==0 ){
              showSignUpMessage();
             }
             else{
              if(isliked==1){


                // ************************** // 

                fetch('PHP/removeFromLike.php', {
    method: 'POST',
    body: new URLSearchParams({
        'idU': idUser,
        'idP': idProduct
    })
})
.then(response => response.text())
.then(data => {
    console.log(data); // Handle the response from PHP
    this.innerHTML='<img src="./product_images/heart.png" alt="">';
                this.setAttribute('isLiked',0);
})
.catch(error => {
    console.error('There was an error with the fetch operation:', error);
});


                //***************************// 
                
            

              }
              else{





                //*************************** *//
                fetch('PHP/addToLike.php', {
    method: 'POST',
    body: new URLSearchParams({
        'idU': idUser,
        'idP': idProduct
    })
})
.then(response => response.text())
.then(data => {
    console.log(data); // Handle the response from PHP
    this.innerHTML='<img src="./product_images/hearted.png" alt="">';
                this.setAttribute('isLiked',1);
                var audio =document.getElementById('likesound');
                playAudio(audio) ;
   

})
.catch(error => {
    console.error('There was an error with the fetch operation:', error);
});

                //****************************************//
              


              }
             }


            event.preventDefault();
            // Your additional logic or actions here (if needed)
        });
    });


  
</script> 

<audio id="likesound" src="product_images/likeSound.mp3"></audio>
  </body>
  </html>