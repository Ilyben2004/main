let minValue = document.getElementById("min-value");
let maxValue = document.getElementById("max-value");

const rangeFill = document.querySelector(".range-fill");


var originalElement = document.getElementById('originalTable');

// Clone the element
var clonedElement = originalElement.cloneNode(true);

// Function to validate range and update the fill color on slider
function validateRange() {
  let minPrice = parseInt(document.getElementById('minchange').value);
  let maxPrice = parseInt(document.getElementById('maxchange').value);

  // Swap the values if minPrice is greater than maxPrice
  if (minPrice > maxPrice) {
    let tempValue = maxPrice;
    maxPrice = minPrice;
    minPrice = tempValue;
  }

  // Calculate the percentage position for min and max values
  const minPercentage = ((minPrice - 10) / 490) * 100;
  const maxPercentage = ((maxPrice - 10) / 490) * 100;

  // Set the position and width of the fill color element to represent the selected range
  rangeFill.style.left = minPercentage + "%";
  rangeFill.style.width = maxPercentage - minPercentage + "%";

  // Update the displayed min and max values
  minValue.innerHTML = minPrice+' USD';
  maxValue.innerHTML =   maxPrice+' USD';
}

// Get references to the input elements
const inputElements = document.querySelectorAll("input");

// Add an event listener to each input element
inputElements.forEach((element) => {
  element.addEventListener("input", validateRange);
});

// Initial call to validateRange
validateRange();

function filterByPrices(minPrice, maxPrice) {
  var cards;
  var table;
  var originalTable = $("#originalTable");
  if (originalTable.is(":visible")) {
    cards = document.querySelectorAll('#originalTable .productsTouser');
    
     table = document.getElementById('originalTable');

    }
    else{
       cards = document.querySelectorAll('#searchResults .productsTouser');
     table = document.getElementById('searchResults');

    }


  var cardsToShow = [];
  var cardsToHide = [];
  var tr = document.createElement('tr');

  const cardsPerRow = 4;
  var i = 0;
  var j = 0;

  // Clear the table content before updating
  table.innerHTML = ''; // Corrected this line

  cards.forEach((card, index) => {
    const price = parseFloat(card.getAttribute('data-price'));

    if (price > minPrice && price < maxPrice) {
      cardsToShow.push(card);
    } else {
      cardsToHide.push(card);
    }
  });

  cardsToShow.forEach((card, index) => {
    tr.appendChild(card);
    card.style.display='table-cell';

    i++;
    j++;
    if (i == cardsPerRow || j == cardsToShow.length) {
      table.appendChild(tr);
      tr = document.createElement('tr'); // Corrected this line
      i = 0;
    }
  });

  cardsToHide.forEach((card) => {
    card.style.display='none';

    table.appendChild(card);
  });

}
















document.getElementById('minchange').addEventListener('change',function(){
  let minValue = this.value;
  let maxValue  = document.getElementById('maxchange').value;
  console.log("max valu MADe  = : " + maxValue);
  console.log("min value  = : " + minValue);
 filterByPrices(minValue,maxValue);;



})


document.getElementById('maxchange').addEventListener('change',function(){
  let maxValue = this.value;
  let minValue  = document.getElementById('minchange').value;
  console.log("max value  = : " + maxValue);
  console.log("min value  = : " + minValue);
 filterByPrices(minValue,maxValue);



})



function validaterangeInitial(){

  document.getElementById('minchange').value=0;
  document.getElementById('maxchange').value=500;

  

  let minPrice = parseInt(document.getElementById('minchange').value);
  let maxPrice = parseInt(document.getElementById('maxchange').value);

  // Swap the values if minPrice is greater than maxPrice
  if (minPrice > maxPrice) {
    let tempValue = maxPrice;
    maxPrice = minPrice;
    minPrice = tempValue;
  }

  // Calculate the percentage position for min and max values
  const minPercentage = ((minPrice - 10) / 490) * 100;
  const maxPercentage = ((maxPrice - 10) / 490) * 100;

  // Set the position and width of the fill color element to represent the selected range
  rangeFill.style.left = minPercentage + "%";
  rangeFill.style.width = maxPercentage - minPercentage + "%";

  // Update the displayed min and max values
  minValue.innerHTML = minPrice+' USD';
  maxValue.innerHTML =   maxPrice+' USD';

originalElement.innerHTML=clonedElement.innerHTML;
var svgContainers = document.querySelectorAll('.svgContainer');
svgContainers.forEach(function(container) {
    container.addEventListener('click', function(event) {
      event.preventDefault();
      

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
console.log("waaw" +data); // Handle the response from PHP
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


        // Your additional logic or actions here (if needed)
    });
});

}