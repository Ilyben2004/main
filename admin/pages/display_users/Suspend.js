function changeaUserEtat(userIndice , newEtat){
    $.ajax({
        url: 'changeUserEtat.php',
        method: 'POST',
        data: {user_id: userIndice, Etat: newEtat },
        success: function (response) {
            console.log(response);



            console.log('User Changed Successfully ');
        },
        error: function (error) {
            console.error('Error adding product to cart:', error);
        }
    });

}

var buttons = document.querySelectorAll('.IsSuspended, .NotSuspended');

for (var i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener('click', function() {
let idUser = this.getAttribute('id-user');
    console.log(idUser);
    let newEtat =(this.className==="IsSuspended")?0:1;
    console.log(newEtat);
    changeaUserEtat(idUser,newEtat);
    this.className = (this.className==="IsSuspended")?"NotSuspended":"IsSuspended";
    this.innerHTML=(this.className==="IsSuspended")?"Unsuspend":"Suspend";;
  });
}
