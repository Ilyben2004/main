function highToLow(indice) {
    var childrenArray = Array.from(document.querySelectorAll("table tr"));
    var table = document.querySelector('table');

    for (let i = 1; i < childrenArray.length; i++) {
        for (let j = i + 1; j < childrenArray.length; j++) {
            if (childrenArray[i].children[indice].textContent < childrenArray[j].children[indice].textContent) {
                var tr = childrenArray[j];
                childrenArray[j] = childrenArray[i];
                childrenArray[i] = tr;
            }
        }
    }

    table.innerHTML = '';
    for (let i = 0; i < childrenArray.length; i++) {
        table.appendChild(childrenArray[i]);
    }
}

// Example usage:
// highToLow(0); // Sorts the table based on the content of the first cell in descending order

function lowToHigh(indice){
    var childrenArray = Array.from(document.querySelectorAll("table tr"));
    var table = document.querySelector('table');

    for (let i = 1; i < childrenArray.length; i++) {
        for (let j = i + 1; j < childrenArray.length; j++) {
            if (childrenArray[i].children[indice].textContent > childrenArray[j].children[indice].textContent) {
                var tr = childrenArray[j];
                childrenArray[j] = childrenArray[i];
                childrenArray[i] = tr;
            }
        }
    }

    table.innerHTML = '';
    for (let i = 0; i < childrenArray.length; i++) {
        table.appendChild(childrenArray[i]);
    }
    
}

document.getElementById('priceFilter').addEventListener('change',function(){
    document.getElementById('sellsfilter').value=0;
    document.getElementById('likesfilter').value=0;

if(this.value==1){
    highToLow(3);
}
else{
    lowToHigh(3);
}
})



document.getElementById('sellsfilter').addEventListener('change',function(){
    document.getElementById('priceFilter').value=0;
    document.getElementById('likesfilter').value=0;

    if(this.value==1){
        highToLow(6);
    }
    else{
        lowToHigh(6);
    }
    })

    document.getElementById('likesfilter').addEventListener('change',function(){
        document.getElementById('priceFilter').value=0;
        document.getElementById('sellsfilter').value=0;

        if(this.value==1){
            highToLow(7);
        }
        else{
            lowToHigh(7);
        }
        })
        
    
    
