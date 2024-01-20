var tds = document.querySelectorAll('#mainmenu #menu table td');
document.getElementById('allchartsProducts').style.display="none";

var menu = document.getElementById('mainmenu');
tds.forEach(function(td) {
  td.addEventListener('click', function() {
    tds.forEach(function(td){
        td.className="";

    });
    td.className="chosen";

document.getElementById('allchartsProducts').style.display="none";
   
    // You can replace the above line with your specific logic for each click
  });
});
tds.forEach(function(td) {
    td.addEventListener('dblclick', function() {
      
  document.getElementById('allchartsProducts').style.display="block";
     
      // You can replace the above line with your specific logic for each click
    });
  });
  