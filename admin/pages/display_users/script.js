
$(document).ready(function(){
    $('#search').on("keyup", function(){
      var getName = $(this).val();
     
      $.ajax({
        method: 'POST',
        url: 'searchajax.php',
        data: { name: getName },
        success: function(response) {
             $("#showdata").html(response);
             let sortingState  = "low";
let sortingStateAge  = "low";
document.getElementById('orderTd').addEventListener('click', function () {
  if (sortingState !== "up") {
      sortingState = "up";
      console.log("iffffffffffff");
      highToLow(4);
      
  } else {
      sortingState = "low";
      console.log("elssssssssse");
      lowToHigh(4);
  }
  console.log("im inside");
});
document.getElementById('ageTd').addEventListener('click', function () {
  if (sortingStateAge !== "up") {
      sortingStateAge = "up";
      console.log("iffffffffffff");
      highToLow(5);
      
  } else {
      sortingStateAge = "low";
      console.log("elssssssssse");
      lowToHigh(5);
  }
  console.log("im inside");
});
        } 
      });
    });
 });
 


let sourceDiv = document.querySelector('.display');
let targetDiv = document.querySelector('.menu-wrap');

// Get the computed height of the source div
let sourceHeight = window.getComputedStyle(sourceDiv).getPropertyValue('height');

// Set the height of the target div to match the height of the source div
let numericHeight = parseFloat(sourceHeight);

// Add 20 pixels to the numeric height
let adjustedHeight = numericHeight + 85;

// Set the height of the target div with the adjusted height
