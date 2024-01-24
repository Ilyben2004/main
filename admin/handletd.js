var tds = document.querySelectorAll('#mainmenu #menu table td');
var menu = document.getElementById('mainmenu');

tds.forEach(function (td) {
    td.addEventListener('click', function () {
        // Reset classes and hide all display elements
        tds.forEach(function (td) {
            td.className = "";
            document.getElementById(td.getAttribute('disp')).style.display = 'none';
        });

        // Show loading container
        document.getElementById('containerloading').style.display = 'block';

        // Set a timeout to simulate loading (adjust the time according to your needs)
        setTimeout(function () {
            // Set class and show the corresponding element
            td.className = "chosen";
            document.getElementById(td.getAttribute('disp')).style.display = 'block';

            // Hide loading container
            document.getElementById('containerloading').style.display = 'none';
        }, 1500); // Adjust the time as needed
    });
});

tds.forEach(function (td) {
    td.addEventListener('dblclick', function () {
        document.getElementById('allchartsProducts').style.display = "block";
        // You can replace the above line with your specific logic for double-click
    });
});
