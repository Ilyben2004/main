userIdGlobale = document.body.getAttribute('idUser');
console.log(userIdGlobale);

document.addEventListener('DOMContentLoaded', function () {
    function updateCart(productPrice, productId) {
        var cartPriceElement = document.querySelector('.cart_price');
        var cartCountElement = document.getElementById('cartCount');
        
        var currentCount = parseFloat(cartCountElement.innerText);
        if(!isNaN(currentCount)){
        var newCount = currentCount + 1;
    
        cartCountElement.innerText = newCount;
        }else{
            currentCount = 0 ;
            var newCount = currentCount + 1;
    
            cartCountElement.innerText = newCount;
        }
        var totalPriceText = cartPriceElement.textContent;
        var currentTotalPrice = parseFloat(totalPriceText.replace('MAD', ''));
    
        if (isNaN(currentTotalPrice)) {
            currentTotalPrice = 0;
        }
    
        if (!localStorage.getItem(productId)) {
            currentTotalPrice += productPrice;
            localStorage.setItem(productId, productPrice.toString());
        } else {
            currentTotalPrice += parseFloat(localStorage.getItem(productId));
        }
    
        cartPriceElement.innerText = currentTotalPrice.toFixed(2) + ' MAD';
    }


    function checkifProductExistInPanier(indiceUser,indiceProduct){
        $.ajax({
            url: 'php/checkProductPanier.php',
            method: 'POST',
            data: { user_id: indiceUser,product_id : indiceProduct },
            success: function (response) {
                console.log("**********************888 "+response);
                if(response==1){
                    console.log("exist");
                    return false;
                }
                else{
                    console.log("not exist");
                    return true;


                }
              
            },
            error: function (error) {
                console.error('Error checking product:', error);
            }
        });


    }

    
      function showalertProductInPanier(){
        console.log("******************&7*************");
        var ProductsinCartAlert = document.getElementById('ProductsinCartAlert');
        ProductsinCartAlert.style.display='block';
        setTimeout(function () {
            ProductsinCartAlert.style.display='none';

        }, 2000);

      }
    
    function attachAddToCartListeners() {
        var addToCartButtons = document.querySelectorAll('.addToCartButton');
        var buyNowButtons = document.querySelectorAll('.buyNowButton');
    
        addToCartButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var productPrice = parseFloat(button.closest('.card').getAttribute('data-price'));
                var productId = button.closest('.card').getAttribute('data-product-id');
                var userId = $(this).data('user-id'); 

            if(checkifProductExistInPanier(userId,productId)){
                updateCart(productPrice, productId);

              
                console.log(userId);
                if(!isNaN(userId)){
                $.ajax({
                    url: 'php/update_cart.php',
                    method: 'POST',
                    data: { user_id: userId, product_id: productId, quantity: 1 },
                    success: function () {
                        console.log('Product added to cart successfully');
                        console.log(userId);
                    },
                    error: function (error) {
                        console.error('Error adding product to cart:', error);
                    }
                });}}
                else{
                    showalertProductInPanier();
                  
                }
            });
        });


        var buyNowButtons = document.querySelectorAll('.buyNowButton');
        buyNowButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var productId = parseFloat(button.getAttribute('data-product-id'));
                var productPrice = parseFloat(button.getAttribute('data-price'));
                var userId = $(this).data('user-id');
                if(checkifProductExistInPanier(userId,productId)){ 

                updateCart(productPrice, productId);



                
                    console.log(productId);
                    console.log(userId);
                    if(!isNaN(userId)){
                    $.ajax({
                        url: 'php/update_cart.php',
                        method: 'POST',
                        data: { user_id: userId, product_id: productId, quantity: 1 },
                        success: function () {
                            console.log('Product added to cart successfully');
                        },
                        error: function (error) {
                            console.error('Error adding product to cart:', error);
                        }
                    });}}
                    else{
                        showalertProductInPanier();
                    }
               
                
           });
        
        });
    }
  
function decrementQuantity(productId) {
    updateQuantity(productId, -1);
}

function incrementQuantity(productId) {
    updateQuantity(productId, 1);

}

function updateQuantity(productId, change) {
    var userId = document.querySelector('.form-control[data-product-id="' + productId + '"]').getAttribute('data-user-id');
    console.log(userId);
    console.log(productId);
    var quantityInput = document.querySelector('.form-control[data-product-id="' + productId + '"]');
    var currentQuantity = parseInt(quantityInput.value);
 
    if (currentQuantity + change >= 1) {
        quantityInput.value = currentQuantity + change;

        $.post("php/update_quantity.php", {
            userId: userId,
            productId: productId,
            decrement: change
        }, function (response) {
            console.log(response);
            
        });
    }
}

