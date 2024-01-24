let sortingState  = "low";
let sortingStateAge  = "low";

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
    }    table.innerHTML = '';

    var thead = document.createElement('thead');
    thead.appendChild(childrenArray[0]);
    table.appendChild( thead);

    for (let i = 1; i < childrenArray.length; i++) {
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
    var thead = document.createElement('thead');
    thead.appendChild(childrenArray[0]);
    table.appendChild( thead);

    for (let i = 1; i < childrenArray.length; i++) {
        table.appendChild(childrenArray[i]);
    }
    
}

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
