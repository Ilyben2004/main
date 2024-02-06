document.getElementById('buttonmessage').addEventListener('click', function () {
    console.log("dsdmsd");
    var popup = document.getElementById('notificationsPopup');
    var svgCommand = `<svg width="25" height="25"  viewBox="0 0 1024 1024" fill="#000000" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M53.6 1023.2c-6.4 0-12.8-2.4-17.6-8-4.8-4.8-7.2-11.2-6.4-18.4L80 222.4c0.8-12.8 11.2-22.4 24-22.4h211.2v-3.2c0-52.8 20.8-101.6 57.6-139.2C410.4 21.6 459.2 0.8 512 0.8c108 0 196.8 88 196.8 196.8 0 0.8-0.8 1.6-0.8 2.4v0.8H920c12.8 0 23.2 9.6 24 22.4l49.6 768.8c0.8 2.4 0.8 4 0.8 6.4-0.8 13.6-11.2 24.8-24.8 24.8H53.6z m25.6-48H944l-46.4-726.4H708v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8s-44.8-20-44.8-44.8c0-14.4 7.2-27.2 20-36h0.8v-57.6H363.2v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8-24.8 0-44.8-20-44.8-44.8 0-14.4 7.2-27.2 20-36h0.8v-57.6H125.6l-46.4 726.4zM512 49.6c-81.6 0-148.8 66.4-148.8 148.8v3.2h298.4l-0.8-1.6v-1.6c0-82.4-67.2-148.8-148.8-148.8z" fill=""></path></g></svg>    `;
    var svgProduct =`	<svg  width="27" height="27"  viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g fill="none" fill-rule="evenodd" id="页面-1" stroke="none" stroke-width="1"> <g id="导航图标" transform="translate(-325.000000, -80.000000)"> <g id="编组" transform="translate(325.000000, 80.000000)"> <polygon fill="#FFFFFF" fill-opacity="0.01" fill-rule="nonzero" id="路径" points="24 0 0 0 0 24 24 24"></polygon> <polygon id="路径" points="22 7 12 2 2 7 2 17 12 22 22 17" stroke="#212121" stroke-linejoin="round" stroke-width="1.5"></polygon> <line id="路径" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="2" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="12" x2="12" y1="22" y2="12"></line> <line id="路径" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="22" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="17" x2="7" y1="4.5" y2="9.5"></line> </g> </g> </g> </g></svg>    `;
    popup.innerHTML = ''; // Clear previous content

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parse the JSON response
            var phpData = JSON.parse(xhr.responseText);

            // Display the data
            for (var i = 0; i < phpData.length; i++) {
                var currentSvg = svgProduct;
                var href = 'pages/display/display.php';

                phpData[i].message += ":";
                if (phpData[i].type == "command") {
                    currentSvg = svgCommand;
                    href = 'pages/display_commandes/display.php';
                }

                console.log(phpData[i].type);
                console.log(phpData[i].dateMessage);
                popup.innerHTML += `<div class="itsnotis" link="${href}">
                    <div class="iconoti">${currentSvg}</div>
                    <div class="message">${phpData[i].message} ${phpData[i].dateMessage}</div>
                </div>`;
            }
            popup.style.display = 'block';


            // Add click event listeners to the generated notification elements
            var divs = document.querySelectorAll('.itsnotis');
            divs.forEach(function (div) {
                div.addEventListener('click', function () {
                    window.location.href = div.getAttribute('link');
                });
            });
        }
    };

    xhr.open("GET", "../PHP/getNotifications.php", true);
    xhr.send();
});

// Click event listener to hide the popup when clicking outside
document.body.addEventListener('click', function (event) {
    var popup = document.getElementById('notificationsPopup');
    console.log("Clicked on:", event.target);

    if (!event.target.closest('#notificationsPopup') && !event.target.closest('#buttonmessage')) {
        console.log("Hiding popup");
        popup.style.display = 'none';
    }
});

