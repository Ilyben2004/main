 
<?php
require "./php/config.php";
session_start();
$conn = db();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 0;
}

if($username!=0){

$userQuery = "SELECT id, EMAIL FROM users WHERE USERNAME = '$username'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
    $email = $userRow['EMAIL'];
}
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
          <link rel="stylesheet" href="css/about.css">
          

  </head>
  <body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
  <div class="super_container">
    
    
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
<?php }  ?>
    


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
              
            </div>

            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <!-- Cart -->
            

              </div>
            </div>
          </div>
        </div>
      </div>
      <nav class="main_nav">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="main_nav_content d-flex flex-row">
                <div class="main_nav_menu">
                  <ul class="standard_dropdown main_nav_dropdown">
                    <li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>
                    <li class="hassubs">
                      <a href="#">Categories<i class="fas fa-chevron-down"></i></a>
                      <ul>
                        <li><a href="#">Protein Supplements<i class="fas fa-chevron-down"></i></a></li>
                        <li><a href="#">Pre-Workout Boosters<i class="fas fa-chevron-down"></i></a></li>
                        <li><a href="#">Post-Workout Recovery<i class="fas fa-chevron-down"></i></a></li>
                        <li><a href="#">Amino Acid Supplements<i class="fas fa-chevron-down"></i></a></li>
                        <li><a href="#">Weight Management<i class="fas fa-chevron-down"></i></a></li>
                        <li><a href="#">Vitamins and Minerals<i class="fas fa-chevron-down"></i></a></li>
                        <li><a href="#">Joint Support<i class="fas fa-chevron-down"></i></a></li>
                      </ul>
                    </li>
                    <li><a href="about.php">About<i class="fas fa-chevron-down"></i></a></li>
                  </ul>
                              </div>
      </nav>
          <div id="intro"><p>At <b>ProFitFuel</b>, we're dedicated to fueling your fitness journey with excellence. </p></div>
          <div id="successMessage" style="background: #4CAF50;color: white; padding: 10px; border-radius: 5px; width:100%; height:40px;display: none;">
                  <h6 style="text-align: center;">Your order was sent successfully!. Check Your <b>EMAIL!</b></h6>
          </div>
          
    </header>

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
    


<div id="userOrdersContainer" style="display: none; position: fixed; top: 48%; left: 50%; transform: translate(-50%, -50%); padding: 20px; border-radius: 8px; text-align: center; z-index: 1000; background-color:whitesmoke; max-height: 400px; overflow-y: auto; width: 80%; /* Set the desired width here */ box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <?php require './php/user_orders.php'; ?>
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
                        <label >How likely are you to recommend our gym to your workout buddies?</label>
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
                        <label>Shape the Supplement:  </label>
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

<!-- =================================================================================== -->
<h1 style="text-align: center; color:royalblue; margin:28px">About ProFitFuel</h1>
<section class="bg-light py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center"><i class="fa-solid fa-users" style="margin-right: 8px;"></i>Our Team</h2>
        <p class="text-secondary mb-5 text-center lead fs-4">Unlock your potential with us! We're a motivated team of innovators, ready to turn study into passion and work into fulfillment.</p>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row text-center">

   
        <div id="ilyasCard" class="col-md-6 mb-5">
             <div class="bg-white rounded shadow-sm py-5 px-4">
                <img src="./product_images/WhatsApp Image 2023-12-09 at 18.47.23_3f410c6b.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Ilyas Benv</h5>
                <span class="small text-uppercase text-muted">Web - Developer</span>
                <ul class="social mb-0 list-inline mt-3">
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>

      
    </div>
</div>
</section>



<div class="About-us" >

  <div id="map" class="map">
    <h4 style="text-align: center; color: royalblue; margin-bottom: 28px; margin-top: 18px;">
      <i class="fa-solid fa-location-dot" style="margin-right: 8px;"></i>ProFitFuel Location
    </h4>
    <p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13437.63250170195!2d-8.4241952!3d32.6485819!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdaf29d69e9ffcd1%3A0x59b14bbe0ae50587!2sProFitFuel!5e0!3m2!1sen!2sma"
        width="500" height="400" style="border: 1px solid royalblue; margin-left: 78px" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </p>
  </div>

  <div class="infos">
    <img src="../Estore/product_images/_2273e68d-3ad2-4a32-bcd1-112f49108bb1.jpeg" alt="ProFitFuel Image">
    <h5 style="color:royalblue;">Welcome to PROFITFUEL</h5>
    <p>Where we are more than just a brand – we are a movement. As the catalyst for tomorrow's visionaries, PROFITFUEL is dedicated to energizing minds and sculpting futures.</p>
    <p>At PROFITFUEL, we believe in fueling ambitions and igniting innovations. Our mission goes beyond selling gym supplements; we are on a journey to empower young minds, providing them with the tools and inspiration to unleash their inventive spirits.</p>
    <p>Join us in the exciting adventure of redefining tomorrow's possibilities. In a world where aspirations soar and creativity ignites, PROFITFUEL is the place where dreams take flight.</p>
  </div>
</div>
      
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
  </body>
  </html>