var quantityMinusButtons = document.querySelectorAll('.fa-minus');
var quantityPlusButtons = document.querySelectorAll('.fa-plus');

quantityMinusButtons.forEach(function (minusButton) {
    minusButton.addEventListener('click', function () {
        var productId = minusButton.closest('.d-flex').querySelector('.form-control').getAttribute('data-product-id');
        

        decrementQuantity(productId);
        updateSubtotal();
    });
});

quantityPlusButtons.forEach(function (plusButton) {
    plusButton.addEventListener('click', function () {
   
        var productId = plusButton.closest('.d-flex').querySelector('.form-control').getAttribute('data-product-id');
     var tr = document.getElementById('productRow_'+productId);
     Quantitiavailiable =tr.getAttribute('Quantity');
     var quantityWanted = document.querySelector('.form-control[data-product-id="' + productId + '"]').value;
     console.log(quantityWanted);
if(quantityWanted >= Quantitiavailiable ){
    ShowQuantitimessage();

}else{
    incrementQuantity(productId);
    updateSubtotal();
}

      
    });
});

function decrementCart(productId) {
    var cartCountElement = document.getElementById('cartCount');
    var currentCount = parseInt(cartCountElement.innerText);
    var newCount = Math.max(0, currentCount - 1);
    
    cartCountElement.innerText = newCount;
}



    function performSearch() {
        var searchTerm = $("#searchInput").val().toLowerCase();

        $.ajax({
            url: 'php/search.php',
            type: 'GET',
            data: { term: searchTerm , 
              idUser : userIdGlobale },
            dataType: 'json',
            success: function (data) {
                if (searchTerm.trim() === "") {
                    $("#searchResults").empty(); 
                    $("#originalTable").show(); 
                } else {
                    $("#originalTable").hide(); 
                    displayFilteredProducts(data);
                    attachAddToCartListeners(); 
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function fetchProducts(category) {
        return $.ajax({
            url: 'php/load_categories.php',
            type: 'GET',
            data: { category: category ,
                     Userid : userIdGlobale},
            dataType: 'json',
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function displayAllProducts() {
        $("#searchResults").empty();
        $("#originalTable").show(); 
        attachAddToCartListeners(); 
    }

    function displayFilteredProducts(data) {
        $("#originalTable").hide(); 
        var $searchResults = $("#searchResults");
        $searchResults.empty(); 

        var count = 0;

        data.forEach(function (products) {
            if (count % 4 === 0) {
                $searchResults.append('<tr>');
            }
            var likeIcon = `<div 
            data-user-id="${userIdGlobale}"
             data-product-id="${products.id}" 
              isLiked="0"
               class="svgContainer" id="svgContainer" >
             
      <img src="./product_images/heart.png"" alt="">
       
         </div>`;
if(products.isLiked==1 ){
    likeIcon = `<div 
            data-user-id="${userIdGlobale}"
             data-product-id="${products.id}" 
              isLiked="1"
               class="svgContainer" id="svgContainer" >
             
      <img src="./product_images/hearted.png"" alt="">
       
         </div>`;
  
}

            $searchResults.append(
                '<td>' +
                '<a href="product_page.php?id='+ products.id +'">'+
                '<div class="card" data-price="' + products.PRIX + '" data-product-id="' + products.id + '" ' +
                    'onmouseover="this.style.borderColor=\'#007bff\'; this.style.transform=\'scale(1.1)\';" ' +
                    'onmouseout="this.style.borderColor=\'transparent\'; this.style.transform=\'scale(1)\';" ' +
                    'style="border: 1px solid transparent; transition: border-color 0.4s ease-in-out; overflow: hidden;">' +
                '<img src="./product_images/'+products.image_file +'" alt="' + products.image_file + '" style="width:75%">' +
                likeIcon+
                '<h2>' + products.title + '</h2>' +
                '<p class="Price"><b>' + products.PRIX + ' MAD</b></p>' +
                '</a>'+
                '<p><button class="addToCartButton">Add to Cart</button></p>' +
                '</div>' +
                '</td>'
            );

            count++;

            if (count % 4 === 0) {
                $searchResults.append('</tr>');
            }
        });

        if (count % 4 !== 0) {
            var emptyCells = 4 - (count % 4);
            for (var i = 0; i < emptyCells; i++) {
                $searchResults.append('<td></td>');
            }
            $searchResults.append('</tr>');
        }
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
    }

    function handleCategoryFilter(category) {
        if (category.trim() === "") {
            displayAllProducts();
        } else {
            fetchProducts(category).then(function (data) {
                displayFilteredProducts(data);
                attachAddToCartListeners();  
            });
        }
    }


    $("#searchInput").on("input", performSearch);
    $("#searchButton").on("click", performSearch);

    $("ul").on("click", "li.hassubs ul li a", function (event) {
        event.preventDefault(); 
        var category = $(this).text().trim();
        handleCategoryFilter(category);

        $("ul li.hassubs ul li a").removeClass("selected");
        $(this).addClass("selected");
    });

    displayAllProducts();

});


function updateSubtotal() {
    $.ajax({
        url: 'php/get_subtotal.php',
        method: 'POST', 
        success: function (response) {
            var numericResponse = parseFloat(response);
            var subtotal = numericResponse;
            var total = subtotal+20;
            $('#totalValue').text(total.toFixed(2) + ' MAD');
            $('#subtotalValue').text(subtotal.toFixed(2)+ ' MAD');
        },
        error: function (error) {
            console.error('Error updating subtotal:', error);
        }
    });
}


function checkout(userId) {
   var adresseForm =  document.getElementById('getAdresse');
   adresseForm.style.display='block';
   document.getElementById('adresseInput').addEventListener('keydown', function(event) {
   
    if (event.key === 'Enter') {
        
  $.ajax({
        url: 'php/checkout.php',
        method: 'POST',
        data: { user_id: userId ,
        adress : document.getElementById('adresseInput').value},
        success: function (response) {
            console.log('Checkout successful:', response);
            
            var cartCountElement = document.getElementById('cartCount');
            cartCountElement.innerText = '0';

            localStorage.setItem('checkoutSuccess', 'true');

            window.location.href = 'index.php';
        },
        error: function (error) {
            console.error('Error during checkout:', error);
        }
    });




    }
});

  

    
}

document.addEventListener('DOMContentLoaded', function () {
    var checkoutSuccess = localStorage.getItem('checkoutSuccess');

    if (checkoutSuccess === 'true') {
        showSuccessMessage();

        localStorage.removeItem('checkoutSuccess');
    }
});

$('#checkoutButton').on('click', function () {
    var userId = $(this).data('user-id');
    checkout(userId);
});

$("#saveProfileBtn").click(function(event) {
    event.preventDefault();

    var newFirstName = $("input[name='newFirstName']").val();
    var newLastName = $("input[name='newLastName']").val();
    var newUsername = $("input[name='newUsername']").val();
    var newEmail = $("input[name='newEmail']").val();
    var newPassword = $("input[name='newPassword']").val();

    if (!newFirstName || !newLastName || !newUsername || !newEmail || !newPassword) {
        alert("Please fill out all required fields.");
        return;
    }


    $.ajax({
        url: 'php/edit_profile.php',
        method: 'POST',
        data: {
            newFirstName: newFirstName,
            newLastName: newLastName,
            newUsername: newUsername,
            newEmail: newEmail,
            newPassword: newPassword
        },
        success: function(response) {
            console.log(response);
            
            if (response === "Profile updated successfully!") {
                window.location.href = 'index.php';
            } else {
                alert("Profile update failed. Please try again.");
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', xhr.responseText);
            console.error('Status:', status);
            console.error('Error:', error);
        }
    });
});

function showSuccessMessage() {
    var successMessage = document.getElementById('successMessage');
    successMessage.style.display = 'block';

    setTimeout(function () {
        successMessage.style.display = 'none';
    }, 3000);

}
function showSignUpMessage() {
    var signupAlert = document.getElementById('signupAlert');
    signupAlert.style.display = 'block';

    setTimeout(function () {
        hideSignUpMessage();
    }, 2000);
}

function hideSignUpMessage() {
    var signupAlert = document.getElementById('signupAlert');
    signupAlert.style.display = 'none';
}



function toggleUserOrders() {
    var userOrdersContainer = document.getElementById('userOrdersContainer');
    userOrdersContainer.style.display = (userOrdersContainer.style.display === 'none' || userOrdersContainer.style.display === '') ? 'block' : 'none';
}

document.addEventListener('click', function (event) {
    var userOrdersContainer = document.getElementById('userOrdersContainer');
    var showUserCommandButton = document.getElementById('showUserCommand');
    var feedbackContainer = document.getElementById("feedback-form-modal")

    if (event.target !== feedbackContainer && event.target !== userOrdersContainer && event.target !== showUserCommandButton && !userOrdersContainer.contains(event.target) && !isClickableElement(event.target) && !feedbackContainer.contains(event.target)) 
    {
        userOrdersContainer.style.display = 'none';
    }
});

document.addEventListener('scroll', function () {
    var userOrdersContainer = document.getElementById('userOrdersContainer');
    userOrdersContainer.style.display = 'none';
});

function isClickableElement(element) {
    var clickableElements = ['A', 'BUTTON']; 
    return clickableElements.includes(element.tagName);
}




function decrementCart(productId, productQuantity) {
    var cartCountElement = document.getElementById('cartCount');
    var currentCount = parseInt(cartCountElement.innerText);
    var newCount = Math.max(0, currentCount - productQuantity);

    cartCountElement.innerText = newCount;
}



async function removeProduct(productId, userId, containerId, quantity) {
    try {
        const response = await fetch('php/remove_product.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `product_id=${encodeURIComponent(productId)}&user_id=${encodeURIComponent(userId)}`,
        });

        const data = await response.json();
        if (data.success) {
           
            decrementCart(productId,quantity);

            var container = document.getElementById(containerId);
            if (container) {
                container.remove();
            } else {
                console.warn('Container not found:', containerId);
            }
            updateSubtotal();
        } 
    } catch (error) {
        console.error('Error:', error);
    }
}

function cancelOrder(orderID) {
    console.log('Cancel Order ID:', orderID); 
    $.ajax({
        type: 'POST',
        url: 'php/remove_order.php',
        data: { orderID: orderID },
        success: function(response) {
            console.log('Order canceled successfully');
            window.location.href = 'index.php';
        },
        error: function(xhr, status, error) {
            console.error('Error canceling order:', error);
        }
    });
}


function closeConfirmationDialog() {
    var confirmationDialog = document.getElementById('customConfirmationDialog');
    confirmationDialog.style.display = 'none';
}

function cancelOrderConfirmed(orderID) {
    if (orderID) {
        console.log('Cancel Order Confirmed ID:', orderID); 
        
        cancelOrder(orderID);
    }
    closeConfirmationDialog();
}

function showConfirmationDialog(message, orderID) {
    var confirmationDialog = document.getElementById('customConfirmationDialog');
    var confirmationMessage = document.getElementById('confirmationMessage');

    confirmationMessage.textContent = message;
    confirmationDialog.style.display = 'block';

    document.getElementById('yesButton').onclick = function() {
        cancelOrderConfirmed(orderID);
    };
}

function showFeedbackModal() {
    $('#feedback-form-modal').modal('show');
}

function closeFeedbackModal() {
    $('#feedback-form-modal').modal('hide');
}

function submitFeedback() {
    var feedbackText = document.getElementById('feedbackId').value;

    $.ajax({
        type: 'POST',
        url: 'php/submit_feedback.php',
        data: { feedback: feedbackText },
        dataType: 'json', 
        success: function(response) {
            console.log(response); 
            if (response.success) {
                console.log('Feedback submitted successfully');

                window.location.href = 'index.php';
            } else {
                console.error('Error submitting feedback:', response.error);
                
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', error);
        
        }
    });
}

function changeRatingColor(radio) {
    resetRatingColor(); 
    setRatingColor(radio); 
}

function hoverRatingColor(radio) {
    resetRatingColor(); 
    setRatingColor(radio);
}

function resetRatingColor() {
    var spans = document.querySelectorAll('.rating-input-wrapper span');
    spans.forEach(function(span) {
        span.style.backgroundColor = '';
    });
}

function setRatingColor(radio) {
    var selectedSpan = radio.nextElementSibling; 
    selectedSpan.style.backgroundColor = 'yellow';
}


function playAudio(audio) {
    audio.play();
}

function addAllToCart() 
{
    var bttn = document.getElementById('addAll');
   var idUser =  bttn.getAttribute('id-user');
   console.log(idUser);

    //*************************** *//
    fetch('PHP/addAllLikesToCart.php', {
        method: 'POST',
        body: new URLSearchParams({
            'idU': idUser
        
        })
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Handle the response from PHP
        bttn.innerHTML=`<i class="fa-solid fa-check"></i>	Added`;
        bttn.style.width=90 +'px';
        bttn.style.backgroundColor = '#47cccc';
        setInterval(function(){
            bttn.innerHTML=`<i class="fa-solid fa-cart-plus"></i>
            Add All To The Cart`;
            bttn.style.width=170 +'px';
            bttn.style.backgroundColor = '#f0eded';

        }, 2000)

       
      
       
    
    })
    .catch(error => {
        console.error('There was an error with the fetch operation:', error);
    });
    
                    //****************************************//
   

}

function ShowQuantitimessage(){
    var popup = document.getElementById('myPopup');
    popup.style.display='block';
    setInterval(function(){
        popup.style.display='none';

    }, 4000)
   
}